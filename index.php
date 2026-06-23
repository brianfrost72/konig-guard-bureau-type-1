<?php include 'includes/visitor_tracker.php'; ?>

<?php
require_once "koneksi.php";

// ===============================
// AMBIL 3 POSTINGAN TERBARU
// ===============================
$queryPost = mysqli_query($conn, "
    SELECT 
        p.id,
        p.title_post,
        p.post_desc,
        p.post_img,
        p.created_at,
        c.name_category
    FROM post p
    LEFT JOIN post_category c 
        ON p.id_post_category = c.id
    ORDER BY p.id DESC
    LIMIT 3
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="" />
  <meta name="description" content="" />
  <link href="assets/images/favicon/favicon.png" rel="icon" />
  <title>
    KONIG GUARD BUREAU - Guarding With Honor, Protecting With Power
  </title>

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

  <style>
    .hero-slider .slider-btn {
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      pointer-events: none;
    }

    .hero-slider.show-nav .slider-btn {
      opacity: 1;
      visibility: visible;
      pointer-events: auto;
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


    <!-- =========================
        BANNER SLIDER
========================= -->

    <section class="hero-slider">

      <div class="slider-container">

        <!-- SLIDE 1 -->
        <div class="slide active">
          <img src="assets/images/sliders/idul_adha2026.png" alt="">
          <div class="slide-overlay"></div>

          <div class="slide-content">
            <span class="slider-subtitle">
              Welcome To Our Website
            </span>

            <h1>
              Modern Dashboard <br>
              UI Experience
            </h1>

            <p>
              Banner slider dengan animasi smooth, dot indicator,
              dan loading timer progress.
            </p>

            <a href="#" class="btn btn__secondary">
              Explore Now
            </a>
          </div>
        </div>

        <!-- SLIDE 2 -->
        <div class="slide">
          <img src="https://picsum.photos/id/1015/1600/700" alt="">
          <div class="slide-overlay"></div>

          <div class="slide-content">
            <span class="slider-subtitle">
              Elegant Design
            </span>

            <h1>
              Responsive <br>
              Banner Slider
            </h1>

            <p>
              Menggunakan CSS milik kamu dengan warna premium navy gold.
            </p>

            <a href="#" class="btn btn__primary">
              Get Started
            </a>
          </div>
        </div>

        <!-- SLIDE 3 -->
        <div class="slide">
          <img src="https://picsum.photos/id/1005/1600/700" alt="">
          <div class="slide-overlay"></div>

          <div class="slide-content">
            <span class="slider-subtitle">
              Smooth Animation
            </span>

            <h1>
              Auto Slider <br>
              With Timer Bar
            </h1>

            <p>
              Dilengkapi loading bar otomatis sebagai indikator pergantian slide.
            </p>

            <a href="#" class="btn btn__secondary">
              Learn More
            </a>
          </div>
        </div>

        <!-- BUTTON -->
        <button class="slider-btn prev">
          ❮
        </button>

        <button class="slider-btn next">
          ❯
        </button>

        <!-- DOT -->
        <div class="slider-dots">
          <span class="dot active"></span>
          <span class="dot"></span>
          <span class="dot"></span>
        </div>

        <!-- TIMER BAR -->
        <div class="timer-bar">
          <div class="timer-progress"></div>
        </div>

      </div>

    </section>

    <!-- ========================
      About Layout 1
    =========================== -->
    <section class="about-layout1 pt-130 pb-90 flip-item">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-7 col-xl-6">
            <div class="heading-layout2">
              <h3 class="heading__title mb-50">
                VISI &amp; MISI KONIG GUARD BUREAU
              </h3>
            </div>
            <!-- /heading -->
            <div class="about__Text">
              <p class="heading__desc mb-20">
                Menjadi perusahaan penyedia jasa keamanan dan layanan
                pendukung fasilitas yang terpercaya, profesional, dan
                berstandar tinggi untuk mendukung terciptanya lingkungan kerja
                yang aman, nyaman, dan produktif.
              </p>
              <strong>Misi Kami:</strong>
              <div class="row mt-20">
                <div class="col-sm-12 col-md-6">
                  <ul class="list-items-layout1 list-unstyled">
                    <li class="list__item">Melayani Dengan Integritas</li>
                    <li class="list__item">Membangun Rasa Aman</li>
                    <li class="list__item">Mendukung Operasional Anda</li>
                  </ul>
                </div>
                <!-- /.col-md-6 -->
                <div class="col-sm-12 col-md-6">
                  <ul class="list-items-layout1 list-unstyled">
                    <li class="list__item">Keamanan Untuk Bisnis</li>
                    <li class="list__item">Kepercayaan Tanpa Batas</li>
                    <li class="list__item">Pelayanan Yang Profesional</li>
                  </ul>
                </div>
                <!-- /.col-md-6 -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.col-xl-6 -->
          <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 offset-xl-1">
            <div class="video-banner-layout2 mb-50">
              <img src="assets/images/about/security.jpg" alt="about" />
            </div>
            <!-- /.video-banner -->
          </div>
          <!-- /.col-xl-5 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.About Layout 1 -->

    <!-- ========================
      Features layout 2
    ========================== -->
    <section class="fancyboxs-layout1 fancybox-light bg-dark pb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="heading heading-light mb-100 pr-5">
              <h3 class="heading__title mb-30 bounce-in">Layanan Kami</h3>
              <p class="heading__desc mb-30 bounce-in">
                Kami menawarkan tenaga Kerja Profesional, Siap Mendukung
                Bisnis Anda.
              </p>

              <div class="d-flex align-items-center flex-wrap">
                <div class="phone__number phone__number-light mb-10">
                  <div class="phone__icon">
                    <i class="icon-phone"></i>
                  </div>
                  <div>
                    <span class="email__link d-block">Hubungi Via WhatsApp</span>
                    <a
                      class="phone__link d-block mt-2 mb-0"
                      href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau"
                      target="_blank">0811 1902 759</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
      <div class="container-fluid px-0">
        <div class="row row-gutter-0" id="services-container"></div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- /.fancyboxs layout1 -->

    <!-- ========================
      About Layout 3
    =========================== -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 flip-item">
          <div class="heading text-center mb-40">
            <h2 class="heading__subtitle-nilai">Nilai-nilai utama di</h2>
            <h3 class="heading__title">Konig Guard Bureau</h3>
          </div>
          <!-- /.heading -->
        </div>
        <!-- /.col-lg-6 -->
      </div>
      <!-- /.heading -->
      <div class="row">
        <div class="col col--right">
          <ul class="grid">
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai1.jpg" />
                <figcaption>
                  <p>Tangkas</p>
                </figcaption>
              </figure>
            </li>
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai2.jpg" />
                <figcaption>
                  <p>Tangguh</p>
                </figcaption>
              </figure>
            </li>
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai3.jpg" />
                <figcaption>
                  <p>Kompeten</p>
                </figcaption>
              </figure>
            </li>
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai4.jpg" />
                <figcaption>
                  <p>Disiplin</p>
                </figcaption>
              </figure>
            </li>
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai5.jpg" />
                <figcaption>
                  <p>Tanggung Jawab</p>
                </figcaption>
              </figure>
            </li>
            <li
              class="flip-container bounce-in"
              ontouchstart="this.classList.toggle('hover');">
              <figure>
                <img src="assets/images/work-process/nilai6.jpg" />
                <figcaption>
                  <p>Amanah</p>
                </figcaption>
              </figure>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- ======================
     Clients
    ========================= -->
    <!-- <section class="clients border-top pt-50 pb-50">
      <div class="container">
        <div class="row d-flex justify-content-center bounce-in">
          <div class="col-sm-12 col-md-12 col-lg-8">
            <div
              class="slick-carousel"
              data-slick='{"slidesToShow": 4, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'>
              <div class="client">
                <img src="assets/images/clients/8.png" alt="client" />
              </div> -->
    <!-- /.client -->
    <!-- <div class="client">
                <img src="assets/images/clients/9.png" alt="client" />
              </div> -->
    <!-- /.client -->
    <!-- <div class="client">
                <img src="assets/images/clients/10.png" alt="client" />
              </div> -->
    <!-- /.client -->
    <!-- <div class="client">
                <img src="assets/images/clients/11.png" alt="client" />
              </div> -->
    <!-- /.client -->
    <!-- <div class="client">
                <img src="assets/images/clients/9.png" alt="client" />
              </div> -->
    <!-- /.client -->
    <!-- </div> -->
    <!-- /.carousel -->
    <!-- </div> -->
    <!-- /.col-lg-6 -->
    <!-- </div> -->
    <!-- /.row -->
    <!-- </div> -->
    <!-- /.container -->
    <!-- </section> -->
    <!-- /.Clients -->
    <!-- ======================
      Blog Grid
    ========================= -->
    <section class="blog-grid">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-3 flip-item">
            <div class="heading text-center mb-40">
              <h2 class="heading__subtitle">Temukan Postingan Terbaru</h2>
              <h3 class="heading__title">Artikel Terbaru</h3>
            </div>
            <!-- /.heading -->
          </div>
          <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <?php if (mysqli_num_rows($queryPost) > 0): ?>

            <?php while ($post = mysqli_fetch_assoc($queryPost)): ?>

              <?php
              // Format tanggal
              $tanggal = date('d F Y', strtotime($post['created_at']));

              // Batasi deskripsi
              $desc = strip_tags($post['post_desc']);
              $desc = substr($desc, 0, 120) . '...';
              ?>
              <div class="col-sm-12 col-md-6 col-lg-4 flip-item">
                <div class="post-item">
                  <div class="post__img">
                    <a href="artikel_detail?id=<?= $post['id']; ?>">
                      <img
                        src="myapp/dashboard/assets/images/uploads/posts/<?= $post['post_img']; ?>"
                        alt=""
                        loading="lazy" />
                    </a>
                    <div class="post__meta-cat">
                      <a href="artikel?kategori=<?= urlencode($post['name_category']); ?>">
                        <?= htmlspecialchars($post['name_category']); ?>
                      </a>
                    </div>
                    <!-- /.blog-meta-cat -->
                  </div>
                  <!-- /.post__img -->
                  <div class="post__body">
                    <h4 class="post__title">
                      <a href="artikel_detail?id=<?= $post['id']; ?>">
                        <?= htmlspecialchars($post['title_post']); ?>
                      </a>
                    </h4>
                    <div class="post__meta d-flex">
                      <span class="post__meta-date">
                        Terbit pada <?= $tanggal; ?>
                      </span>
                    </div>
                    <p class="post__desc-index">
                      <?= htmlspecialchars($desc); ?>
                    </p>
                    <a
                      href="artikel_detail?id=<?= $post['id']; ?>"
                      class="btn btn__secondary btn__outlined">
                      <i class="icon-arrow-right"></i>
                      <span>Read More</span>
                    </a>
                  </div>
                  <!-- /.post__body -->
                </div>
                <!-- /.post-item -->
              </div>
            <?php endwhile; ?>
          <?php else: ?>

            <div class="col-12 text-center">
              <p>Belum ada artikel terbaru.</p>
            </div>

          <?php endif; ?>

          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12 text-center">
            <a href="artikel" class="btn btn__secondary btn__link">
              <span>Cek Artikel Lainnya</span>
              <i class="icon-arrow-right icon-outlined"></i>
            </a>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- /.blog Grid -->

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
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

  <script>
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");
    const nextBtn = document.querySelector(".next");
    const prevBtn = document.querySelector(".prev");
    const progress = document.querySelector(".timer-progress");

    let current = 0;
    let interval;

    function showSlide(index) {

      slides.forEach(slide => slide.classList.remove("active"));
      dots.forEach(dot => dot.classList.remove("active"));

      slides[index].classList.add("active");
      dots[index].classList.add("active");

      progress.style.animation = "none";
      progress.offsetHeight;
      progress.style.animation = null;

    }

    function nextSlide() {
      current++;
      if (current >= slides.length) {
        current = 0;
      }
      showSlide(current);
    }

    function prevSlide() {
      current--;
      if (current < 0) {
        current = slides.length - 1;
      }
      showSlide(current);
    }

    nextBtn.addEventListener("click", () => {
      nextSlide();
      resetAutoSlide();
    });

    prevBtn.addEventListener("click", () => {
      prevSlide();
      resetAutoSlide();
    });

    dots.forEach((dot, index) => {
      dot.addEventListener("click", () => {
        current = index;
        showSlide(current);
        resetAutoSlide();
      });
    });

    function autoSlide() {
      interval = setInterval(() => {
        nextSlide();
      }, 5000);
    }

    function resetAutoSlide() {
      clearInterval(interval);
      autoSlide();
    }

    autoSlide();

    const heroSlider = document.querySelector(".hero-slider");

    let navTimeout;

    // tampilkan tombol
    function showSliderNav() {

      heroSlider.classList.add("show-nav");

      clearTimeout(navTimeout);

      navTimeout = setTimeout(() => {
        heroSlider.classList.remove("show-nav");
      }, 1000);

    }

    // mouse bergerak
    heroSlider.addEventListener("mousemove", showSliderNav);

    // touch screen
    heroSlider.addEventListener("touchstart", showSliderNav);

    // saat pertama load
    showSliderNav();
  </script>

</body>

</html>