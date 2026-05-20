<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Siapa Kami - KONIG GUARD BUREAU</title>

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap" />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/animation.css" />
    <link rel="stylesheet" href="assets/css/libraries.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div id="preloader">
        <div class="loader-container">
            <img
                src="assets/images/logo/logo.png"
                alt="Logo"
                class="preloader-logo" />
            <div class="progress-bar">
                <div class="progress" id="progress"></div>
            </div>
            <div class="loading-text">Loading</div>
        </div>
    </div>
    <div class="wrapper">
        <header class="header header-transparent header-layout1">
            <?php include 'includes/navbar.php'; ?>
        </header>
        <!-- /.Header -->
        <!-- ========================
       page title 
    =========================== -->
        <section
            class="page-title-layout1 page-title-light bg-overlay text-center">
            <div class="bg-img">
                <img
                    src="assets/images/page-titles/siapa_kami.jpg"
                    alt="background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="pagetitle__heading">Siapa Kami</h1>
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.page-title -->

        <div class="breadcrumb-area border-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Tentang Kami
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Siapa Kami
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /.col-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /.breadcrumb-area -->

        <!-- ========================
      About Layout 1
    =========================== -->
        <section class="py-4">
            <div class="profile-wrapper text-center">
                <!-- Logo -->
                <img
                    src="assets/images/logo/logo_terang.png"
                    alt="Logo"
                    style="max-width: 50%"
                    class="profile-logo mb-3 pb-5 bounce" />

                <!-- Title -->
                <!-- <h3 class="fw-bold mb-4 bounce-in" style="color: #ceab6f">
            KONIG GUARD BUREAU
          </h3> -->

                <!-- Description -->
                <p class="mx-auto mb-90 bounce-in" style="max-width: 900px">
                    KONIG GUARD BUREAU adalah perusahaan penyedia Jasa Fasilitas &
                    Operasional yang menghadirkan tenaga kerja unggul untuk mendukung
                    kinerja dan kelancaran operasional perusahaan Anda. Mulai dari
                    keamanan, kebersihan, layanan administrasi, pengemudi profesional,
                    hingga dukungan hukum, kami siap menjadi mitra tepercaya dalam
                    menciptakan lingkungan kerja yang aman, tertata, dan produktif.
                </p>

                <!-- Visi & Misi -->
                <div class="row text-start justify-content-center">
                    <div class="col-md-5 mb-4 bounce-in">
                        <h5 class="fw-bold text-center mb-3" style="color: #ceab6f">
                            VISI
                        </h5>
                        <p>
                            Menjadi perusahaan penyedia jasa fasilitas dan operasional
                            terdepan di Indonesia dengan layanan berkualitas, tenaga kerja
                            berkompeten, serta komitmen tinggi terhadap keamanan,
                            kenyamanan, dan produktivitas lingkungan kerja.
                        </p>
                    </div>

                    <div class="col-md-5 bounce-in">
                        <h5 class="fw-bold text-center mb-3" style="color: #ceab6f">
                            MISI
                        </h5>
                        <ol style="padding-left: 18px">
                            <li>
                                Memberikan pelayanan terbaik bagi seluruh pengguna jasa di
                                berbagai wilayah Indonesia.
                            </li>
                            <li>
                                Membangun hubungan kerja sama yang produktif untuk mewujudkan
                                keberhasilan serta kesejahteraan bersama.
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- ========================
      Footer
    ========================== -->
        <footer class="footer">
            <?php include 'includes/footer.php'; ?>
        </footer>
        <!-- /.Footer -->
    </div>
    <!-- /.wrapper -->
    <div class="cursor"></div>
    <!-- scrollUp btn -->
    <div class="progress-wrap">
        <svg
            class="progress-circle svg-content"
            width="100%"
            height="100%"
            viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>