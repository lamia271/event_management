<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        body {
            background: #eee;
            margin-top: 20px;
            font-family: 'Open Sans', sans-serif;
        }
        .text-danger strong {
            color: #9f181c;
        }
        .receipt-main {
            background: #ffffff;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 9px !important;
            position: relative;
            box-shadow: 0 1px 21px #acacac;
            color: #333333;
        }
        .receipt-main p {
            color: #333333;
            line-height: 1.42857;
        }
        .receipt-footer h1 {
            font-size: 15px;
            font-weight: 400 !important;
            margin: 0 !important;
        }
        .receipt-main::after {
            background: #414143;
            content: "";
            height: 5px;
            left: 0;
            position: absolute;
            right: 0;
            top: -13px;
        }
        .receipt-main thead {
            background: #414143;
        }
        .receipt-main thead th {
            color: #fff;
        }
        .receipt-right h5 {
            font-size: 16px;
            font-weight: bold;
            margin: 0 0 7px 0;
        }
        .receipt-right p {
            font-size: 12px;
            margin: 0px;
        }
        .receipt-main td {
            padding: 9px 20px !important;
        }
        .receipt-main th {
            padding: 13px 20px !important;
        }
        .receipt-main td {
            font-size: 13px;
        }
        .receipt-main td p:last-child {
            margin: 0;
            padding: 0;
        }
        .receipt-main td h2 {
            font-size: 20px;
            font-weight: 900;
            margin: 0;
            text-transform: uppercase;
        }
        .receipt-header-mid .receipt-left h1 {
            font-weight: 100;
            margin: 34px 0 0;
            text-align: right;
            text-transform: uppercase;
        }
        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }
        #container {
            background-color: #dcdcdc;
        }
    </style>
</head>
<body>
    <div class="col-md-12">
        <div class="row">
            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left"></div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right" >
                                <h5>Eventre</h5>
                                <p>01725900442</p>
                                <p><a href="mailto:likhonijeedni@gmail.com">likhonijeedni@gmail.com</a></p>
                                <p>Sector-11, Uttara, Dhaka</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <h5>{{ $booking->customer->name }} </h5>
                                <p><b>Mobile :</b> {{ $booking->customer->phone }}</p>
                                <p><b>Email :</b> {{ $booking->customer->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Event</th>
                                <th>Package</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>{{ $booking->package->event->name }}</strong></td>
                                <td><strong>{{ $booking->package->name }}</strong></td>
                                <td><strong>BDT. {{ $booking->total_amount}}</strong></td>
                                <td><strong>{{ $booking->date }}</strong></td>
                                <td><strong>{{ $booking->start_time }}</strong></td>
                                <td><strong>{{ $booking->end_time }}</strong></td>
                                <td><strong>{{ $booking->payment_status }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><strong><b>Date :</b> {{ $currentDate }}</strong></p>
                                <h5 style="color: black;">Thanks for Booking</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
