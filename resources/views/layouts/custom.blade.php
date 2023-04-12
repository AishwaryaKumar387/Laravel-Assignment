<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>Laravel Assignment</title>
		@if (Auth::check())
			<link href="https://cdn.jsdelivr.net/npm/simple-datatables@5.0/dist/style.css" rel="stylesheet" />
		@endif
		<link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
		{{-- <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> --}}
		@stack('ckeditor')
		@stack('custom-style')
	</head>
    <body class="bg-light">
	{{-- document loader --}}
	@if (Auth::check())
		<div id="loading"></div>
	@endif
	{{-- Ajax loader --}}
	@include('backend.loader')
	@if (Auth::check())
			@include('backend.top-navbar')
			<div id="layoutSidenav">
				@include('backend.sidebar')
				<div id="layoutSidenav_content">
					@yield('content')  
				</div>
			</div>
	@else
		<div id="layoutAuthentication">
			<div id="layoutAuthentication_content">
				@yield('content')  
			</div>
		</div>
	@endif
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<script src="{{ asset('backend/js/scripts.js') }}"></script>
	<script src="https://unpkg.com/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    @if (Auth::check())
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        {{-- <script src="{{asset('backend/assets/demo/chart-area-demo.js')}}"></script>
        <script src="{{asset('backend/assets/demo/chart-bar-demo.js')}}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@5.0" crossorigin="anonymous"></script>
        <script src="{{asset('backend/js/datatables-simple-demo.js')}}"></script>
	@endif
	@include('backend.custom-script')
	@stack('custom-script')
</body>
</html>