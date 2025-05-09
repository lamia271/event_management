<!doctype html>
<html lang="en">

<head>
	<link rel="stylesheet" href="{{url('csslogin/style.css')}}">

</head>

<body class="img js-fullheight" style="background-image: url('/imageslogin/tintin.jpg');">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h6 class="heading-section"> <strong>Login to Eventre</strong></h6>
				</div>
			</div>
			@notifyCss
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<h3 class="mb-4 text-center"></h3>
						<form action="{{route('admin.do.login')}}" method="post" class="signin-form">
							@csrf
							<div class="form-group">
								<input name="email" type="email" style="background:maroon;" class="form-control" placeholder="Enter Email" required>
							</div>
							<div class="form-group">
								<input name="password" style="background:maroon;" id="password-field" type="password" class="form-control" placeholder="Password" required>
							</div>
							<div class="form-group">
								<button type="submit" style=" width:50%; " class="form-control btn btn-primary submit px-3">Sign In</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label style="color:white;" class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style=" color:white;">Forgot Password?</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			@include('notify::components.notify')

			@notifyJs

		</div>
	</section>

	<script src="{{url('jslogin/jquery.min.js')}}"></script>
	<script src="{{url('jslogin/popper.js')}}"></script>
	<script src="{{url('jslogin/bootstrap.min.js')}}"></script>
	<script src="{{url('jslogin/main.js')}}"></script>

</body>

</html>