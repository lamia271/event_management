@extends('backend.master')

@section('content')
<div class="container">
    <!-- Dashboard Title -->
    <div class="dashboard-header">
        Dashboard
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="dashboard-box user-card">
                <h4 class="dashboard-title">Total Booking</h4>
                <p class="dashboard-content">{{ $totalBookings }}</p>
                <a href="#" class="btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="dashboard-box category-card">
                <h4 class="dashboard-title">Total Customer</h4>
                <p class="dashboard-content">{{ $totalCustomers }}</p>
                <a href="#" class="btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="dashboard-box menu-card">
                <h4 class="dashboard-title">Total Appointment</h4>
                <p class="dashboard-content">{{ $totalAppointments }}</p>
                <a href="#" class="btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="dashboard-box decorations-card">
                <h4 class="dashboard-title">Total Decorations</h4>
                <p class="dashboard-content">{{ $totalDecorations }}</p>
                <a href="#" class="btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="dashboard-box order-card">
                <h4 class="dashboard-title">Total Event</h4>
                <p class="dashboard-content">{{ $totalEvents }}</p>
                <a href="#" class="btn-primary">View Details</a>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 0;
    }

    .container {
        padding: 20px;
    }

    .dashboard-header {
        text-align: center;
        font-size: 36px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .dashboard-box {
        background-color: rgba(255, 255, 255, 0.8);
        border: 1px solid #dddddd;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
    }

    .dashboard-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }

    .dashboard-box.user-card {
        background-color: rgba(255, 99, 132, 0.8);
    }

    .dashboard-box.category-card {
        background-color: rgba(54, 162, 235, 0.8);
    }

    .dashboard-box.menu-card {
        background-color: rgba(255, 206, 86, 0.8);
    }

    .dashboard-box.order-card {
        background-color: rgba(75, 192, 192, 0.8);
    }

    .dashboard-box.decorations-card {
        background-color: rgba(226, 43, 208, 0.8);
    }

    .dashboard-title {
        font-size: 22px;
        margin-bottom: 10px;
        color: #333333;
    }

    .dashboard-content {
        font-size: 18px;
        color: #ffffff;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
