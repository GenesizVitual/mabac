<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V18</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('assets_login')}}/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/css/util.css">
	<link rel="stylesheet" type="text/css" href="{{asset('assets_login')}}/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="{{url('/')}}" method="POST">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					@if(!empty(Session::get('message_success')))
						<p style="text-align: center; color:green;">{{Session::get('message_success')}}</p>
					@endif
					@if(!empty(Session::get('message_fail')))
					<p style="text-align: center; color:red;">{{Session::get('message_fail')}}<p>
					@endif
					{{ csrf_field() }}
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Email</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" required>
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
					
					{{-- <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							Daftar disini
						</span>
					</div> --}}

				</form>

				<div class="login100-more" style="background-image: url('{{asset('assets_login')}}/images/bg-01.jpg');">
				</div>
			</div>
		</div>
	</div>
	
	

	
	
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/bootstrap/js/popper.js"></script>
	<script src="{{asset('assets_login')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/daterangepicker/moment.min.js"></script>
	<script src="{{asset('assets_login')}}/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="{{asset('assets_login')}}/js/main.js"></script>

</body>
</html>