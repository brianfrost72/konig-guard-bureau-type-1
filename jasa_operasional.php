<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Jasa Operasional - KONIG GUARD BUREAU</title>

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
      <section class="page-title-layout2 page-title-light bg-overlay">
        <div class="bg-img">
          <img
            src="assets/images/page-titles/layanan_operasional.jpg"
            alt="background"
          />
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-6">
              <h1 class="pagetitle__heading">
                Layanan Fasilitas &amp; Operasional
              </h1>
            </div>
            <!-- /.col-xl-6 -->
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
                    Jasa Fasilitas &amp; Operasional
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

      <!-- ======================
     Work Process 
    ========================= -->
      <section class="work-process-layout1 bg-overlay bg-overlay-gradient pb-0">
        <div class="bg-img">
          <img src="assets/images/banners/3.jpg" alt="background" />
        </div>
        <div class="container">
          <div class="row heading heading-light mb-70">
            <div class="col-12 bounce-in">
              <h2 class="heading__subtitle color-primary">
                Kenapa harus memilih Kami?!
              </h2>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 bounce-in">
              <h3 class="heading__title">
                Solusi yang Disesuaikan dengan Kebutuhan Anda
              </h3>
            </div>
            <!-- /.col-lg-5 -->
            <div class="col-sm-12 col-md-12 col-lg-6 offset-lg-1 bounce-in">
              <p class="heading__desc mb-30">
                Kami memahami setiap klien memiliki kebutuhan unik. Oleh karena
                itu, kami menyediakan layanan yang disesuaikan dengan kebutuhan
                spesifik perusahaan Anda, untuk memberikan solusi yang paling
                efektif dan efisien.
              </p>
            </div>
            <!-- /.col-lg-6 -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="processes-wrapper bg-white">
                <nav class="nav nav-tabs">
                  <a
                    class="nav__link active bounce-in"
                    data-toggle="tab"
                    href="#jasa_parkir"
                  >
                    <span class="nav__number">1</span>
                    <span>Jasa Petugas &amp; Pengelolaan Parkir</span>
                  </a>
                  <a
                    class="nav__link bounce-in"
                    data-toggle="tab"
                    href="#jasa_driver"
                  >
                    <span class="nav__number">2</span>
                    <span>Jasa Driver</span>
                  </a>
                  <a
                    class="nav__link bounce-in"
                    data-toggle="tab"
                    href="#jasa_cleaning_service"
                  >
                    <span class="nav__number">3</span>
                    <span>Jasa Cleaning Service</span>
                  </a>
                  <a
                    class="nav__link bounce-in"
                    data-toggle="tab"
                    href="#jasa_pramubakti"
                  >
                    <span class="nav__number">4</span>
                    <span>Jasa Pramubakti</span>
                  </a>
                  <a
                    class="nav__link bounce-in"
                    data-toggle="tab"
                    href="#jasa_pengacara"
                  >
                    <span class="nav__number">5</span>
                    <span>Jasa Pengacara</span>
                  </a>
                </nav>
                <div class="tab-content">
                  <div
                    class="tab-pane fade active show"
                    id="jasa_parkir"
                    data-key="pengelola_parkir"
                  >
                    <div class="process-item row">
                      <div class="col-lg-6-sm-12 col-md-12 col-lg-6 flip-item">
                        <div class="process__text">
                          <h4 class="process__title"></h4>
                          <p class="process__desc"></p>
                          <a
                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau%20-%20Jasa%20keamanan%20-%20jasa%20pengelolaan%20parkir"
                            class="btn btn__secondary btn__outlined btn__xl justify-content-around bounce-in"
                          >
                            <span>Pesan Sekarang</span>
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-12 col-lg-6 bounce-in">
                        <div class="process__img">
                          <img class="service-image" alt="img" />
                        </div>
                        <!-- /.process__img -->
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.process-item -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane fade" id="jasa_driver" data-key="driver">
                    <div class="process-item row">
                      <div class="col-lg-6-sm-12 col-md-12 col-lg-6 flip-item">
                        <div class="process__text">
                          <h4 class="process__title"></h4>
                          <p class="process__desc"></p>
                          <a
                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau%20-%20Jasa%20keamanan%20-%20jasa%20driver"
                            class="btn btn__secondary btn__outlined btn__xl justify-content-around bounce-in"
                          >
                            <span>Pesan Sekarang</span>
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-12 col-lg-6 bounce-in">
                        <div class="process__img">
                          <img class="service-image" alt="img" />
                        </div>
                        <!-- /.process__img -->
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.process-item -->
                  </div>
                  <!-- /.tab-pane -->
                  <div
                    class="tab-pane fade"
                    id="jasa_cleaning_service"
                    data-key="cleaning_service"
                  >
                    <div class="process-item row">
                      <div class="col-lg-6-sm-12 col-md-12 col-lg-6 flip-item">
                        <div class="process__text">
                          <h4 class="process__title"></h4>
                          <p class="process__desc"></p>
                          <a
                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau%20-%20Jasa%20keamanan%20-%20jasa%20cleaning%20service"
                            class="btn btn__secondary btn__outlined btn__xl justify-content-around bounce-in"
                          >
                            <span>Pesan Sekarang</span>
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-12 col-lg-6 bounce-in">
                        <div class="process__img">
                          <img class="service-image" alt="img" />
                        </div>
                        <!-- /.process__img -->
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.process-item -->
                  </div>
                  <!-- /.tab-pane -->
                  <div
                    class="tab-pane fade"
                    id="jasa_pramubakti"
                    data-key="pramubakti"
                  >
                    <div class="process-item row">
                      <div class="col-lg-6-sm-12 col-md-12 col-lg-6 flip-item">
                        <div class="process__text">
                          <h4 class="process__title"></h4>
                          <p class="process__desc"></p>
                          <a
                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau%20-%20Jasa%20keamanan%20-%20jasa%20pramubakti"
                            class="btn btn__secondary btn__outlined btn__xl justify-content-around bounce-in"
                          >
                            <span>Pesan Sekarang</span>
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-12 col-lg-6 bounce-in">
                        <div class="process__img">
                          <img class="service-image" alt="img" />
                        </div>
                        <!-- /.process__img -->
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.process-item -->
                  </div>
                  <!-- /.tab-pane -->
                  <div
                    class="tab-pane fade"
                    id="jasa_pengacara"
                    data-key="pengacara"
                  >
                    <div class="process-item row">
                      <div class="col-lg-6-sm-12 col-md-12 col-lg-6 flip-item">
                        <div class="process__text">
                          <h4 class="process__title"></h4>
                          <p class="process__desc"></p>
                          <a
                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau%20-%20Jasa%20keamanan%20-%20jasa%20pramubakti"
                            class="btn btn__secondary btn__outlined btn__xl justify-content-around bounce-in"
                          >
                            <span>Pesan Sekarang</span>
                            <i class="icon-arrow-right"></i>
                          </a>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-12 col-md-12 col-lg-6 bounce-in">
                        <div class="process__img">
                          <img class="service-image" alt="img" />
                        </div>
                        <!-- /.process__img -->
                      </div>
                      <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.process-item -->
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.container -->
      </section>
      <!-- /.Work Process -->

      <!-- ======================
     Clients
    ========================= -->
      <section class="clients pb-50 border-bottom bg-gray">
        <div class="container">
          <!-- <div class="row justify-content-center bounce-in">
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div
                class="slick-carousel"
                data-slick='{"slidesToShow": 4, "arrows": false, "dots": false, "autoplay": true,"autoplaySpeed": 2000, "infinite": true, "responsive": [ {"breakpoint": 992, "settings": {"slidesToShow": 3}}, {"breakpoint": 767, "settings": {"slidesToShow": 2}}, {"breakpoint": 480, "settings": {"slidesToShow": 2}}]}'
              >
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
        </div>
        <!-- /.container -->
      </section>
      <!-- /.Clients -->

      <!-- ======================
      features layout1
    ========================= -->
      <section class="features-layout1 pt-120 pb-90">
        <div class="container">
          <div class="row heading mb-30">
            <div class="col-sm-12 col-md-12 col-lg-7">
              <h3 class="heading__title bounce-in">
                Layanan Terpercaya dalam Menjamin Keamanan dan Kenyamanan Anda
              </h3>
              <p class="heading__desc font-weight-bold mb-30 bounce-in">
                Dengan pengalaman dan dedikasi yang tinggi, layanan kami
                menawarkan solusi keamanan yang tepat untuk berbagai kebutuhan.
                Berikut adalah beberapa keunggulan menggunakan jasa layanan
                kami:
              </p>
            </div>
            <!-- /.col-lg-6 -->
          </div>
          <!-- /.row -->
          <div class="row row-gutter-15 list-items-layout3">
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Profesionalisme Terpercaya</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Layanan 24/7</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Keamanan Terpadu</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Solusi Sesuai Kebutuhan</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Teknologi Terkini</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Pelayanan Cepat dan Responsif</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Harga Kompetitif</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Dukungan Profesional</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Kepuasan Pelanggan</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Reputasi Terjamin</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Pengalaman Luas</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
            <div class="col-sm-6 col-md-4 col-lg-3 bounce-in">
              <div class="list__item">Jaminan Perlindungan Maksimal</div>
              <!-- /.list__item -->
            </div>
            <!-- /.col-lg-3 -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /.features layout1 -->

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
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/operasional.js"></script>
  </body>
</html>
