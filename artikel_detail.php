<?php
session_start();
include('koneksi.php');

/* =========================
   BUAT CSRF TOKEN (SEKALI)
========================= */
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
}

/* =========================
   FLASH MESSAGE (SETELAH REDIRECT)
========================= */
if (!empty($_SESSION['comment_success'])) {
  echo "<script>alert('" . htmlspecialchars($_SESSION['comment_success']) . "');</script>";
  unset($_SESSION['comment_success']);
}

/* =========================
   PROSES SUBMIT KOMENTAR
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

  /* =========================
       VALIDASI CSRF
    ========================= */
  if (!isset($_POST['csrftoken']) || $_POST['csrftoken'] !== $_SESSION['token']) {
    die('Invalid CSRF token');
  }

  /* =========================
       VALIDASI FIELD
    ========================= */
  if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['comment']) ||
    empty($_FILES['komen_Avatar']['tmp_name'])
  ) {
    echo "<script>
                alert('Semua field WAJIB diisi termasuk avatar!');
                window.history.back();
              </script>";
    exit;
  }

  /* =========================
       AMANKAN INPUT
    ========================= */
  $name    = mysqli_real_escape_string($con, $_POST['name']);
  $email   = mysqli_real_escape_string($con, $_POST['email']);
  $comment = mysqli_real_escape_string($con, $_POST['comment']);
  $postid  = intval($_GET['nid']);

  /* =========================
       FILE UPLOAD
    ========================= */
  $fileName = $_FILES['komen_Avatar']['name'];
  $tmpFile  = $_FILES['komen_Avatar']['tmp_name'];
  $fileSize = $_FILES['komen_Avatar']['size'];

  $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  $allowed = ['jpg', 'jpeg', 'png', 'webp'];

  if (!in_array($ext, $allowed)) {
    echo "<script>alert('Format gambar tidak valid!');window.history.back();</script>";
    exit;
  }

  if ($fileSize > 2 * 1024 * 1024) {
    echo "<script>alert('Ukuran gambar maksimal 2MB!');window.history.back();</script>";
    exit;
  }

  /* =========================
       FOLDER UPLOAD
    ========================= */
  $uploadDir = __DIR__ . '/admin/avatar_komen/';
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  $avatarName = 'avatar_' . uniqid() . '.' . $ext;
  $uploadPath = $uploadDir . $avatarName;

  if (!move_uploaded_file($tmpFile, $uploadPath)) {
    die('Upload avatar gagal');
  }

  /* =========================
       INSERT DATABASE
    ========================= */
  mysqli_query($con, "
        INSERT INTO tblcomments
        (postId, name, email, comment, komen_Avatar, status)
        VALUES
        ('$postid', '$name', '$email', '$comment', '$avatarName', '0')
    ");

  /* =========================
       PRG PATTERN (ANTI DOBEL)
    ========================= */
  $_SESSION['comment_success'] = 'Komentar berhasil dikirim dan menunggu moderasi!';
  header("Location: artikel_detail.php?nid=" . $postid);
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="Sekure - Security Systems HTML5 Template">
  <link href="assets/images/favicon/favicon.png" rel="icon">
  <title>Artikel - KONIG GUARD BUREAU</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="assets/css/libraries.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="wrapper">

    <!-- =========================
        Header
    =========================== -->
    <header class="header header-light header-layout1">
      <nav class="navbar navbar-expand-lg sticky-navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
            <img src="assets/images/logo/logo_terang.png" class="logo-light" alt="logo">
            <img src="assets/images/logo/logo_terang.png" class="logo-dark" alt="logo">
          </a>
          <button class="navbar-toggler" type="button">
            <span class="menu-lines"><span></span></span>
          </button>
          <div class="collapse navbar-collapse" id="mainNavigation">
            <ul class="navbar-nav mx-auto">
              <li class="nav__item">
                <a href="/" class="nav__item-link">Beranda</a>
              </li>
              <li class="nav__item has-dropdown">
                <a
                  href="#"
                  data-toggle="dropdown"
                  class="dropdown-toggle nav__item-link">Tentang Kami</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="siapa_kami" class="nav__item-link">Siapa Kami?</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="legalitas" class="nav__item-link">Legalitas Perusahaan</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="struktur" class="nav__item-link">Struktur Perusahaan</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="karir" class="nav__item-link">Karir</a>
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
                  class="dropdown-toggle nav__item-link">Layanan Kami</a>
                <ul class="dropdown-menu wide-dropdown-menu">
                  <li class="nav__item">
                    <div class="row mx-0">
                      <div class="col-sm-6 dropdown-menu-col">
                        <a
                          href="jasa_keamanan"
                          class="nav__item-link dropdown-menu-title">Jasa Keamanan</a>
                        <ul class="nav flex-column">
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_keamanan#jasa_security">Pengamanan (Satpam)</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_keamanan#jasa_bodyguard">Bodyguard</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_keamanan#jasa_pengamanan_event">Pengamanan Event</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_keamanan#jasa_detektif_swasta">Detektif swasta</a>
                          </li>
                          <!-- /.nav-item -->
                        </ul>
                      </div>
                      <!-- /.col-sm-6 -->
                      <div class="col-sm-6 dropdown-menu-col">
                        <a
                          href="jasa_operasional"
                          class="nav__item-link dropdown-menu-title">Fasilitas & Operasional</a>
                        <ul class="nav flex-column">
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_operasional#jasa_parkir">Pengelolaan Parkir</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_operasional#jasa_driver">Jasa Driver</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_operasional#jasa_cleaning_service">Cleaning Services</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_operasional#jasa_pramubakti">Jasa Pramubakti</a>
                          </li>
                          <!-- /.nav-item -->
                          <li class="nav__item">
                            <a
                              class="nav__item-link"
                              href="jasa_operasional#jasa_pengacara">Jasa Pengacara</a>
                          </li>
                          <!-- /.nav-item -->
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
              <li class="nav__item has-dropdown">
                <a
                  href="#"
                  data-toggle="dropdown"
                  class="dropdown-toggle nav__item-link">Mitra &amp; Pelatihan</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="klien_kami" class="nav__item-link">Klien Kami</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="mitra_pelatihan" class="nav__item-link">Mitra Pelatihan</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="pelatihan_konig" class="nav__item-link">Pelatihan Khusus</a>
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
                  class="dropdown-toggle nav__item-link active">Media & Informasi</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="artikel" class="nav__item-link active">Artikel</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="testimony" class="nav__item-link">Testimoni Pelanggan</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="galeri" class="nav__item-link">Galeri</a>
                  </li>
                  <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="kontak_kami" class="nav__item-link">Kontak Kami</a>
                  </li>
                  <!-- /.nav-item -->
                </ul>
                <!-- /.dropdown-menu -->
              </li>
              <!-- /.nav-item -->
            </ul><!-- /.navbar-nav -->
            <button class="close-mobile-menu d-block d-lg-none"><i class="fas fa-times"></i></button>
          </div><!-- /.navbar-collapse -->
          <ul class="navbar-actions d-none d-xl-flex align-items-center list-unstyled mb-0">


            <!-- <li>
              <a href="#" class="btn btn__secondary action__btn action__btn-contact">Get A Quote</a>
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
        </div><!-- /.container -->
      </nav><!-- /.navabr -->
    </header><!-- /.Header -->

    <!-- ========================
       page title 
    =========================== -->
    <?php
    $pid = intval($_GET['nid']);
    $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
    while ($row = mysqli_fetch_array($query)) {

    ?>
      <section class="page-title-layout6 pt-30 pb-30">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb mb-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($row['posttitle']); ?></li>
                </ol>
              </nav>
            </div><!-- /.col-12 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.page-title -->

      <!-- ======================
      Blog Single
    ========================= -->

      <section class="blog blog-single pt-0 pb-80">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="post-item mb-0">
                <div class="post__img">
                  <a href="#">
                    <img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
                  </a>
                  <div class="post__meta d-inline-flex align-items-center bg-white mb-0">
                    <div class="post__meta-cat">
                      <a href="category.php?catid=<?php echo htmlentities($row['cid']) ?>"><?php echo htmlentities($row['category']); ?></a>
                    </div><!-- /.blog-meta-cat -->
                    <span class="post__meta-date">Terbit pada <?php echo htmlentities($row['postingdate']); ?></span>

                    <div class="post__meta-comments">comments <a href="#">3</a></div>
                  </div><!-- /.post__meta -->
                </div><!-- /.post-img -->
                <div class="post__body">
                  <h1 class="post__title mb-30">
                    <?php echo htmlentities($row['posttitle']); ?></h1>
                  <div class="post__desc">
                    <p><?php
                        echo $row['postdetails'];
                        ?></p>
                  </div><!-- /.post-desc -->

                  <div class="d-flex flex-wrap justify-content-end border-top pt-30">
                    <div class="blog-share">
                      <strong class="d-block mb-10 color-heading">Share:</strong>
                      <ul class="list-unstyled social-icons d-flex mb-0">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google"></i></a></li>
                      </ul>
                    </div><!-- /.blog-share -->
                  </div>
                </div>
              </div><!-- /.post-item -->
            <?php } ?><!-- /.blog-author  -->
            <?php
            $sts = 1;

            /* ======================
   HITUNG JUMLAH KOMENTAR
   ====================== */
            $countQuery = mysqli_query(
              $con,
              "SELECT COUNT(*) AS total 
   FROM tblcomments 
   WHERE postId='$pid' AND status='$sts'"
            );
            $countRow = mysqli_fetch_assoc($countQuery);
            $totalComments = $countRow['total'];
            ?>

            <div class="blog-comments mt-70">

              <!-- JUDUL JUMLAH KOMENTAR -->
              <h5 class="blog-widget__title">
                <?php echo $totalComments; ?> comment<?php echo ($totalComments != 1) ? 's' : ''; ?>
              </h5>

              <?php if ($totalComments > 0) { ?>

                <ul class="comments-list list-unstyled">

                  <?php
                  $query = mysqli_query(
                    $con,
                    "SELECT name, comment, postingDate, komen_Avatar
   FROM tblcomments
   WHERE postId='$pid' AND status='$sts'
   ORDER BY postingDate DESC"
                  );

                  while ($row = mysqli_fetch_array($query)) {
                  ?>

                    <li class="comment__item">
                      <div class="comment__avatar">
                        <img src="/konig-guard-bureau-utama/admin/avatar_komen/<?php echo $row['komen_Avatar'] ?: 'default.png'; ?>"
                          width="110" height="110"
                          alt="avatar" />
                      </div>

                      <div class="comment__content">
                        <div class="d-flex align-items-center">
                          <h5 class="comment__author mr-20">
                            <?php echo htmlentities($row['name']); ?>
                          </h5>
                          <span class="comment__date">
                            <?php echo htmlentities($row['postingDate']); ?>
                          </span>
                        </div>

                        <p class="comment__desc">
                          <?php echo htmlentities($row['comment']); ?>
                        </p>
                      </div>
                    </li>

                  <?php } ?>

                </ul>

              <?php } else { ?>

                <p class="text-muted">Belum ada komentar.</p>

              <?php } ?>

            </div>
            <!-- /.blog-comments -->
            <div class="blog-widget blog-comments-form mt-90">
              <h5 class="blog-widget__title">Leave A Reply</h5>
              <form name="comment" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                    <div class="form-group">
                      <input
                        type="text" name="name"
                        class="form-control"
                        placeholder="Name:" required />
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                      <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email:" required />
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="form-group">
                      <input type="file" name="komen_Avatar" class="form-control" accept="image/*">
                      <small>Upload avatar (jpg, png, max 2MB)</small>
                    </div>
                  </div>
                  <!-- /.col-lg-6 -->
                  <div class="col-12">
                    <div class="form-group">
                      <textarea
                        class="form-control" name="comment"
                        placeholder="Comment" required></textarea>
                    </div>
                    <!-- /.form-group -->

                    <button type="submit" class="btn btn__primary btn__xl mb-50" name="submit">
                      <i class="icon-filled icon-arrow-right"></i>
                      <span>Submit Comment</span>
                    </button>
                  </div>
                  <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
              </form>
            </div><!-- /.blog-comments-form -->
            </div><!-- /.col-lg-8 -->
            <div class="col-sm-12 col-md-12 col-lg-4">
              <aside class="sidebar has-marign-left">
                <div class="widget widget-search bg-primary">
                  <h5 class="widget__title color-white">Search</h5>
                  <div class="widget__content">
                    <form class="widget__form-search" name="search" action="search" method="post">
                      <input type="text" class="form-control"
                        name="searchtitle" placeholder="Cari Artikel..." required>
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <?php
                if (isset($_GET['pageno'])) {
                  $pageno = $_GET['pageno'];
                } else {
                  $pageno = 1;
                }
                $no_of_records_per_page = 3;
                $offset = ($pageno - 1) * $no_of_records_per_page;


                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                $result = mysqli_query($con, $total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);


                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
                while ($row = mysqli_fetch_array($query)) {

                ?>
                  <div class="widget widget-posts">
                    <h5 class="widget__title mb-10">Recent Posts</h5>
                    <div class="widget__content">
                      <!-- post item #1 -->
                      <div class="widget-post-item d-flex align-items-center">
                        <div class="widget-post__img">
                          <a href="artikel_detail?nid=<?php echo htmlentities($row['pid']) ?>"><img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="thumb"></a>
                        </div><!-- /.widget-post-img -->
                        <div class="widget-post__content">
                          <span class="widget-post__date">Terbit pada <?php echo htmlentities($row['postingdate']); ?></span>
                          <h4 class="widget-post__title"><a href="artikel_detail?nid=<?php echo htmlentities($row['pid']) ?>"><?php echo htmlentities($row['posttitle']); ?></a>
                          </h4>
                        </div><!-- /.widget-post-content -->
                      </div><!-- /.widget-post-item -->
                    </div><!-- /.widget-content -->
                  </div><!-- /.widget-posts -->
                <?php } ?>
                <div class="widget widget-categories">
                  <h5 class="widget__title">Categories</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <?php
                      $query = mysqli_query($con, "SELECT id, CategoryName FROM tblcategory");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <li>
                          <a href="category.php?catid=<?php echo htmlentities($row['CategoryName']); ?>">
                            <span><?php echo htmlentities($row['CategoryName']); ?></span>
                          </a>
                        </li>
                      <?php } ?>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
              </aside><!-- /.sidebar -->
            </div><!-- /.col-lg-4 -->
          </div><!-- /.row -->
        </div><!-- /.container -->
      </section><!-- /.blog Single -->

      <!-- ========================
      Footer
    ========================== -->
      <footer class="footer">
        <div class="footer-primary">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="footer-widget-contact">
                  <!-- <h6 class="footer-widget__title">Quick Contacts</h6> -->
                  <h5 class="ft-title">ABOUT <span>US</span></h5>

                  <a href="/"><img
                      src="assets/images/logo/logo_terang.png"
                      class="mb-20 w-100 h-60"
                      alt="logo-footer" /></a>
                  <p>
                    PT. KONIG GUARD BUREAU adalah Perusahaan Penyedia Jasa
                    Outsourcing yang menghadirkan layanan Security, Cleaning
                    Service, Administrasi, dan Driver untuk lingkungan kerja
                    yang AMAN, NYAMAN, dan PROFESIONAL.
                  </p>
                  <ul class="contact__list list-unstyled">
                    <li>
                      <a href="mailto:cs@konig.co.id">
                        <i class="contact__icon icon-email"></i>
                        <span>cs@konig.co.id</span>
                      </a>
                    </li>
                    <li>
                      <a href="tel:08111902759">
                        <i class="contact__icon icon-phone"></i>
                        <span>(+62) 811 1902 759</span>
                      </a>
                    </li>
                  </ul>
                  <p>Puri Botanical Residence Blok H9 No.11, Jakarta - Indonesia.</p>
                  <a href="kontak_kami" class="btn btn__white btn__link mr-30">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Get Directions</span>
                  </a>
                </div>
                <!-- /.footer-widget-contact -->
                <ul
                  class="social-icons list-unstyled justify-content-start mb-0">
                  <li>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                  </li>
                  <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
              <!-- /.col-lg-2 -->
              <div class="col-sm-6 col-md-4 col-lg-2 offset-lg-3">
                <div class="footer-widget-nav">
                  <!-- <h6 class="footer-widget__title">Services</h6> -->
                  <h5 class="ft-title">QUICK <span>LINK</span></h5>
                  <nav>
                    <ul class="list-unstyled">
                      <li>
                        <a href="siapa_kami">Siapa Kami</a>
                      </li>
                      <li><a href="legalitas">Legalitas Perusahaan</a></li>
                      <li><a href="struktur">Struktur Perusahaan</a></li>
                      <li><a href="galeri">Dokumentasi Perusahaan</a></li>
                      <li>
                        <a href="jasa_keamanan">Layanan Keamanan Kami</a>
                      </li>
                      <li>
                        <a href="jasa_operasional">Layanan Fasilitas &amp; Kami</a>
                      </li>
                      <li><a href="karir">Karir</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- /.footer-widget-nav -->
              </div>
              <!-- /.col-lg-2 -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="footer-widget-nav">
                  <!-- <h6 class="footer-widget__title">Help</h6> -->
                  <h5 class="ft-title">MITRA &amp; <span>TRAINING</span></h5>
                  <nav>
                    <ul class="list-unstyled">
                      <li><a href="klien_kami">Klien Kami</a></li>
                      <li>
                        <a href="mitra_pelatihan">Mitra Pelatihan</a>
                      </li>
                      <li>
                        <a href="pelatihan_konig">Pelatihan Khusus</a>
                      </li>
                      <li><a href="kontak_kami">Kontak Kami</a></li>
                    </ul>
                  </nav>
                </div>
                <!-- /.footer-widget-nav -->
              </div>
              <!-- /.col-lg-2 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.footer-primary -->
        <div class="footer-scroll text-center"></div>
        <!-- /.footer-scroll -->
        <div class="footer-secondary bg-white">
          <div class="container">
            <div class="row align-items-center">
              <div
                class="col-sm-12 col-md-8 col-lg-12 col-xl-8 offset-xl-2 d-flex flex-wrap justify-content-between align-items-center">
                <div class="footer__copyrights">
                  <span class="fz-14">&copy; 2025 Konig Guard Bureau, All Rights Reserved
                  </span>
                </div>
              </div>
              <!-- /.col-xl-10 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
        </div>
        <!-- /.footer-secondary -->
      </footer><!-- /.Footer -->
  </div><!-- /.wrapper -->
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
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>