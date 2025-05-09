@extends('backend.master')
<style>
  @media print {

    #print,
    .search-form {
      display: none;
    }

    footer {
      display: none !important;
    }

    .sidebar {
      display: none !important;
    }

    .navbar {
      display: none !important;
    }

    .action {
      display: none !important;
    }

    .table-responsive {
      overflow: visible !important;
    }

    .table {
      width: 100%;
      table-layout: fixed;
      font-size: smaller;
      /* Smaller font size for printing */
    }

    th,
    td {
      white-space: nowrap;
      /* Ensure no cell content breaks into new lines */
    }
  }

  /* Ensure table doesn't overflow */
  .table-responsive {
    overflow-x: auto;
  }

  .table {
    width: 100%;
    table-layout: auto;
  }
</style>

@section('content')

<h1>Customize Booking Details</h1>
<button id="print" onclick="printlist()" class="btn btn-info">Print</button>
<br>
<br>

<form action="{{route('admin.customize.search.booking')}}" method="get">
  <div class="input-group mb-3">
    <input type="date" id="start_date" class="form-control" placeholder="Start Date" name="start_date">
    <input type="date" id="end_date" class="form-control" placeholder="End Date" name="end_date">
    <div class="input-group-append">
      <button style="color: black;" class="btn btn-outline-secondary" type="submit">Search</button>
    </div>
  </div>
</form>

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>User</th>
        <th>Event</th>
        <th>Foods</th>
        <th>Decorations</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Venue</th>
        <th>Guest</th>
        <th>Transaction Id</th>
        <th>Date(mm/dd/yy)</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Total Amount</th>
        <th>Status</th>
        <th>Payment Status</th>
        <th class="action">Action</th>
      </tr>
    </thead>

    <tbody>
      @php
      $currentPage = $customizeBookingDetails->currentPage();
      $perPage = $customizeBookingDetails->perPage();
      $startId = ($currentPage - 1) * $perPage + 1;
      @endphp
      
      @foreach($customizeBookingDetails as $key => $booking)
      <tr>
        <th scope="row">{{ $startId + $key }}</th>
        <td>{{ $booking->name }}</td>
        <td>{{ $booking->event->name ?? 'N/A' }}</td>
        <td>
          @foreach($booking->foods as $food)
          {{ $food->name }},
          @endforeach
        </td>
        <td>
          @foreach($booking->decorations as $decoration)
          {{ $decoration->name }},
          @endforeach
        </td>
        <td>{{ $booking->phone_number }}</td>
        <td>{{ $booking->email }}</td>
        <td>{{ $booking->venue }}</td>
        <td>{{ $booking->guest }}</td>
        <td>{{ $booking->transaction_id }}</td>
        <td class="date">{{ $booking->date }}</td>
        <td>{{ $booking->start_time }}</td>
        <td>{{ $booking->end_time }}</td>
        <td>{{ $booking->total_amount }}</td>
        <td class="status" data-id="{{ $booking->id }}">{{ $booking->status }}</td>
        <td>
          @if($booking->status == 'Accept' && $booking->created_at->diffInDays(now()) > 2 && $booking->payment_status !== 'Paid')
          Not Paid & Booking Rejected
          @elseif($booking->status == 'Accept')
          {{$booking->payment_status}}
          @endif
        </td>
        <td class="action">
          @if($booking->status == 'Pending')
          <a href="{{route('admin.customize.accept.booking', $booking->id)}}" class="btn btn-success">Accept</a>
          <a href="{{route('admin.customize.reject.booking', $booking->id)}}" class="btn btn-danger">Reject</a>
          @elseif($booking->payment_status == 'Paid' && $booking->status != 'Event Done')
          <a href="{{route('admin.customize.event.done', $booking->id)}}" class="btn btn-success event-done" data-id="{{ $booking->id }}">Event Done</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
{{$customizeBookingDetails->links()}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.date').forEach(cell => {
      const date = new Date(cell.innerText);
      const formattedDate = ('0' + (date.getMonth() + 1)).slice(-2) + '/' + ('0' + date.getDate()).slice(-2) + '/' + date.getFullYear();
      cell.innerText = formattedDate;
    });
  });

  function printlist() {
    window.print();
  }
</script>

@endsection