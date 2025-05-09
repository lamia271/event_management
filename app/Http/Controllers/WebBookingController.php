<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Event;
use App\Models\Package;
use App\Models\PackageService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebBookingController extends Controller
{
    public function bookingForm($id)
    {
        $package = Package::with(['packageServices.food', 'packageServices.decoration'])->findOrFail($id);
        return view('frontend.pages.booking.bookingForm', compact('package'));
    }

    public function bookingStore(Request $request)
    {
        $package = Package::with(['packageServices.food', 'packageServices.decoration'])->findOrFail($request->package_id);

        $checkValidation = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required',
            'guest' => 'required',
            'total_amount' => 'required',
        ]);

        if ($checkValidation->fails()) {
            return redirect()->back()->withErrors($checkValidation)->withInput();
        }

        Booking::create([
            'name' => $request->name,
            'customer_id' => auth('customerGuard')->user()->id,
            'package_id' => $request->package_id,
            'phone_number' => $request->phone,
            'email' => $request->email,
            'transaction_id' => date('YmdHis'),
            'date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'venue' => $request->venue,
            'guest' => $request->guest,
            'total_amount' => $request->total_amount,
            'payment_status' => 'pending',
        ]);

        notify()->success('Booked Package Successfully.Please Pay Within 2 Days.'); 
        return redirect()->route('booking.details');
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'Cancelled'
        ]); 

        notify()->success('Booking cancel successfully.');
        return redirect()->back();
    }

    public function downloadReceipt($id)
    {
        $booking = Booking::with('package.event', 'customer')->findOrFail($id);

        if ($booking->payment_status !== 'Paid') {
            return redirect()->back()->with('error', 'Payment not completed yet.');
        }

        $currentDate = Carbon::now()->format('d M, Y');
        $pdf = PDF::loadView('frontend.pages.booking.receipt', compact('booking', 'currentDate'));

        return $pdf->download('receipt_'.$booking->transaction_id.'.pdf');
    }
}
