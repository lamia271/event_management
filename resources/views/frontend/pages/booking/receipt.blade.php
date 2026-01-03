<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background: #eee;
            margin: 0;
            font-family: 'Open Sans', sans-serif;
        }

        .receipt-main {
            background: #fff;
            border-bottom: 12px solid #333;
            border-top: 12px solid #9f181c;
            padding: 40px;
            margin: 30px auto;
            max-width: 800px;
            box-shadow: 0 1px 21px #acacac;
            color: #333;
        }

        .company-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .company-info h2 {
            margin: 0;
            text-transform: uppercase;
        }

        .company-info p {
            margin: 2px 0;
            font-size: 14px;
        }

        .customer-info {
            text-align: right;
            margin-bottom: 30px;
        }

        .customer-info h4 {
            margin: 0 0 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .table th, .table td {
            border: 1px solid #999;
            padding: 10px;
            font-size: 14px;
            text-align: center;
        }

        .table th {
            background-color: #414143;
            color: #fff;
        }

        .footer {
            margin-top: 30px;
            text-align: left;
        }

        .signature {
            margin-top: 60px;
            height: 100px;
        }

        .signature p {
            margin-top: 70px;
            border-top: 1px solid #000;
            width: 200px;
            text-align: center;
        }

        .thank-you {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
        }

    </style>
</head>
<body>

<div class="receipt-main">
    <!-- Company Info -->
    <div class="company-info">
        <h2>Eventre</h2>
        <p>01771250000</p>
        <p><a href="mailto:admin@gmail.com">admin@gmail.com</a></p>
        <p>Tongi, Gazipur, Dhaka</p>
    </div>

    <!-- Customer Info -->
    <div class="customer-info">
        <h4>{{ $booking->customer->name }}</h4>
        <p><strong>Mobile:</strong> {{ $booking->customer->phone }}</p>
        <p><strong>Email:</strong> {{ $booking->customer->email }}</p>
    </div>

    <!-- Booking Details Table -->
    <table class="table">
        <thead>
        <tr>
            <th>Event</th>
            <th>Package</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Dues</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $booking->package->event->name }}</td>
            <td>{{ $booking->package->name }}</td>
            <td>BDT. {{ $booking->total_amount }}</td>
            <td>{{ $booking->date }}</td>
            <td>{{ $booking->start_time }}</td>
            <td>{{ $booking->end_time }}</td>
            <td>BDT. {{ $booking->dues }}</td>
            <td>{{ $booking->payment_status }}</td>
        </tr>
        </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
        <p><strong>Date:</strong> {{ $currentDate }}</p>

        <div class="signature">
            <p>Customer Signature</p>
        </div>

        <div class="thank-you">
            <p><strong>Thank you for your booking with Eventre!</strong></p>
        </div>
    </div>
</div>

</body>
</html>
