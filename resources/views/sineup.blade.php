<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

		<!-- STYLE CSS -->
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>

	<body>

		<div class="wrapper" style="background-image: url('images/lorry.jpg');" >
			<div class="inner">
				<div class="image-holder">
					<img src="images/lorry1.jpg" alt=""   width="500" height="435">
				</div>
				<form method="POST" action="{{url('registerinsert')}}">
  {{ csrf_field() }}
					<h3>Registration Form</h3>
					<div class="form-wraper">
                    @if ($errors->has('companyname'))
                    <span class="text-danger">{{ $errors->first('companyname') }}</span>
                @endif
						<input type="text" placeholder="companyName" name="companyname" class="form-control">
                      
                    </div>
                    <div class="form-wrapper">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
						<select  id="" class="form-control" name="name">
							<option value="" disabled selected>Register as</option>
							<option value="owner">owner</option>
							<option value="supervisor">supervisor</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					
					<div class="form-wrapper">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
						<input type="email" name="email" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					
					<div class="form-wrapper">
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
						<input type="password"name="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
                    @if ($errors->has('cpassword'))
                    <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                @endif
						<input type="password"name="cpassword" placeholder="Confirm Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button>Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
		
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>