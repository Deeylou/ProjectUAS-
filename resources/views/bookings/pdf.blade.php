<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
        }

        .container {
            border: 2px solid #198754;
            padding: 30px;
        }

        .title {
            text-align: center;
            color: #198754;
            font-size: 24px;
            font-weight: bold;
        }

        .subtitle {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px;
            vertical-align: top;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .status {
            display: inline-block;
            padding: 5px 10px;
            background: #ffc107;
            border-radius: 4px;
            font-weight: bold;
        }

        .footer {
            margin-top: 40px;
            border-top: 1px solid #999;
            padding-top: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }

        .note {
            margin-top: 25px;
            background: #f2f2f2;
            padding: 12px;
            border-left: 5px solid #198754;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="title">
            SISTEM RESERVASI LAPANGAN BADMINTON
        </div>

        <div class="subtitle">
            Bukti Booking Resmi
        </div>

        <table>

            <tr>
                <td class="label">ID Booking</td>
                <td>: {{ $booking->id }}</td>
            </tr>

            <tr>
                <td class="label">Nama Customer</td>
                <td>: {{ $booking->user->name }}</td>
            </tr>

            <tr>
                <td class="label">Email</td>
                <td>: {{ $booking->user->email }}</td>
            </tr>

            <tr>
                <td class="label">Nama Lapangan</td>
                <td>: {{ $booking->court->name }}</td>
            </tr>

            <tr>
                <td class="label">Jenis Lantai</td>
                <td>: {{ $booking->court->floor_type }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Booking</td>
                <td>: {{ $booking->booking_date }}</td>
            </tr>

            <tr>
                <td class="label">Jam Bermain</td>
                <td>
                    : {{ $booking->start_time }}
                    -
                    {{ $booking->end_time }}
                </td>
            </tr>

            <tr>
                <td class="label">Durasi</td>
                <td>: {{ $booking->duration }} Jam</td>
            </tr>

            <tr>
                <td class="label">Total Harga</td>
                <td>
                    : Rp
                    {{ number_format($booking->total_price, 0, ',', '.') }}
                </td>
            </tr>

            <tr>
                <td class="label">Status</td>
                <td>
                    :
                    <span class="status">
                        {{ strtoupper($booking->status) }}
                    </span>
                </td>
            </tr>

        </table>

        <div class="note">

            <strong>Catatan:</strong>

            <br><br>

            Harap menunjukkan bukti booking ini kepada petugas saat datang
            ke lokasi.

            <br>

            Pembayaran dilakukan langsung di tempat sesuai total biaya
            yang tertera pada bukti booking ini.

        </div>

        <div class="footer">

            Sistem Reservasi Lapangan Badminton

            <br>

            Dicetak pada:
            {{ now()->format('d-m-Y H:i:s') }}

        </div>

    </div>

</body>

</html>