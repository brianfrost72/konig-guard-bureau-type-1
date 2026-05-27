<?php include 'includes/visitor_tracker.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Mitra Pengamanan - KONIG GUARD BUREAU</title>

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
        <!-- =========================
        Header
    =========================== -->
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
                    src="assets/images/page-titles/mitra_kami.png"
                    alt="background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="pagetitle__heading mb-0">Mitra Pengamanan Kami</h1>
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
                                <li class="breadcrumb-item">
                                    <a href="/">Beranda</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Mitra &amp; Pelatihan
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Mitra Pengamanan Kami
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
     Pengamanan
    =========================== -->
        <?php
        require_once 'koneksi.php';

        /*
|--------------------------------------------------------------------------
| AMBIL DATA CLIENT
|--------------------------------------------------------------------------
*/

        $queryClients = mysqli_query($conn, "
    SELECT 
        id,
        client_name,
        client_pic,
        client_desc
    FROM list_clients
    ORDER BY id DESC
");

        $totalClients = mysqli_num_rows($queryClients);
        ?>

        <?php if ($totalClients <= 0): ?>

            <section class="marquees-wrapper">
                <!-- POLICE LINE ATAS -->
                <div class="marquee marquee-1">
                    <ul class="marquee__content scroll">
                        <li>Police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                    </ul>
                    <ul class="marquee__content scroll" aria-hidden="true">
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                    </ul>
                </div>

                <main>
                    <!-- 404 area start -->
                    <div
                        class="error-area bg-default"
                        data-background="assets/img/404/bg.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="error-content text-center">
                                        <h1
                                            class="error-content-title wow fadeInUp"
                                            data-wow-delay="0.1s">
                                            404
                                        </h1>
                                        <h2
                                            class="error-content-subtitle wow fadeInUp"
                                            data-wow-delay="0.3s">
                                            Oops! Page Not Found
                                        </h2>
                                        <p
                                            class="error-content-text wow fadeInUp"
                                            data-wow-delay="0.5s">
                                            Jadilah pelanggan Konig Guard Bureau
                                        </p>
                                        <a
                                            href="https://wa.me/628111902759"
                                            target="_blank"
                                            class="btn_mitra">
                                            <span>Layanan Marketing Kami</span>
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 404 area end -->
                </main>

                <div class="marquee marquee-2">
                    <ul class="marquee__content scroll">
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                    </ul>
                    <ul class="marquee__content scroll" aria-hidden="true">
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                        <li>police line do not cross</li>
                        <li>·</li>
                        <li>crime scene do not cross</li>
                        <li>·</li>
                    </ul>
                </div>
            </section>

        <?php else: ?>

            <!-- =========================
        Klien Kami
========================== -->

            <section class="client-section pt-80 pb-80">
                <div class="container">

                    <!-- TITLE -->
                    <div class="heading-layout2 text-center mb-50">
                        <span class="heading__subtitle">
                            Mitra Pengamanan
                        </span>

                        <h2 class="heading__title">
                            <span>Klien </span> Kami
                        </h2>

                        <p class="heading__desc">
                            Beberapa perusahaan dan instansi yang telah mempercayai layanan kami.
                        </p>
                    </div>

                    <!-- GRID -->
                    <div class="client-grid">
                        <?php while ($client = mysqli_fetch_assoc($queryClients)) : ?>

                            <!-- ITEM -->
                            <div class="client-item"
                                onclick="openClient('<?php echo htmlspecialchars($client['client_pic']); ?>', '<?php echo htmlspecialchars($client['client_name']); ?>', '<?php echo htmlspecialchars($client['client_desc']); ?>')">

                                <div class="client-frame">
                                    <?php
                                    /*
                            |--------------------------------------------------------------------------
                            | LOKASI FILE GAMBAR
                            |--------------------------------------------------------------------------
                            | Karena homepage dan dashboard beda folder:
                            |
                            | contoh:
                            | ../dashboard/assets/uploads/clients/
                            |
                            | sesuaikan sendiri nanti
                            |--------------------------------------------------------------------------
                            */
                                    ?>
                                    <img
                                        src="../dashboard/assets/uploads/clients/<?php echo htmlspecialchars($client['client_pic']); ?>" style="width: 1400px;"
                                        alt="<?php echo htmlspecialchars($client['client_name']); ?>">

                                    <div class="client-overlay">
                                        <h4><?php echo htmlspecialchars($client['client_name']); ?></h4>
                                        <p><?php echo htmlspecialchars($client['client_desc']); ?></p>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    </div>

                </div>
            </section>

        <?php endif; ?>

        <!-- =========================
        MODAL KLIEN
========================== -->

        <div class="client-modal" id="clientModal">

            <span class="client-close" onclick="closeClient()">
                &times;
            </span>

            <div class="client-modal-content">

                <img id="clientImage">

                <div class="client-info">
                    <h3 id="clientTitle"></h3>
                    <p id="clientSubtitle"></p>
                </div>

            </div>

        </div>

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

    <?php include 'includes/ad_modal.php'; ?>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        function openClient(image, title, subtitle) {

            document.getElementById("clientModal")
                .classList.add("active");

            document.getElementById("clientImage")
                .src = image;

            document.getElementById("clientTitle")
                .innerText = title;

            document.getElementById("clientSubtitle")
                .innerText = subtitle;
        }

        function closeClient() {

            document.getElementById("clientModal")
                .classList.remove("active");
        }

        /* CLOSE CLICK OUTSIDE */

        document.getElementById("clientModal")
            .addEventListener("click", function(e) {

                if (e.target.id === "clientModal") {
                    closeClient();
                }

            });
    </script>
</body>

</html>