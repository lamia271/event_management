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

        .receipt-main {
            background: #ffffff;
            border-bottom: 12px solid #333333;
            border-top: 12px solid #9f181c;
            margin-top: 50px;
            margin-bottom: 50px;
            padding: 40px 5px !important;
            position: relative;

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

        .receipt-main td,
        .receipt-main th {
            padding: 9px 5px !important;
            font-size: 13px;
        }

        .receipt-header-mid {
            margin: 24px 0;
            overflow: hidden;
        }
    </style>
</head>

<body>
    <div class="">
        <div class="row">
            <div class="receipt-main">
                <div class="row">
                    <div class="receipt-header">
                        <div style="width: 50%; float: right; text-align: right;">
                            <div class="receipt-right">
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
                        <div style="width: 100%; text-align: left;">
                            <div class="receipt-right">
                                <h5>{{ $booking->customer->name }}</h5>
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
                                <th scope="col">Event</th>
                                <th scope="col">Foods</th>
                                <th scope="col">Decorations</th>
                                <th scope="col">Venue</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
					
					
					<td>{{ $booking->event->name ?? 'N/A' }}</td>
					<td>
						@foreach($booking->foods as $food)
						{{ $food->name }},<br>
						@endforeach
					</td>
					<td>
						@foreach($booking->decorations as $decoration)
						{{ $decoration->name }},<br>
						@endforeach
					</td>
					<td>{{ $booking->venue}}</td>
					<td>{{ $booking->total_amount }}</td>
					<td>{{ $booking->date }}</td>
					
					<td>
						@if($booking->status == 'Cancelled')
						Booking Cancelled
						@elseif($booking->status == 'Reject')
						Booking Rejected
						@else
						{{$booking->payment_status}}
						@endif
					</td>
				
				</tr>

                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div style="width: 100%; text-align: left;">
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