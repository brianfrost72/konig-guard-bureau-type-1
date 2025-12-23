<?php
session_start();
include('koneksi.php');

/* =========================
   FLASH MESSAGE (SETELAH REDIRECT)
========================= */
if (!empty($_SESSION['comment_success'])) {
  echo "<script>alert('{$_SESSION['comment_success']}');</script>";
  unset($_SESSION['comment_success']);
}

/* =========================
   PROSES SUBMIT KOMENTAR
========================= */
if (isset($_POST['submit'])) {

  // VALIDASI FIELD WAJIB
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

  // AMANKAN INPUT
  $name    = mysqli_real_escape_string($con, $_POST['name']);
  $email   = mysqli_real_escape_string($con, $_POST['email']);
  $comment = mysqli_real_escape_string($con, $_POST['comment']);
  $postid  = intval($_GET['nid']);

  /* =========================
       FILE UPLOAD
    ========================= */
  $fileName = $_FILES['komen_Avatar']['name']; // STRING
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

  // FOLDER UPLOAD (REAL PATH)
  $uploadDir = __DIR__ . '/admin/avatar_komen/';
  if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
  }

  $avatarName = 'avatar_' . uniqid() . '.' . $ext;
  $uploadPath = $uploadDir . $avatarName;

  move_uploaded_file($tmpFile, $uploadPath);

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
  <title>Artikel - Security Systems HTML5 Template</title>

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
  <link rel="stylesheet" href="assets/css/libraries.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <div class="preloader">
      <div class="loading"><span></span><span></span><span></span><span></span></div>
    </div><!-- /.preloader -->

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
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Home</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="index.html" class="nav__item-link">Home Modern</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-classic.html" class="nav__item-link">Home Classic</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="home-shop.html" class="nav__item-link">Home Product</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Company</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="about-us.html" class="nav__item-link">About Us</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="how-it-works.html" class="nav__item-link">How It Works</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="team.html" class="nav__item-link">Leadership Team</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="awards.html" class="nav__item-link">Awards & Recognition</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="reviews.html" class="nav__item-link">Customers’ Reviews</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="pricing.html" class="nav__item-link">Packages & Pricing</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="locations.html" class="nav__item-link">Our Locations</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="faqs.html" class="nav__item-link">Help & FAQs</a>
                  </li> <!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="gallery.html" class="nav__item-link">Our Gallery</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="contact-us.html" class="nav__item-link">contact us</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="careers.html" class="nav__item-link">Careers</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Services & Industries</a>
                <ul class="dropdown-menu wide-dropdown-menu">
                  <li class="nav__item">
                    <div class="row mx-0">
                      <div class="col-sm-6 dropdown-menu-col">
                        <a href="services.html" class="nav__item-link dropdown-menu-title">Services</a>
                        <ul class="nav flex-column">
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">Business Security</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">Fire Detection</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">Access control</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">Alarm Systems</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">CCTV & Video</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="services-single.html">Smart Home</a>
                          </li> <!-- /.nav-item -->
                        </ul>
                      </div><!-- /.col-sm-6 -->
                      <div class="col-sm-6 dropdown-menu-col">
                        <a href="industries.html" class="nav__item-link dropdown-menu-title">Industries</a>
                        <ul class="nav flex-column">
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html">Pharmaceutic & Biotech</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html">Manufacturing & Logistics</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html">Healthcare Buildings</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html">Commercial Buildings</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html"> Finance & Banking</a>
                          </li> <!-- /.nav-item -->
                          <li class="nav__item">
                            <a class="nav__item-link" href="industries-single.html">Office Buildings</a>
                          </li> <!-- /.nav-item -->
                          <!-- /.nav-item -->
                        </ul>
                      </div><!-- /.col-sm-6 -->
                    </div><!-- /.row -->
                  </li><!-- /.nav-item -->
                </ul>
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link active">News & Media</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="blog.html" class="nav__item-link">Blog Grid</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="blog-single-post.html" class="nav__item-link">Single Blog Post</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="case-study-modern.html" class="nav__item-link">Case Studies Modern</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="case-study-grid.html" class="nav__item-link">Case Studies Grid</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="case-study-single.html" class="nav__item-link">Single Case Study</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
              <li class="nav__item has-dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav__item-link">Products</a>
                <ul class="dropdown-menu">
                  <li class="nav__item">
                    <a href="shop.html" class="nav__item-link">Shop Products</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="shop-single-product.html" class="nav__item-link">Single Product</a>
                  </li><!-- /.nav-item -->
                  <li class="nav__item">
                    <a href="shopping-cart.html" class="nav__item-link">Cart</a>
                  </li><!-- /.nav-item -->
                </ul><!-- /.dropdown-menu -->
              </li><!-- /.nav-item -->
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
                  <a class="phone__link d-block" href="tel:00201061245741">02 01061245741</a>
                  <a class="email__link d-block" href="mailto:Sekure@7oroof.com">Sekure@7oroof.com</a>
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
            <div class="blog-widget blog-comments-form mt-70">
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

                    <button type="submit" class="btn btn__primary btn__xl" name="submit">
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
                    <form class="widget__form-search">
                      <input type="text" class="form-control" placeholder="Search...">
                      <button class="btn" type="submit"><i class="icon-search"></i></button>
                    </form>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-search -->
                <div class="widget widget-posts">
                  <h5 class="widget__title mb-10">Recent Posts</h5>
                  <div class="widget__content">
                    <!-- post item #1 -->
                    <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="#"><img src="assets/images/blog/thumbs/2.jpg" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">Sep 19, 2022</span>
                        <h4 class="widget-post__title"><a href="#">How Non IT Roles Can Use Security Solutions to
                            Solve</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item -->
                    <!-- post item #2 -->
                    <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="#"><img src="assets/images/blog/thumbs/3.jpg" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">July 7, 2022</span>
                        <h4 class="widget-post__title"><a href="#">Why Should Manufacturing & Companies</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item -->
                    <!-- post item #3 -->
                    <div class="widget-post-item d-flex align-items-center">
                      <div class="widget-post__img">
                        <a href="#"><img src="assets/images/blog/thumbs/1.jpg" alt="thumb"></a>
                      </div><!-- /.widget-post-img -->
                      <div class="widget-post__content">
                        <span class="widget-post__date">March 13, 2022</span>
                        <h4 class="widget-post__title"><a href="#">CKey Security Considerations For Designing Smarter</a>
                        </h4>
                      </div><!-- /.widget-post-content -->
                    </div><!-- /.widget-post-item -->
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-posts -->
                <div class="widget widget-categories">
                  <h5 class="widget__title">Categories</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#"><span>Pharmaceutic & Biotech </span><span class="cat-count">4</span></a></li>
                      <li><a href="#"><span>Manufacturing & Logistics</span><span class="cat-count">0</span></a></li>
                      <li><a href="#"><span>Healthcare Buildings</span><span class="cat-count">3</span></a></li>
                      <li><a href="#"><span>Commercial Buildings</span><span class="cat-count">2</span></a></li>
                      <li><a href="#"><span>Finance & Banking</span><span class="cat-count">1</span></a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-categories -->
                <div class="widget widget-tags">
                  <h5 class="widget__title">Tags</h5>
                  <div class="widget-content">
                    <ul class="list-unstyled mb-0">
                      <li><a href="#">Insights</a></li>
                      <li><a href="#">Industry</a></li>
                      <li><a href="#">Modern</a></li>
                      <li><a href="#">Corporate</a></li>
                      <li><a href="#">Business</a></li>
                    </ul>
                  </div><!-- /.widget-content -->
                </div><!-- /.widget-tags -->
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
              <div class="col-sm-12 col-md-12 col-lg-3">
                <div class="footer-widget-contact">
                  <h6 class="footer-widget__title">Quick Contacts</h6>
                  <p>If you have any questions or need help, feel free to contact with our team.</p>
                  <ul class="contact__list list-unstyled">
                    <li>
                      <a href="mailto:Sekure@7oroof.com">
                        <i class="contact__icon icon-email"></i> <span>Sekure@7oroof.com</span>
                      </a>
                    </li>
                    <li>
                      <a href="tel:00201061245741">
                        <i class="contact__icon icon-phone"></i> <span>(002) 01061245741</span>
                      </a>
                    </li>
                  </ul>
                  <p>2307 Beverley Rd Brooklyn, New York 11226 United States.</p>
                  <a href="contact-us.html" class="btn btn__white btn__link mr-30">
                    <i class="fas fa-map-marker-alt"></i> <span>Get Directions</span>
                  </a>
                </div><!-- /.footer-widget-contact -->
              </div><!-- /.col-xl-2 -->
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="footer-widget-nav">
                  <h6 class="footer-widget__title">Company</h6>
                  <nav>
                    <ul class="list-unstyled">
                      <li><a href="about-us.html">About Us</a></li>
                      <li><a href="team.html">Leadership Team</a></li>
                      <li><a href="blog.html">News & Media</a></li>
                      <li><a href="shop.html">Our Products</a></li>
                      <li><a href="reviews.html">Reviews</a></li>
                    </ul>
                  </nav>
                </div><!-- /.footer-widget-nav -->
              </div><!-- /.col-lg-2 -->
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="footer-widget-nav">
                  <h6 class="footer-widget__title">Services</h6>
                  <nav>
                    <ul class="list-unstyled">
                      <li><a href="services-single.html">Business Security</a></li>
                      <li><a href="services-single.html">Fire Detection</a></li>
                      <li><a href="services-single.html">Access control</a></li>
                      <li><a href="services-single.html">Alarm Systems</a></li>
                      <li><a href="services-single.html">CCTV & Video</a></li>
                      <li><a href="services-single.html">Smart Home </a></li>
                    </ul>
                  </nav>
                </div><!-- /.footer-widget-nav -->
              </div><!-- /.col-lg-2 -->
              <div class="col-sm-6 col-md-4 col-lg-2">
                <div class="footer-widget-nav">
                  <h6 class="footer-widget__title">Help</h6>
                  <nav>
                    <ul class="list-unstyled">
                      <li><a href="#">Knowledge base</a></li>
                      <li><a href="#">Security resources</a></li>
                      <li><a href="#">Terms & Conditions</a></li>
                      <li><a href="#">Shipping Policy</a></li>
                      <li><a href="contact-us.html">Contact us</a></li>
                    </ul>
                  </nav>
                </div><!-- /.footer-widget-nav -->
              </div><!-- /.col-lg-2 -->
              <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="footer-widget-social text-right">
                  <h6 class="footer-widget__title">Have A Project?</h6>
                  <a href="" class="btn btn__primary mb-40">Get A Free Quote</a>
                  <ul class="social-icons list-unstyled justify-content-end mb-0">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  </ul><!-- /.social-icons -->
                </div><!-- /.footer-widget-social -->
              </div><!-- /.col-lg-2 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.footer-primary -->
        <div class="footer-scroll text-center">
          <button id="scrollTopBtn">
            <i class="fas fa-long-arrow-alt-up"></i>
            <span class="scroll__text">Back To Top</span>
          </button>
        </div><!-- /.footer-scroll -->
        <div class="footer-secondary bg-white">
          <div class="container">
            <div class="row align-items-center">
              <div
                class="col-sm-12 col-md-8 col-lg-12 col-xl-8 offset-xl-2 d-flex flex-wrap justify-content-between align-items-center">
                <div class="footer__copyrights">
                  <span class="fz-14">&copy; 2022 Sekure, All Rights Reserved. With Love by </span>
                  <a class="fz-14 color-primary" href="http://themeforest.net/user/7oroof">7oroof.com</a>
                </div>
                <nav>
                  <ul class="list-unstyled footer__copyright-links d-flex flex-wrap mb-0">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookies</a></li>
                  </ul>
                </nav>
              </div><!-- /.col-xl-10 -->
            </div><!-- /.row -->
          </div><!-- /.container -->
        </div><!-- /.footer-secondary -->
      </footer><!-- /.Footer -->
  </div><!-- /.wrapper -->
  <div class="search-popup">
    <button type="button" class="search-popup__close"><i class="fas fa-times"></i></button>
    <form class="search-popup__form">
      <input type="text" class="search-popup__form__input" placeholder="Type Words Then Enter">
      <button class="search-popup__btn"><i class="icon-search"></i></button>
    </form>
  </div><!-- /. search-popup -->

  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
</body>

</html>