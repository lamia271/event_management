@extends('backend.master')
@section('content')

<h1>Booking Details</h1>
<button id="print" onclick="printlist()" class="btn btn-info">Print</button>
<br>
<br>

<form action="{{route('admin.search.booking')}}" method="get">
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
        <th>Package</th>
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
      $currentPage = $bookings->currentPage();
      $perPage = $bookings->perPage();
      $startId = ($currentPage - 1) * $perPage + 1;
      @endphp
      @foreach($bookings as $key => $data)
      <tr>
        <th scope="row">{{$startId + $key}}</th>
        <td>{{$data->name}}</td>
        <td>{{$data->package->event->name}}</td>
        <td>{{$data->package->name}}</td>
        <td>{{$data->phone_number}}</td>
        <td>{{$data->email}}</td>
        <td>{{$data->venue}}</td>
        <td>{{$data->guest}}</td>
        <td>{{$data->transaction_id}}</td>
        <td class="date">{{$data->date}}</td>
        <td>{{$data->start_time}}</td>
        <td>{{$data->end_time}}</td>
        <td>{{$data->total_amount}}</td>
        <td class="status" data-id="{{$data->id}}" data-created-at="{{$data->created_at}}">{{$data->status}}</td>
        <td>
          @if($data->status == 'Accept' && $data->created_at->diffInDays(now()) > 2 && $data->payment_status !== 'Paid')
          Not Paid & Booking Rejected
          @elseif($data->status == 'Accept')
          {{$data->payment_status}}
          @endif
        </td>
        <td class="action">
          @if($data->status == 'Pending')
          <a href="{{route('admin.accept.booking', $data->id)}}" class="btn btn-success">Accept</a>
          <a href="{{route('admin.reject.booking', $data->id)}}" class="btn btn-danger">Reject</a>
          @elseif($data->payment_status == 'Paid' && $data->status != 'Event Done')
          <a href="{{route('admin.event.done', $data->id)}}" class="btn btn-success event-done" data-id="{{$data->id}}">Event Done</a>
          @endif
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

{{$bookings->links()}}

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