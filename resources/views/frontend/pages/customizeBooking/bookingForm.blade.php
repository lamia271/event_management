@extends('frontend.master')
@section('content')
<section class="registration">
    <div class="container-fluid p-0">
        <form action="{{ route('customize.booking.store') }}" method="post">
            @csrf
            <div class="row" style="padding-top: 50px;">
                <div class="col-lg-6 col-md-12 p-0">
                    <input type="hidden" name="event_id" value="{{ $events->id }}">
                    <div style="padding-top: 100px; padding-left:70px;">
                        <label for="" style="color: black; font-size:30px;"><strong>Food</strong></label>
                        @foreach($foods as $data)
                        <div class="form-check">
                            <input class="form-check-input food-checkbox" type="checkbox" name="food_id[]" value="{{ $data->id }}" data-price="{{ $data->price }}" required>
                            <label class="form-check-label" for="food" style="color: black; font-size:20px;">
                                {{ $data->name }} ({{ $data->price }} /-per person)
                            </label>
                        </div>
                        @endforeach
                    </div>
                    <div style="padding-top: 50px; padding-left:70px;">
                        <label for="" style="color: black; font-size:30px;"><strong>Decoration</strong></label>
                        @foreach($decorations as $data)
                        <div class="form-check">
                            <input class="form-check-input decoration-checkbox" type="checkbox" name="decoration_id[]" value="{{ $data->id }}" data-price="{{ $data->price }}" required>
                            <label class="form-check-label" for="decoration" style="color: black; font-size:20px;">
                                {{ $data->name }} ({{ $data->price }})
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="registration-block bg-registration overlay-dark">
                        <div class="block">
                            <div class="title text-left">
                                <h3>Booking Form</h3>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Name</strong></label>
                                    <input required name="name" type="text" value="{{ auth('customerGuard')->user()->name }}" class="form-control main" placeholder="Enter Your name" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Email</strong></label>
                                    <input required name="email" type="email" value="{{ auth('customerGuard')->user()->email }}" class="form-control main" placeholder="Enter Your Email" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Phone Number</strong></label>
                                    <input required name="phone" value="{{ auth('customerGuard')->user()->phone }}" type="tel" class="form-control main" placeholder="Enter Your Number" required readonly>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Date</strong></label>
                                    <input required name="date" type="date" id="datePicker" class="form-control" value="{{ old('date') }}" placeholder="Enter date">
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Start Time</strong></label>
                                    <input name="start_time" id="start_time" type="time" class="form-control main" required>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>End Time</strong></label>
                                    <input name="end_time" id="end_time" type="time" class="form-control main" required>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Venue</strong></label>
                                    <input name="venue" id="venue" type="text" class="form-control main" required>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Guest</strong></label>
                                    <input name="guest" id="guest" type="number" class="form-control main" required>
                                </div>
                                <div class="col-md-6">
                                    <label style="color:white;"><strong>Total Amount</strong></label>
                                    <input name="total_amount" id="total_amount" type="text" class="form-control main" required readonly>
                                </div>
                                <div class="col-12" style="padding-left: 150px;">
                                    <button type="submit" class="btn btn-white-md">Confirm Booking</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const foodCheckboxes = document.querySelectorAll('.food-checkbox');
        const decorationCheckboxes = document.querySelectorAll('.decoration-checkbox');
        const guestInput = document.getElementById('guest');
        const totalAmountInput = document.getElementById('total_amount');

        function calculateTotalAmount() {
            let totalAmount = 0;
            let guestCount = parseInt(guestInput.value) || 0;
            console.log('Guest Count:', guestCount);

            foodCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    let foodPrice = parseFloat(checkbox.dataset.price);
                    console.log('Food Price:', foodPrice);
                    totalAmount += foodPrice * guestCount;
                }
            });

            decorationCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    let decorationPrice = parseFloat(checkbox.dataset.price);
                    console.log('Decoration Price:', decorationPrice);
                    totalAmount += decorationPrice;
                }
            });

            console.log('Total Amount:', totalAmount);
            totalAmountInput.value = totalAmount.toFixed(2);
        }

        foodCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotalAmount);
        });

        decorationCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotalAmount);
        });

        guestInput.addEventListener('input', calculateTotalAmount);
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
@endsection
