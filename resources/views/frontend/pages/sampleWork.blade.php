@extends('frontend.master')
@section('content')
<section class="section speakers bg-speaker overlay-lighter">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section Title -->
				<div class="section-title white">
					<h3><span class="alternate">Sample Work</span></h3>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6">
               <img style="width: 300px;height:200px;" src="{{url('images/holud5.jpg')}}" alt="" class="img-fluid">
  
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <img style="width: 300px;height:200px;" src="{{url('images/birthday1.jpg')}}" alt="" class="img-fluid">
  
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <img style="width: 300px;height:200px;" src="{{url('images/marriage1.jpg')}}" alt="" class="img-fluid">
  
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <img style="width: 300px;height:200px;" src="{{url('images/images (7).jpg')}}" alt="" class="img-fluid">
  
            </div>
		
        </div>
</section>
@endsection