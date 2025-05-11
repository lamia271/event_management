<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Booking;
use App\Models\Customer;
use App\Models\Decoration;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('backend.master');
    }
    public function homePage()
{
    $totalBookings = Booking::count();
    $totalCustomers = Customer::count();
    $totalAppointments = Appointment::count();
    $totalDecorations = Decoration::count();
    $totalEvents = Event::count();

    return view('backend.pages.homePage', compact(
        'totalBookings',
        'totalCustomers',
        'totalAppointments',
        'totalDecorations',
        'totalEvents'
    ));
}
  

    
}
