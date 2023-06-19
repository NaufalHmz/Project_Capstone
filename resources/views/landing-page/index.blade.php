<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Apotek Medical</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template/img/medical.png') }}" rel="icon">
  <link href="{{ asset('template/img/medical.png') }}" rel="medical">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/css/style.css') }}" rel="stylesheet">

</head>

<body>

<!-- Header -->
@include ('landing-page.navbar')
<!-- End Header -->

<!-- content -->
<main id="main">
    @yield('content')
</main>
<!-- End -->

@include('landing-page.partials.footer')

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
  @yield('script')

  <!-- Template Main JS File -->
  <script src="{{ asset('template/js/main.js') }}"></script>
</body>
</html>
