<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto">
        <a href="{{ url('/') }}">
          <img src="{{ asset('admin/img/medical.png') }}" alt="medical logo" width="40px">
          Apotek Medical
        </a>
      </h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto {{ Request::is('/') ? "active" : "" }}" href="{{ url('/') }}">Home</a></li>
          <li><a class="nav-link scrollto {{ Request::is('shop') ? "active" : "" }}" href="{{ url('/shop') }}">Obat</a></li>
          <li><a class="nav-link scrollto {{ Request::is('article') ? "active" : "" }}" href="{{ url('/article') }}">Article</a></li>
          <li><a class="nav-link scrollto {{ Request::is('about') ? "active" : "" }}" href="{{ url('/about') }}">About</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{ url('/login') }}" class="appointment-btn scrollto"><span class="d-md-inline">Login</span></a>

    </div>
  </header>
