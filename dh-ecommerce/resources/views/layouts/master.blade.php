<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ asset('img/favicon.ico') }}" rel="shortcut icon" />
    <title>Laravel Ecommerce | @yield('title', '')</title>


    {{-- <!-- Bootstrap core CSS --> --}}
    {{-- <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"> --}}

    <!-- Custom styles for this template -->
    {{-- <link href="{{ asset('css/shop-homepage.css')}}" rel="stylesheet">  --}}

    {{-- Style --}}

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    @include('layouts.partials.navbar')

		<div class="spacer"></div>
		<div class="spacer"></div>
    <!-- Page Content -->
		<main class="py-4">

				@yield('content')
		</main>
    <!-- /.container -->

    <!-- Footer -->
  @include('layouts.partials.footer')
  @include('layouts.partials.scripts')

    <!-- Bootstrap core JavaScript -->
    {{-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

  </body>
</html>