<!doctype html>
<html lang="en">
  <head>
  	<title>Login 04</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('signin/css/style.css')}}">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url('{{asset('signin/images/bg-1.jpg')}}');">
			        </div>
						<div class="login-wrap p-4 p-md-5">
                            <div class="d-flex justify-content-center">
                                <div class="w-100 text-center">
                                    <h3 class="mb-4">Forgot Password</h3>
                                </div>
                            </div>

                            @if(session()->has('error'))
                            <div class="alert alert-danger">{{session('error')}}</div>
                            @endif
                            @if(session()->has('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif

							<form action="{{ route('password.update') }}" method="POST" class="signin-form">
								@csrf
                                <input type="text" name="token" hidden value="{{$token}}">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" name="email" class="form-control" placeholder="Email" required>
			      		</div>
                          <div class="form-group mb-3">
                            <label class="label" for="name">Entrer new password</label>
                            <input type="password" name="password" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Confirm password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Email" required>
                        </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Send Email</button>
		            </div>
		          </form>
		          
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

