<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Struktur Perusahaan - KONIG GUARD BUREAU</title>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
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
          class="preloader-logo"
        />
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
        class="page-title-layout1 page-title-light bg-overlay text-center"
      >
        <div class="bg-img">
          <img src="assets/images/page-titles/struktur.jpg" alt="background" />
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <h1 class="pagetitle__heading mb-0">Struktur Perusahaan</h1>
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
                    Struktur Perusahaan
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
        Team layout 1
    ========================== -->
      <section class="team-layout1 pt-130 pb-30">
        <div class="container">
          <div class="row">
            <!-- Member #1 -->
            <div class="col-sm-6 col-md-4 col-lg-4 bounce-in">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/1.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div
                  class="member__info d-flex align-items-center justify-content-between"
                >
                  <div>
                    <h5 class="member__name">Mike Dooley</h5>
                    <p class="member__desc">Chief Executive</p>
                  </div>
                  <ul class="social-icons list-unstyled mb-0">
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-linkedin"></i></a>
                    </li>
                  </ul>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-4 -->
            <!-- Member #2 -->
            <div class="col-sm-6 col-md-4 col-lg-4 bounce-in">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/2.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div
                  class="member__info d-flex align-items-center justify-content-between"
                >
                  <div>
                    <h5 class="member__name">Michael Brian</h5>
                    <p class="member__desc">Managing Director</p>
                  </div>
                  <ul class="social-icons list-unstyled mb-0">
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-4 -->
            <!-- Member #3 -->
            <div class="col-sm-6 col-md-4 col-lg-4 bounce-in">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/3.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div
                  class="member__info d-flex align-items-center justify-content-between"
                >
                  <div>
                    <h5 class="member__name">Chris Wensel</h5>
                    <p class="member__desc">Vice President</p>
                  </div>
                  <ul class="social-icons list-unstyled mb-0">
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-4 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /.Team layout 1  -->

      <!-- ========================
        Team layout 2
    ========================== -->
      <section class="team-layout2 text-center pt-0 pb-30">
        <div class="container">
          <div class="row">
            <!-- Member #1 -->
            <div class="col-sm-6 col-md-6 col-lg-3 flip-item">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/4.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div class="member__info">
                  <ul
                    class="social-icons justify-content-center list-unstyled mb-0"
                  >
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                  <h5 class="member__name">Richard Muldoone</h5>
                  <p class="member__desc">Legal Officer</p>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Member #2 -->
            <div class="col-sm-6 col-md-6 col-lg-3 flip-item">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/5.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div class="member__info">
                  <ul
                    class="social-icons justify-content-center list-unstyled mb-0"
                  >
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                  <h5 class="member__name">Maria Andaloro</h5>
                  <p class="member__desc">HR Officer</p>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Member #3 -->
            <div class="col-sm-6 col-md-6 col-lg-3 flip-item">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/6.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div class="member__info">
                  <ul
                    class="social-icons justify-content-center list-unstyled mb-0"
                  >
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                  <h5 class="member__name">Marian Chris</h5>
                  <p class="member__desc">Global Sales</p>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-3 -->
            <!-- Member #4 -->
            <div class="col-sm-6 col-md-6 col-lg-3 flip-item">
              <div class="member">
                <div class="member__img">
                  <img src="assets/images/team/7.jpg" alt="member img" />
                </div>
                <!-- /.member-img -->
                <div class="member__info">
                  <ul
                    class="social-icons justify-content-center list-unstyled mb-0"
                  >
                    <li>
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                  <h5 class="member__name">Jack Mudson</h5>
                  <p class="member__desc">Manager</p>
                </div>
                <!-- /.member-info -->
              </div>
              <!-- /.member -->
            </div>
            <!-- /.col-lg-3 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /.Team layout 2  -->

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
        viewBox="-1 -1 102 102"
      >
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
