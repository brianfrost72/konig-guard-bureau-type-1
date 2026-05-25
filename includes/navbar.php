<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>

<nav class="navbar navbar-expand-lg sticky-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img
                src="assets/images/logo/logo_terang.png"
                class="logo-light"
                alt="logo" />
            <img
                src="assets/images/logo/logo_terang.png"
                class="logo-dark"
                alt="logo" />
        </a>
        <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav__item">
                    <a href="/"
                        class="nav__item-link <?= ($current_page == 'index' || $current_page == '') ? 'active' : ''; ?>">
                        Beranda
                    </a>
                </li>
                <!-- /.nav-item -->
                <li class="nav__item has-dropdown">
                    <a href="#"
                        data-toggle="dropdown"
                        class="dropdown-toggle nav__item-link <?= in_array($current_page, ['siapa_kami', 'legalitas', 'struktur', 'karir']) ? 'active' : ''; ?>">
                        Tentang Kami
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav__item">
                            <a href="siapa_kami"
                                class="nav__item-link <?= ($current_page == 'siapa_kami') ? 'active' : ''; ?>">
                                Siapa Kami?
                            </a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="legalitas" class="nav__item-link <?= ($current_page == 'legalitas') ? 'active' : ''; ?>">
                                Legalitas Perusahaan
                            </a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="struktur" class="nav__item-link <?= ($current_page == 'struktur') ? 'active' : ''; ?>">
                                Struktur Perusahaan
                            </a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="karir" class="nav__item-link <?= ($current_page == 'karir') ? 'active' : ''; ?>">
                                Karir
                            </a>
                        </li>
                        <!-- /.nav-item -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.nav-item -->
                <li class="nav__item has-dropdown">
                    <a
                        href="#"
                        data-toggle="dropdown"
                        class="dropdown-toggle nav__item-link  <?= in_array($current_page, ['jasa_keamanan', 'jasa_operasional']) ? 'active' : ''; ?>">Layanan Kami</a>
                    <ul class="dropdown-menu wide-dropdown-menu">
                        <li class="nav__item">
                            <div class="row mx-0">
                                <div class="col-sm-6 dropdown-menu-col">
                                    <a
                                        href="jasa_keamanan"
                                        class="nav__item-link dropdown-menu-title <?= ($current_page == 'jasa_keamanan') ? 'active' : ''; ?>">Jasa Keamanan</a>
                                    <ul class="nav flex-column">
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_keamanan#jasa_security') ? 'active' : ''; ?>"
                                                href="jasa_keamanan#jasa_security">Pengamanan (Satpam)</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_keamanan#jasa_bodyguard') ? 'active' : ''; ?>"
                                                href="jasa_keamanan#jasa_bodyguard">Bodyguard</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_keamanan#jasa_pengamanan_event') ? 'active' : ''; ?>"
                                                href="jasa_keamanan#jasa_pengamanan_event">Pengamanan Event</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_keamanan#jasa_detektif_swasta') ? 'active' : ''; ?>"
                                                href="jasa_keamanan#jasa_detektif_swasta">Detektif swasta</a>
                                        </li>
                                        <!-- /.nav-item -->
                                    </ul>
                                </div>
                                <!-- /.col-sm-6 -->
                                <div class="col-sm-6 dropdown-menu-col">
                                    <a
                                        href="jasa_operasional"
                                        class="nav__item-link dropdown-menu-title <?= ($current_page == 'jasa_operasional') ? 'active' : ''; ?>">Fasilitas & Operasional</a>
                                    <ul class="nav flex-column">
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_operasional#jasa_parkir') ? 'active' : ''; ?>"
                                                href="jasa_operasional#jasa_parkir">Pengelolaan Parkir</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_operasional#jasa_driver') ? 'active' : ''; ?>"
                                                href="jasa_operasional#jasa_driver">Jasa Driver</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_operasional#jasa_cleaning_service') ? 'active' : ''; ?>"
                                                href="jasa_operasional#jasa_cleaning_service">Cleaning Services</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_operasional#jasa_pramubakti') ? 'active' : ''; ?>"
                                                href="jasa_operasional#jasa_pramubakti">Jasa Pramubakti</a>
                                        </li>
                                        <!-- /.nav-item -->
                                        <li class="nav__item">
                                            <a
                                                class="nav__item-link <?= ($current_page == 'jasa_operasional#jasa_pengacara') ? 'active' : ''; ?>"
                                                href="jasa_operasional#jasa_pengacara">Jasa Pengacara</a>
                                        </li>
                                        <!-- /.nav-item -->
                                    </ul>
                                </div>
                                <!-- /.col-sm-6 -->
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.nav-item -->
                    </ul>
                </li>
                <!-- /.nav-item -->

                <!-- /.nav-item -->
                <li class="nav__item has-dropdown">
                    <a
                        href="#"
                        data-toggle="dropdown"
                        class="dropdown-toggle nav__item-link <?= ($current_page == 'mitra_pelatihan' || $current_page == 'pelatihan') ? 'active' : ''; ?>">Mitra &amp; Pelatihan</a>
                    <ul class="dropdown-menu">
                        <li class="nav__item">
                            <a href="klien_kami" class="nav__item-link <?= ($current_page == 'klien_kami') ? 'active' : ''; ?>">Klien Kami</a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="mitra_pelatihan" class="nav__item-link <?= ($current_page == 'mitra_pelatihan') ? 'active' : ''; ?>">Mitra Pelatihan</a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="pelatihan" class="nav__item-link <?= ($current_page == 'pelatihan') ? 'active' : ''; ?>">Pelatihan Khusus</a>
                        </li>
                        <!-- /.nav-item -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
                <!-- /.nav-item -->
                <li class="nav__item has-dropdown">
                    <a
                        href="#"
                        data-toggle="dropdown"
                        class="dropdown-toggle nav__item-link <?= ($current_page == 'artikel' || $current_page == 'galeri' || $current_page == 'kontak_kami') ? 'active' : ''; ?>">Media & Informasi</a>
                    <ul class="dropdown-menu">
                        <li class="nav__item">
                            <a href="artikel" class="nav__item-link <?= ($current_page == 'artikel') ? 'active' : ''; ?>">Berita</a>
                        </li>
                        <!-- /.nav-item -->
                        <!-- <li class="nav__item">
                            <a href="testimony.html" class="nav__item-link">Testimoni Pelanggan</a>
                        </li> -->
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="galeri" class="nav__item-link <?= ($current_page == 'galeri') ? 'active' : ''; ?>">Galeri</a>
                        </li>
                        <!-- /.nav-item -->
                        <li class="nav__item">
                            <a href="kontak_kami" class="nav__item-link <?= ($current_page == 'kontak_kami') ? 'active' : ''; ?>">Kontak Kami</a>
                        </li>
                        <!-- /.nav-item -->
                    </ul>
                    <!-- /.dropdown-menu -->
                </li>
            </ul>
            <!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <!-- /.navbar-collapse -->
        <ul
            class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">
            <!-- <li>
                <a href="#" class="btn btn__white action__btn login_btn"
                  >Login</a
                >
              </li> -->
            <li>
                <div class="phone__number">
                    <div class="phone__icon">
                        <i class="icon-phone"></i>
                    </div>
                    <div>
                        <a class="phone__link d-block" href="tel:08111902759">0811 1902 759</a>
                        <a class="email__link d-block" href="mailto:cs@konig.co.id">cs@konig.co.id</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- /.container -->
</nav>