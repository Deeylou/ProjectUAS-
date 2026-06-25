<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * Menampilkan form booking.
     */
    public function create(Court $court)
    {
        return view('bookings.create', compact('court'));
    }

    /**
     * Menyimpan booking baru.
     */
    public function store(Request $request, Court $court)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'start_time'   => 'required',
            'end_time'     => 'required',
        ]);

        $start = strtotime($request->start_time);
        $end   = strtotime($request->end_time);

        $duration = ($end - $start) / 3600;

        // Validasi jam selesai
        if ($duration <= 0) {
            return back()
                ->withInput()
                ->with('error', 'Jam selesai harus lebih besar dari jam mulai.');
        }

        // Validasi bentrok jadwal
        $bookingBentrok = Booking::where('court_id', $court->id)
            ->where('booking_date', $request->booking_date)
            ->where(function ($query) use ($request) {
                $query
                    ->where('start_time', '<', $request->end_time)
                    ->where('end_time', '>', $request->start_time);
            })
            ->exists();

        if ($bookingBentrok) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Lapangan sudah dibooking pada jam tersebut. Silakan pilih jam yang lain.'
                );
        }

        // Hitung harga
        $totalPrice = $duration * $court->price_per_hour;

        // Simpan booking
        Booking::create([
            'user_id'      => Auth::id(),
            'court_id'     => $court->id,
            'booking_date' => $request->booking_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'duration'     => $duration,
            'total_price'  => $totalPrice,
            'status'       => 'pending',
        ]);

        return redirect()
            ->route('booking.my')
            ->with('success', 'Booking berhasil dibuat.');
    }

    /**
     * Menampilkan booking milik user.
     */
    public function myBooking()
    {
        $bookings = Booking::with('court')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('bookings.my-booking', compact('bookings'));
    }

    /**
     * Menampilkan seluruh jadwal booking.
     */
    public function schedule()
    {
        $bookings = Booking::with(['court'])
            ->orderBy('booking_date')
            ->orderBy('start_time')
            ->get();

        return view('bookings.schedule', compact('bookings'));
    }

    /**
     * Download bukti booking PDF.
     */
    public function downloadPdf(Booking $booking)
    {
        if ($booking->user_id != Auth::id()) {
            abort(403);
        }

        $booking->load('user', 'court');

        $pdf = Pdf::loadView(
            'bookings.pdf',
            compact('booking')
        );

        return $pdf->download(
            'Bukti-Booking-' . $booking->id . '.pdf'
        );
    }
}

