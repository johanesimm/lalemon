<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
    @include('templates.css')
</head>

<body class="navbar-bottom login-container">
	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Simple login form -->
				<form action="{{ action('MainController@validateUser') }}" method="POST">
					{{ csrf_field() }}
					<div class="panel panel-body login-form">
						<div class="text-center">
							<div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
							<h5 class="content-group">Login to your account <small class="display-block">Enter your credentials below</small></h5>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="text" class="form-control" name="username" placeholder="Username">
							<div class="form-control-feedback">
								<i class="icon-user text-muted"></i>
							</div>
						</div>

						<div class="form-group has-feedback has-feedback-left">
							<input type="password" class="form-control" name="password" placeholder="Password">
							<div class="form-control-feedback">
								<i class="icon-lock2 text-muted"></i>
							</div>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 position-right"></i></button>
						</div>
					</div>
				</form>
				<!-- /simple login form -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
    <!-- /page container -->
    @include('templates.js')
</body>
</html>
