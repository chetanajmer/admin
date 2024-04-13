<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Mart Online') }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--favicon-->
        <link rel="icon" href="/backend/assets/images/favicon-32x32.png" type="image/png" />
        <!--plugins-->
        <link href="/backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
        <link href="/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
        <link href="/backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
        <link href="/backend/assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
        <!-- loader-->
        <link href="/backend/assets/css/pace.min.css" rel="stylesheet" />
        <script src="/backend/assets/js/pace.min.js"></script>
        <!-- Bootstrap CSS -->
        <link href="/backend/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/backend/assets/css/bootstrap-extended.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
        <link href="/backend/assets/css/app.css" rel="stylesheet">
        <link href="/backend/assets/css/icons.css" rel="stylesheet">
        <link href="/backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href="/backend/assets/css/dark-theme.css" />
        <link rel="stylesheet" href="/backend/assets/css/semi-dark.css" />
        <link rel="stylesheet" href="/backend/assets/css/header-colors.css" />
    </head>
    <body >
    <!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="/backend/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">MartOnline</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('admin_dashboard') }}" class="">
						<div class="parent-icon"><i class='bx bx-home'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>

				</li>

				<li class="menu-label">Available Options</li>
				<li>
					<a href="{{ route('userprofile.index') }}">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user'></i>
						</div>
						<div class="menu-title">Users</div>
					</a>
				</li>
                <li>
					<a href="{{ route('vendorprofile.index') }}">
						<div class="parent-icon"><i class='fadeIn animated bx bx-user-pin'></i>
						</div>
						<div class="menu-title">Vendors</div>
					</a>
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class='bx bx-cart-alt' ></i>
						</div>
						<div class="menu-title">Transactions</div>
					</a>
					<ul>
						<li> <a href="{{ route('admin_approved_transactions') }}"><i class="bx bx-right-arrow-alt"></i>Approved Transactions</a>
						</li>
						<li> <a href="{{ route('admin_pending_transactions') }}"><i class="bx bx-right-arrow-alt"></i>Pending Transactions</a>
						</li>
						<li> <a href="{{ route('admin_rejected_transactions') }}"><i class="bx bx-right-arrow-alt"></i>Rejected Transactions</a>
						</li>

					</ul>
				</li>



			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					<div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">

							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>

						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="/backend/assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
							<div class="user-info ps-3">
								<p class="user-name mb-0">



                                </p>
								<p class="designattion mb-0">Administrator</p>
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">

							<li><a class="dropdown-item" href="{{ route('admin_logout') }}"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            @yield('content')

        </div>
		<!--end page wrapper -->


    <!-- Bootstrap JS -->
	<script src="/backend/assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="/backend/assets/js/jquery.min.js"></script>
	<script src="/backend/assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="/backend/assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="/backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!-- datatables js -->
    <script src="/backend/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="/backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	{{-- <script src="/backend/assets/js/index4.js"></script> --}}
	<!--app JS-->
	<script src="/backend/assets/js/app.js"></script>
    <script>
        setTimeout(() => {
            $('.alert-dismissible').hide();
        }, 3000);
    </script>
    @stack('custom-scripts')
    </body>
</html>
