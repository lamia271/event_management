@extends('frontend.master')
@section('content')
<div>
    <section class="registration">
        <div class="">
            <div class="registration-block bg-registration-one overlay-dark">
                <div class="block">
                    <div class="row" style="margin-top: 0px; margin-bottom:10px;">
                        <div class="col-md-3"> </div>
                        <div style="margin-top:0px;" class="col-md-6" style=" border-radius:15px;">
                            <form action="{{ route('booking.store') }}" method="post" class="row">
                                @csrf
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="title text-left">
                                        <h3 style="color: white;">
                                            <strong>Booking Form</strong>
                                            <span class="alternate"><strong></strong></span>
                                        </h3>
                                    </div>
                                    <input type="hidden" name="package_id" value="{{ $package->id }}">

                                    @foreach ($package->packageServices as $packageService)
                                        <input type="hidden" class="food-price" value="{{ $packageService->food->price }}">
                                        <input type="hidden" class="decoration-price" value="{{ $packageService->decoration->price }}">
                                    @endforeach

                                    <label style="color:white;"><strong>Name</strong></label>
                                    <input required name="name" type="text" value="{{ auth('customerGuard')->user()->name }}" class="form-control main" placeholder="Enter Your name" required readonly>
                                    <label style="color:white;"><strong>Email</strong></label>
                                    <input required name="email" type="email" value="{{ auth('customerGuard')->user()->email }}" class="form-control main" placeholder="Enter Your Email" required readonly>
                                    <label style="color:white;"><strong>Phone Number</strong></label>
                                    <input required name="phone" value="{{ auth('customerGuard')->user()->phone }}" type="tel" class="form-control main" placeholder="Enter Your Number" required readonly>
                                    <div class="form-group">
                                        <label style="color:white;"><strong>Date</strong></label>
                                        <input required name="date" type="date" id="datePicker" class="form-control" value="{{ old('date') }}" placeholder="Enter date">
                                    </div>
                                    <label style="color:white;"><strong>Start Time</strong></label>
                                    <input name="start_time" id="start_time" type="time" class="form-control main" required>
                                    <label style="color:white;"><strong>End Time</strong></label>
                                    <input name="end_time" id="end_time" type="time" class="form-control main" required>
                                    <label style="color:white;"><strong>Venue</strong></label>
                                    <input name="venue" id="venue" type="text" class="form-control main" required>
                                    <label style="color:white;"><strong>Guest</strong></label>
                                    <input name="guest" id="guest" type="number" class="form-control main" required>
                                    <label style="color:white;"><strong>Total Amount</strong></label>
                                    <input name="total_amount" id="total_amount" type="text" class="form-control main" required readonly>
                                    <button type="submit" class="btn btn-white-md">Confirm Booking</button>
                                </div>
                                <div class="col-md-2"></div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
               document.addEventListener('DOMContentLoaded', function() {
            // Get all food prices
            const foodPrices = Array.from(document.querySelectorAll('.food-price')).map(input => parseFloat(input.value));
            const totalFoodPrice = foodPrices.reduce((sum, price) => sum + price, 0);

            // Get the decoration price (assuming only one decoration item)
            const decorationPrice = parseFloat(document.querySelector('.decoration-price').value) || 0;

            document.getElementById('guest').addEventListener('input', function() {
                const guestCount = parseInt(this.value) || 0; // Ensure it's a number or 0 if not valid
                const totalAmount = (guestCount * totalFoodPrice) + decorationPrice;
                document.getElementById('total_amount').value = totalAmount.toFixed(2);
            });
        });

        document.getElementById('start_time').addEventListener('change', function() {
            var startTime = this.value;
            document.getElementById('end_time').setAttribute('min', startTime);
        });

       
        const today = new Date();
       
        const tomorrow = new Date(today);
        tomorrow.setDate(today.getDate() + 5);
        
        const minDate = tomorrow.toISOString().split('T')[0];
        
        document.getElementById('datePicker').setAttribute('min', minDate);
    </script>
</div>
@endsection
