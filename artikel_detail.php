<?php include 'includes/visitor_tracker.php'; ?>

<?php
require_once 'koneksi.php';

// ======================
// VALIDASI ID ARTIKEL
// ======================

if (!isset($_GET['id']) || empty($_GET['id'])) {
  die("Artikel tidak ditemukan");
}

$id_post = (int) $_GET['id'];


// ======================
// AMBIL DETAIL ARTIKEL
// ======================

$queryPost = mysqli_query($conn, "
    SELECT 
        post.id,
        post.title_post,
        post.post_desc,
        post.post_img,
        post.created_at,

        post_category.name_category,

        post_subcategory.name_subcategory

    FROM post

    LEFT JOIN post_category 
        ON post.id_post_category = post_category.id

    LEFT JOIN post_subcategory 
        ON post.id_post_subcategory = post_subcategory.id

    WHERE post.id = '$id_post'

    LIMIT 1
");

if (mysqli_num_rows($queryPost) == 0) {
  die("Artikel tidak ditemukan");
}

$post = mysqli_fetch_assoc($queryPost);

// ======================
// AMBIL KOMENTAR
// ======================

$queryComments = mysqli_query($conn, "
    SELECT *
    FROM post_commenters
    WHERE id_post = '$id_post'
    AND status = 'Aktif'
    ORDER BY commenters_date DESC
");

$total_comments = mysqli_num_rows($queryComments);


// ======================
// SHARE KE SOCIAL MEDIA
// ======================
$current_url = (
  isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on'
  ? "https"
  : "http"
) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$encoded_url = urlencode($current_url);

$encoded_title = urlencode($post['title_post']);

// ======================
// RECENT POSTS RANDOM
// ======================

// RANDOM ASC / DESC
$order_random = rand(0, 1) ? 'DESC' : 'ASC';

$queryRecent = mysqli_query($conn, "
    SELECT
        id,
        title_post,
        post_img,
        created_at
    FROM post
    WHERE id != '$id_post'
    ORDER BY created_at $order_random, RAND()
    LIMIT 3
");


// ======================
// CATEGORIES
// ======================

$queryCategories = mysqli_query($conn, "
    SELECT
        pc.id,
        pc.name_category,
        COUNT(p.id) as total_post

    FROM post_category pc

    LEFT JOIN post p
        ON p.id_post_category = pc.id

    GROUP BY pc.id

    ORDER BY pc.name_category ASC
");

// ======================
// FORMAT TANGGAL
// ======================

$tanggal_post = date('d M Y, H:i', strtotime($post['created_at']));
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <meta name="description" content="" />
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <title>Artikel Detail - KONIG GUARD BUREAU</title>

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
    .search-item:hover {
      background: #f5f5f5;
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
      class="page-title-layout3 page-title-light bg-overlay text-center">
      <div class="bg-img">
        <img src="assets/images/page-titles/pelatihan.jpg" alt="background" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="pagetitle__heading mb-0">Berita</h1>
            <nav>
              <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="/">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  Media &amp; Informasi
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Berita
                </li>
              </ol>
            </nav>
          </div>
          <!-- /.col-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.page-title -->

    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="page-title-layout6 pt-30 pb-30">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12">
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                  <?= htmlspecialchars($post['title_post']); ?>
                </li>
              </ol>
            </nav>
          </div>
          <!-- /.col-12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.page-title -->

    <!-- ======================
      Blog Single
    ========================= -->
    <section class="blog blog-single pt-0 pb-80">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="post-item mb-7">
              <div class="post__img">
                <a href="#">
                  <img
                    src="assets/images/blog/single/1.jpg"
                    alt="post image" />
                </a>
                <div
                  class="post__meta d-inline-flex align-items-center bg-white mb-0">
                  <div class="post__meta-cat">
                    <a href="#"><?= htmlspecialchars($post['name_category'] ?? 'Tanpa Kategori'); ?></a> <!-- Kategori -->
                  </div>
                  <!-- /.blog-meta-cat -->
                  <span class="post__meta-date">Terbit <?= $tanggal_post; ?> WIB</span>
                  <div class="post__meta-comments">

                    <i class="fas fa-comments"></i>

                    <a href="#comments">

                      <?= $total_comments; ?> Komentar

                    </a>

                  </div>
                </div>
                <!-- /.post__meta -->
              </div>
              <!-- /.post-img -->
              <div class="post__body">
                <h1 class="post__title mb-30">
                  <?= htmlspecialchars($post['title_post']); ?>
                </h1>
                <div class="post__desc">
                  <?= nl2br($post['post_desc']); ?>
                </div>
                <!-- /.post-desc -->
                <div
                  class="d-flex flex-wrap justify-content-between border-top pt-30">
                  <!-- /.blog-tags -->
                  <div class="blog-share ms-auto">
                    <strong class="d-block mb-10 color-heading">Share:</strong>
                    <ul class="list-unstyled social-icons d-flex mb-0">

                      <!-- FACEBOOK -->
                      <li>

                        <a
                          href="https://www.facebook.com/sharer/sharer.php?u=<?= $encoded_url; ?>"
                          target="_blank">
                          <i class="fab fa-facebook-f"></i>
                        </a>

                      </li>

                      <!-- LINKEDIN -->
                      <li>

                        <a
                          href="https://www.linkedin.com/sharing/share-offsite/?url=<?= $encoded_url; ?>"
                          target="_blank">
                          <i class="fab fa-linkedin"></i>
                        </a>

                      </li>

                      <!-- WHATSAPP -->
                      <li>

                        <a
                          href="https://wa.me/?text=<?= $encoded_title; ?>%20-%20<?= $encoded_url; ?>"
                          target="_blank">
                          <i class="fab fa-whatsapp"></i>
                        </a>

                      </li>

                      <!-- TWITTER / X -->
                      <li>

                        <a
                          href="https://twitter.com/intent/tweet?text=<?= $encoded_title; ?>&url=<?= $encoded_url; ?>"
                          target="_blank">
                          <i class="fab fa-twitter"></i>
                        </a>

                      </li>

                    </ul>
                  </div>
                  <!-- /.blog-share -->
                </div>
              </div>
            </div>
            <!-- /.post-item -->

            <div class="blog-comments mb-70" id="comments">

              <h5 class="blog-widget__title">
                <?= $total_comments; ?> Comments
              </h5>

              <ul class="comments-list list-unstyled">

                <?php if ($total_comments > 0) : ?>

                  <?php while ($comment = mysqli_fetch_assoc($queryComments)) : ?>

                    <li class="comment__item">

                      <div class="comment__avatar">
                        <img
                          src="<?= htmlspecialchars($comment['pict_commenters']); ?>"
                          alt="avatar"
                          style="
                                width:70px;
                                height:70px;
                                object-fit:cover;
                                border-radius:50%;
                            " />
                      </div>

                      <div class="comment__content">

                        <div class="d-flex align-items-center flex-wrap">

                          <h5 class="comment__author mr-20">
                            <?= htmlspecialchars($comment['name_commenters']); ?>
                          </h5>

                          <span class="comment__date">
                            <?= date('d M Y - H:i', strtotime($comment['commenters_date'])); ?>
                          </span>

                        </div>

                        <p class="comment__desc">
                          <?= nl2br(htmlspecialchars($comment['comment'])); ?>
                        </p>

                      </div>

                    </li>

                  <?php endwhile; ?>

                <?php else : ?>

                  <li>
                    <p>Belum ada komentar.</p>
                  </li>

                <?php endif; ?>

              </ul>

            </div>

            <div class="blog-widget blog-comments-form mb-30">

              <h5 class="blog-widget__title">
                Leave A Reply
              </h5>

              <?php if (!isset($_SESSION['google_user'])) : ?>

                <div class="mb-4">

                  <div
                    id="g_id_onload"
                    data-client_id="75124935836-5eatgjirbbcvsg1fl5ncn0a6a391g28t.apps.googleusercontent.com"
                    data-context="signin"
                    data-ux_mode="popup"
                    data-callback="handleCredentialResponse"
                    data-auto_prompt="false"></div>

                  <div
                    class="g_id_signin"
                    data-type="standard"
                    data-size="large"
                    data-theme="outline"
                    data-text="sign_in_with"
                    data-shape="rectangular"
                    data-logo_alignment="left"></div>

                </div>

              <?php else : ?>

                <div class="mb-4 d-flex align-items-center">

                  <img
                    src="<?= $_SESSION['google_user']['picture']; ?>"
                    width="50"
                    height="50"
                    style="border-radius:50%; object-fit:cover;"
                    class="me-3">

                  <div>
                    <strong>
                      <?= $_SESSION['google_user']['name']; ?>
                    </strong>

                    <br>

                    <small>
                      <?= $_SESSION['google_user']['email']; ?>
                    </small>
                  </div>

                </div>

                <form action="process_comment.php" method="POST">

                  <input
                    type="hidden"
                    name="id_post"
                    value="<?= $id_post; ?>">

                  <div class="form-group">

                    <textarea
                      name="comment"
                      class="form-control"
                      placeholder="Tulis komentar..."
                      required></textarea>

                  </div>

                  <button type="submit" class="btn btn__primary btn__xl">

                    <i class="icon-filled icon-arrow-right"></i>

                    <span>Kirim Komentar</span>

                  </button>

                </form>

              <?php endif; ?>

            </div>
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-sm-12 col-md-12 col-lg-4">
            <aside class="sidebar has-marign-left">
              <div class="widget widget-search bg-primary">
                <h5 class="widget__title color-white">Search</h5>
                <div class="widget__content">
                  <form
                    class="widget__form-search"
                    action="artikel.php"
                    method="GET"
                    autocomplete="off">

                    <div style="position:relative; width:100%;">

                      <input
                        type="text"
                        id="searchInput"
                        name="search"
                        class="form-control"
                        placeholder="Search..." />

                      <button class="btn" type="submit">
                        <i class="icon-search"></i>
                      </button>

                      <!-- DROPDOWN -->
                      <div
                        id="searchResult"
                        style="
                position:absolute;
                top:100%;
                left:0;
                width:100%;
                background:#fff;
                z-index:9999;
                border-radius:0 0 10px 10px;
                overflow:hidden;
                display:none;
            "></div>

                    </div>

                  </form>
                </div>
                <!-- /.widget-content -->
              </div>
              <!-- /.widget-search -->
              <div class="widget widget-posts">

                <h5 class="widget__title mb-10">
                  Recent Posts
                </h5>

                <div class="widget__content">

                  <?php while ($recent = mysqli_fetch_assoc($queryRecent)) : ?>

                    <div class="widget-post-item d-flex align-items-center">

                      <div class="widget-post__img">

                        <a href="artikel_detail.php?id=<?= $recent['id']; ?>">

                          <img
                            src="assets/images/blog/thumbs/1.jpg"
                            alt="thumb" />

                        </a>

                      </div>

                      <div class="widget-post__content">

                        <span class="widget-post__date">

                          <?= date('d M Y', strtotime($recent['created_at'])); ?>

                        </span>

                        <h4 class="widget-post__title">

                          <a href="artikel_detail.php?id=<?= $recent['id']; ?>">

                            <?= htmlspecialchars(
                              mb_strimwidth(
                                $recent['title_post'],
                                0,
                                55,
                                '...'
                              )
                            ); ?>

                          </a>

                        </h4>

                      </div>

                    </div>

                  <?php endwhile; ?>

                </div>

              </div>
              <!-- /.widget-posts -->
              <div class="widget widget-categories">

                <h5 class="widget__title">
                  Categories
                </h5>

                <div class="widget-content">

                  <ul class="list-unstyled mb-0">

                    <?php while ($category = mysqli_fetch_assoc($queryCategories)) : ?>

                      <li>

                        <a href="artikel.php?category=<?= $category['id']; ?>">

                          <span>

                            <?= htmlspecialchars($category['name_category']); ?>

                          </span>

                          <span class="cat-count">

                            <?= $category['total_post']; ?>

                          </span>

                        </a>

                      </li>

                    <?php endwhile; ?>

                  </ul>

                </div>

              </div>
              <!-- /.widget-categories -->
            </aside>
            <!-- /.sidebar -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.blog Single -->

    <!-- ========================
      Footer
    ========================== -->
    <footer class="footer">
      <?php include 'includes/footer.php'; ?>
    </footer>
    <!-- /.Footer -->
  </div>
  <!-- /.wrapper -->
  <div class="search-popup">
    <button type="button" class="search-popup__close">
      <i class="fas fa-times"></i>
    </button>
    <form class="search-popup__form">
      <input
        type="text"
        class="search-popup__form__input"
        placeholder="Type Words Then Enter" />
      <button class="search-popup__btn"><i class="icon-search"></i></button>
    </form>
  </div>
  <!-- /. search-popup -->
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
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

  <script>
    function handleCredentialResponse(response) {

      fetch('includes/google_login.php', {

          method: 'POST',

          headers: {
            'Content-Type': 'application/json'
          },

          body: JSON.stringify({
            credential: response.credential
          })

        })

        .then(res => res.json())

        .then(data => {

          if (data.status === 'success') {

            location.reload();

          } else {

            alert('Login gagal');

          }

        });

    }
  </script>

  <script>
    const searchInput = document.getElementById('searchInput');

    const searchResult = document.getElementById('searchResult');


    // ======================
    // SEARCH AJAX
    // ======================

    searchInput.addEventListener('keyup', function() {

      let keyword = this.value.trim();

      if (keyword.length < 1) {

        searchResult.style.display = 'none';

        searchResult.innerHTML = '';

        return;

      }

      fetch(
          'includes/search_artikel.php?keyword=' +
          encodeURIComponent(keyword)
        )

        .then(response => response.text())

        .then(data => {

          searchResult.innerHTML = data;

          searchResult.style.display = 'block';

        });

    });


    // ======================
    // HIDE DROPDOWN
    // ======================

    document.addEventListener('click', function(e) {

      if (
        !searchInput.contains(e.target) &&
        !searchResult.contains(e.target)
      ) {

        searchResult.style.display = 'none';

      }

    });
  </script>
</body>

</html>