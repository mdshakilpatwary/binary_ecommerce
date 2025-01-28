<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('backend')}}/assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{asset('backend')}}/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="{{asset('backend')}}/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('backend')}}/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('backend')}}/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- loader-->
	{{-- <link href="{{asset('backend')}}/assets/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('backend')}}/assets/js/pace.min.js"></script> --}}
	<!-- Bootstrap CSS -->
	<link href="{{asset('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('backend')}}/assets/css/app.css" rel="stylesheet">
	<link href="{{asset('backend')}}/assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('backend')}}/assets/css/dark-theme.css" />
	<link rel="stylesheet" href="{{asset('backend')}}/assets/css/semi-dark.css" />
	<link rel="stylesheet" href="{{asset('backend')}}/assets/css/header-colors.css" />
	<title>Binary ecommerce</title>


	<style>
		/* Ensure Toastr notifications are visible */
		.toast {
			color: #ffffff !important; /* Force text color to white */
			font-size: 14px !important; /* Adjust text size if needed */
		}
	
		.toast-success {
			background-color: #28a745 !important; /* Green for success */
		}
	
		.toast-error {
			background-color: #dc3545 !important; /* Red for error */
		}
	
		.toast-warning {
			background-color: #ffc107 !important; /* Yellow for warning */
		}
	
		.toast-info {
			background-color: #17a2b8 !important; /* Blue for info */
		}
	</style>
</head>
