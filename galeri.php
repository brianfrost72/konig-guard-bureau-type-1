<?php include 'includes/visitor_tracker.php'; ?>

<?php
require_once "koneksi.php";

/*
|--------------------------------------------------------------------------
| PAGINATION
|--------------------------------------------------------------------------
*/

$limit = 10;

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

if ($page < 1) {
  $page = 1;
}

$offset = ($page - 1) * $limit;

/*
|--------------------------------------------------------------------------
| TOTAL DATA
|--------------------------------------------------------------------------
*/

$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM gallery");

$totalData = mysqli_fetch_assoc($totalQuery)['total'];

$totalPages = ceil($totalData / $limit);

/*
|--------------------------------------------------------------------------
| AMBIL DATA GALLERY
|--------------------------------------------------------------------------
*/

$queryGallery = mysqli_query($conn, "
    SELECT id, name_gallery, picture, created_at
    FROM gallery
    ORDER BY id DESC
    LIMIT $limit OFFSET $offset
");

/*
|--------------------------------------------------------------------------
| CHECK DATA
|--------------------------------------------------------------------------
*/

$totalGallery = mysqli_num_rows($queryGallery);
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="" />
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <title>Galeri - KONIG GUARD BUREAU</title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap"
    rel="stylesheet" />

  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap" />
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/css/animation.css" />
  <link rel="stylesheet" href="assets/css/libraries.css" />
  <link rel="stylesheet" href="assets/css/style.css" />

  <style>
    .pagination-area {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    .pagination-number,
    .pagination-btn {
      min-width: 45px;
      height: 45px;
      padding: 0 15px;
      border-radius: 50px;
      background: #111;
      color: #fff;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      text-decoration: none;
      transition: 0.3s ease;
      font-weight: 600;
    }

    .pagination-number:hover,
    .pagination-btn:hover {
      background: #f5b301;
      color: #000;
    }

    .pagination-number.active {
      background: #f5b301;
      color: #000;
    }

    .pagination-dots {
      font-size: 20px;
      font-weight: bold;
      padding: 0 5px;
    }
  </style>
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
          src="assets/images/page-titles/layanan_keamanan.png"
          alt="background" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading mb-0">Gallery</h1>
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
                  Media &amp; Informasi
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Gallery
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
     gallery 
    =========================== -->
    <?php if ($totalGallery == 0): ?>
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
                      Coming Soon...
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
    <?php endif; ?>

    <section class="gallery pt-130 pb-90">
      <div class="container">
        <div class="row">
          <?php if ($totalGallery > 0): ?>

            <div class="gallery-container">

              <?php while ($gallery = mysqli_fetch_assoc($queryGallery)): ?>

                <figure class="polaroid">

                  <img
                    src="myapp/dashboard/assets/images/uploads/gallery/<?= htmlspecialchars($gallery['picture']); ?>"
                    alt="<?= htmlspecialchars($gallery['name_gallery']); ?>" />

                  <figcaption>
                    <?= htmlspecialchars($gallery['name_gallery']); ?>
                  </figcaption>

                </figure>

              <?php endwhile; ?>

            </div>

          <?php endif; ?>
        </div>
        <!-- /.row -->
        <!-- </div> -->

        <?php if ($totalPages > 1): ?>

          <div class="pagination-area text-center mt-60">

            <!-- PREV -->
            <?php if ($page > 1): ?>
              <a class="pagination-btn"
                href="?page=<?= $page - 1; ?>">
                Prev
              </a>
            <?php endif; ?>

            <?php
            $startPage = max(1, $page - 2);
            $endPage   = min($totalPages, $page + 2);
            ?>

            <!-- PAGE 1 -->
            <?php if ($startPage > 1): ?>
              <a class="pagination-number" href="?page=1">1</a>

              <?php if ($startPage > 2): ?>
                <span class="pagination-dots">...</span>
              <?php endif; ?>
            <?php endif; ?>

            <!-- PAGE LOOP -->
            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>

              <a class="pagination-number <?= ($i == $page) ? 'active' : ''; ?>"
                href="?page=<?= $i; ?>">

                <?= $i; ?>

              </a>

            <?php endfor; ?>

            <!-- LAST PAGE -->
            <?php if ($endPage < $totalPages): ?>

              <?php if ($endPage < $totalPages - 1): ?>
                <span class="pagination-dots">...</span>
              <?php endif; ?>

              <a class="pagination-number"
                href="?page=<?= $totalPages; ?>">

                <?= $totalPages; ?>

              </a>

            <?php endif; ?>

            <!-- NEXT -->
            <?php if ($page < $totalPages): ?>
              <a class="pagination-btn"
                href="?page=<?= $page + 1; ?>">
                Next
              </a>
            <?php endif; ?>

          </div>

        <?php endif; ?>

        <!-- LIGHTBOX -->
        <div class="lightbox" id="lightbox">
          <span class="lightbox-close">&times;</span>
          <img class="lightbox-img" src="" alt="" />
          <p class="lightbox-caption"></p>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.gallery -->

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
</body>

</html>