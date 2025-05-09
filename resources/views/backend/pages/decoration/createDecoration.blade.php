@extends('backend.master')
@section('content')

<h1>Create Decoration Item</h1>


<form action="{{route('admin.decoration.store')}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="">Decoration Name</label>
    <input required name="name" type="text" class="form-control" id="" placeholder="Enter Decoration name">
  </div>

  <br>

<div class="form-group">
  <label for="">Event</label>
  <select class="form-control" name="event_id" id="">
  <option>select event</option>
    @foreach ($events as $data)
   <option value ="{{$data->id}}">{{$data->name}}</option>
   @endforeach 
   </select>
</div>
  
 <br>
  <div class="form-group">
    <label for="">Decoration Price</label>
    <input name="price" type="number" class="form-control" id="" placeholder="Enter Decoration Price">
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection