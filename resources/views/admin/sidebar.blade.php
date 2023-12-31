<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ url('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-layout-text-window-reverse"></i><span>Master Data</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/obat') }}">
                        <i class="bi bi-circle"></i><span>Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/kategori_obat') }}">
                        <i class="bi bi-circle"></i><span>Ketegori Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/suplier') }}">
                        <i class="bi bi-circle"></i><span>Supplier</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/suplai_obat') }}">
                        <i class="bi bi-circle"></i><span>Suplai Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/dokter') }}">
                        <i class="bi bi-circle"></i><span>Dokter</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Tables Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i><span>Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/pasien') }}">
                        <i class="bi bi-circle"></i><span>Pasien</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/pemeriksaan') }}">
                        <i class="bi bi-circle"></i><span>Pemeriksaan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/resep_obat') }}">
                        <i class="bi bi-circle"></i><span>Resep Obat</span>
                    </a>
                </li>
                
            </ul>
        </li><!-- End Forms Nav -->

     
        

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

        
        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-contact.html">
                <i class="bi bi-envelope"></i>
                <span>Contact</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-register.html">
                <i class="bi bi-card-list"></i>
                <span>Register</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="pages-login.html">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li><!-- End Login Page Nav -->


    </ul>

</aside>