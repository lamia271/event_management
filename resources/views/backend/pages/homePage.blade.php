
@extends('backend.master')

@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

        /* Dashboard title */
        .dashboard-header {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #333;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Common card styling */
        .dashboard-box {
            background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white */
            border: 1px solid #dddddd;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .dashboard-box:hover {
            transform: translateY(-10px); /* Elevate slightly on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }

        /* Unique colors for each card */
        .dashboard-box.user-card {
            background-color: rgba(255, 99, 132, 0.8); /* Semi-transparent Red */
        }

        .dashboard-box.category-card {
            background-color: rgba(54, 162, 235, 0.8); /* Semi-transparent Blue */
        }

        .dashboard-box.menu-card {
            background-color: rgba(255, 206, 86, 0.8); /* Semi-transparent Yellow */
        }

        .dashboard-box.order-card {
            background-color: rgba(75, 192, 192, 0.8); /* Semi-transparent Green */
        }

        .dashboard-box.decorations-card {
            background-color: rgba(226, 43, 208, 0.8); /* Semi-transparent Purple */
        }

        .dashboard-title {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333333;
        }

        .dashboard-content {
            font-size: 18px;
            color: #666666;
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
</head>

<body>
    <div class="container">
        <!-- Dashboard Title -->
        <div class="dashboard-header">
            Dashboard
        </div>

        <div class="row mb-3">
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box user-card">
                    <h4 class="dashboard-title">Total Booking</h4>
                    <p class="dashboard-content">0</p>
                    <a href="#" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box category-card">
                    <h4 class="dashboard-title">Total Customer</h4>
                    <p class="dashboard-content">0</p>
                    <a href="#" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box menu-card">
                    <h4 class="dashboard-title">Total Appointment</h4>
                    <p class="dashboard-content">0</p>
                    <a href="#" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box decorations-card">
                    <h4 class="dashboard-title">Total Decorations</h4>
                    <p class="dashboard-content">0</p>
                    <a href="#" class="btn-primary">View Details</a>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 mb-4">
                <div class="dashboard-box order-card">
                    <h4 class="dashboard-title">Total Event</h4>
                    <p class="dashboard-content">0</p>
                    <a href="#" class="btn-primary">View Details</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

@endsection