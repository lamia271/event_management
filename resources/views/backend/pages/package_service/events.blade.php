@extends('backend.master')

@section('content')

<h1>Events</h1>

@foreach($packages as $data)
    <div class="">
        <a style="color: black;" href="{{ route('admin.package.service.create', $data->id) }}">
            <strong>{{ $data->name }}</strong>
        </a>
    </div>
@endforeach

@endsection
