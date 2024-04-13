<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="/backend/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="/backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="/backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="/backend/assets/css/pace.min.css" rel="stylesheet" />
	<script src="/backend/assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="/backend/assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="/backend/assets/css/app.css" rel="stylesheet">
	<link href="/backend/assets/css/icons.css" rel="stylesheet">
	<title>Admin Login</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="/backend/assets/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card rounded-4">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">Forgot Password</h3>

									</div>

                                    @if ($errors->any())
                                        <div class="alert  border-0 border-start border-5 border-danger alert-dismissible fade show">
                                        @foreach ($errors->all() as $error )
                                                <div>{{ $error }}</div>
                                        @endforeach
                                        </div>
                                    @endif



                                    @if (Session::has('success'))

                                    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
                                        <div class="text-white">{{ Session::get('success') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								    </div>
                                    @endif

                                    @if (Session::has('error'))

                                    <div class="alert alert-warning border-0 bg-warning alert-dismissible fade show">
                                        <div class="text-white">{{ Session::get('error') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								    </div>
                                    @endif

									<div class="form-body">
										<form class="row g-3" action="{{ route('admin_forget_password_submit') }}" method="POST"> @csrf
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
											</div>


											<div class="col-md-6 text-end">	<a href="{{ route('admin_login') }}">Back to Login Page</a>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Reset Password</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="/backend/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/backend/assets/js/jquery.min.js"></script>
	<script src="/backend/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="/backend/assets/js/app.js"></script>
</body>



</html>