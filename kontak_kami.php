<?php include 'includes/visitor_tracker.php'; ?>

<?php
require_once "koneksi.php";

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name_inbox     = htmlspecialchars(trim($_POST['name_inbox']));
    $email_inbox    = htmlspecialchars(trim($_POST['email_inbox']));
    $no_telp_inbox  = htmlspecialchars(trim($_POST['no_telp_inbox']));
    $id_services    = intval($_POST['id_services']);
    $inbox_title    = htmlspecialchars(trim($_POST['inbox_title']));
    $inbox_desc     = htmlspecialchars(trim($_POST['inbox_desc']));

    $uploadFileName = null;

    // =========================
    // UPLOAD IMAGE
    // =========================
    if (!empty($_FILES['inbox_attach']['name'])) {

        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

        $fileName = $_FILES['inbox_attach']['name'];
        $tmpName  = $_FILES['inbox_attach']['tmp_name'];
        $fileSize = $_FILES['inbox_attach']['size'];
        $error    = $_FILES['inbox_attach']['error'];

        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($ext, $allowedExt)) {

            if ($error === 0) {

                if ($fileSize < 5 * 1024 * 1024) {

                    $newName = time() . '_' . uniqid() . '.' . $ext;

                    $uploadDir = "assets/uploads/contact/";

                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $uploadPath = $uploadDir . $newName;

                    if (move_uploaded_file($tmpName, $uploadPath)) {
                        $uploadFileName = $newName;
                    } else {
                        $message = "Gagal upload gambar.";
                    }
                } else {
                    $message = "Ukuran gambar maksimal 5MB.";
                }
            } else {
                $message = "Terjadi kesalahan upload.";
            }
        } else {
            $message = "Format gambar hanya JPG, JPEG, PNG, WEBP.";
        }
    }

    // =========================
    // INSERT DATABASE
    // =========================
    if (empty($message)) {

        $stmt = mysqli_prepare($conn, "
            INSERT INTO contact_inbox 
            (
                name_inbox,
                email_inbox,
                no_telp_inbox,
                id_services,
                inbox_title,
                inbox_desc,
                inbox_attach,
                created_at
            )
            VALUES
            (?, ?, ?, ?, ?, ?, ?, NOW())
        ");

        mysqli_stmt_bind_param(
            $stmt,
            "sssisss",
            $name_inbox,
            $email_inbox,
            $no_telp_inbox,
            $id_services,
            $inbox_title,
            $inbox_desc,
            $uploadFileName
        );

        if (mysqli_stmt_execute($stmt)) {
            $message = "Pesan berhasil dikirim.";
        } else {
            $message = "Gagal mengirim pesan.";
        }
    }
}

// =========================
// GET SERVICES
// =========================
$servicesQuery = mysqli_query($conn, "
    SELECT id, service_name
    FROM services
    ORDER BY service_name ASC
");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Kontak Kami - KONIG GUARD BUREAU</title>

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Sora:wght@400;500;600;700&family=Roboto:wght@400;700&display=swap" />
    <link
        rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" />
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css" /> -->
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

        <!-- ========================= 
            Google Map
    =========================  -->
        <section class="google-map py-0">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d11218.50512602209!2d106.73444605771778!3d-6.218747505800484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sPuri%20Botanical%20Residence%20blok%20h9!5e0!3m2!1sid!2sid!4v1766570930005!5m2!1sid!2sid"
                height="620"
                style="width: 100%"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>
        <!-- /.GoogleMap -->

        <!-- ==========================
        contact layout 1
    =========================== -->
        <section class="contact-layout1 py-0 mt--100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-panel d-flex flex-wrap">
                            <div
                                class="contact-panel__info bg-overlay bg-overlay-primary flip-item">
                                <div class="bg-img">
                                    <img src="assets/images/banners/2.jpg" alt="banner" />
                                </div>
                                <h4 class="contact-panel__title color-white">
                                    Kepuasan Pelanggan adalah Prioritas kami
                                </h4>
                                <p class="contact-panel__desc color-white">
                                    Jika Anda memiliki pertanyaan, saran, atau masukan, jangan
                                    ragu untuk menghubungi kami. Tim kami siap membantu Anda
                                    dengan cepat dan profesional, memastikan solusi yang tepat
                                    sesuai dengan harapan Anda.
                                </p>
                                <ul class="contact__list list-unstyled mb-40">
                                    <li>
                                        <i class="icon-phone"></i><a
                                            href="https://wa.me/628111902759?text=Halo%20saya%20ingin%20bertanya%20tentang%20Konig%20Guard%20Bureau">WhatsApp: (+62) 811 1902 759</a>
                                    </li>
                                    <li></li>
                                    <li>
                                        <i class="icon-email"></i><a href="mailto:info@konig.co.id">Email: info@konig.co.id</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i>Lokasi: Puri Botanical Residence Blok H9 No.11, Jakarta, Indonesia
                                    </li>
                                    <li>
                                        <i class="icon-clock"></i>Senin - Jumat: 8:00 - 17:00
                                    </li>
                                </ul>
                            </div>
                            <form
                                class="contact-panel__form"
                                method="POST"
                                enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="contact-panel__title">Tetap Terhubung</h4>
                                        <p class="contact-panel__desc mb-30">
                                            Di sini, kami selalu berkomitmen untuk memberikan
                                            layanan terbaik dan memenuhi setiap kebutuhan Anda.
                                            Kepuasan pelanggan adalah prioritas utama kami, dan kami
                                            percaya bahwa setiap interaksi adalah kesempatan untuk
                                            menciptakan pengalaman yang menyenangkan.
                                        </p>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Name"
                                                name="name_inbox"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                class="form-control"
                                                placeholder="Email"
                                                name="email_inbox"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Phone"
                                                name="no_telp_inbox"
                                                required />
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <select class="form-control" name="id_services" required>

                                                <option value="">Pilih Layanan</option>

                                                <?php while ($service = mysqli_fetch_assoc($servicesQuery)) : ?>

                                                    <option value="<?= $service['id']; ?>">
                                                        <?= htmlspecialchars($service['service_name']); ?>
                                                    </option>

                                                <?php endwhile; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.col-lg-6 -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Subject"
                                                name="inbox_title" required />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea
                                                class="form-control"
                                                placeholder="Additional Details"
                                                name="inbox_desc"></textarea>
                                        </div>

                                        <div class="form-group">

                                            <label class="mb-2">Upload Gambar</label>

                                            <input
                                                type="file"
                                                class="form-control"
                                                name="inbox_attach"
                                                accept=".jpg,.jpeg,.png,.webp">

                                            <small>
                                                Format: JPG, JPEG, PNG, WEBP (Max 5MB)
                                            </small>

                                        </div>

                                        <?php if (!empty($message)) : ?>

                                            <div class="alert alert-info mb-3">
                                                <?= $message; ?>
                                            </div>

                                        <?php endif; ?>
                                        <button
                                            type="submit"
                                            class="btn btn__secondary btn__xl mt-10">
                                            <i class="icon-arrow-right"></i>
                                            <span>Submit Request</span>
                                        </button>
                                        <div class="contact-result"></div>
                                    </div>
                                    <!-- /.col-lg-12 -->
                                </div>
                                <!-- /.row -->
                            </form>
                        </div>
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.contact layout 1 -->

        <!-- ======================
       FAQ
    ========================= -->
        <section class="faq">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2 bounce-in">
                        <div class="heading-layout2 text-center mb-50">
                            <h3 class="heading__title">
                                Pertanyaan yang Sering Diajukan (FAQ)
                            </h3>
                            <p class="heading__desc px-xl-5">
                                Kami memahami bahwa Anda mungkin memiliki beberapa pertanyaan
                                terkait produk atau layanan kami. Untuk mempermudah, kami
                                telah menyusun daftar pertanyaan yang sering diajukan beserta
                                jawabannya. Jika Anda tidak menemukan jawaban yang Anda cari,
                                jangan ragu untuk menghubungi kami langsung.
                            </p>
                        </div>
                        <!-- /.heading -->
                    </div>
                    <!-- /.col-lg-8 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="accordion" id="accordion1">
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse1">
                                    <a class="accordion-item__title" href="#">Apa saja layanan yang Anda tawarkan?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse1"
                                    class="collapse"
                                    data-parent="#accordion1">
                                    <div class="accordion-item__body">
                                        <p>
                                            Kami menawarkan berbagai layanan; termasuk
                                            <i><span>Layanan Keamanan</span></i> : jasa
                                            security/satpam, jasa bodyguard, jasa pengamanan event,
                                            jasa detektif swasta.
                                            <i><span>Layanan fasilitas &amp; operasional</span></i>
                                            : Jasa driver, jasa cleaning service, jasa pengelolaan
                                            parkir, jasa pramubakti, jasa pengacara, dengan fokus
                                            pada kualitas dan kepuasan pelanggan.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse2">
                                    <a class="accordion-item__title" href="#">Bagaimana cara memesan layanan?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse2"
                                    class="collapse"
                                    data-parent="#accordion1">
                                    <div class="accordion-item__body">
                                        <p>
                                            Anda dapat memesan produk atau layanan melalui website
                                            kami atau menghubungi customer service kami untuk
                                            panduan lebih lanjut.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse3">
                                    <a class="accordion-item__title" href="#">Apa yang membedakan layanan Anda dengan yang lain?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse3"
                                    class="collapse show"
                                    data-parent="#accordion1">
                                    <div class="accordion-item__body">
                                        <p>
                                            Kami berkomitmen pada kualitas, pelayanan yang cepat,
                                            dan solusi yang sesuai dengan kebutuhan pelanggan.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse4">
                                    <a class="accordion-item__title" href="#">Bagaimana cara melakukan pembayaran?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse4"
                                    class="collapse"
                                    data-parent="#accordion1">
                                    <div class="accordion-item__body">
                                        <p>
                                            Kami menerima pembayaran melalui berbagai metode,
                                            termasuk transfer bank dan pembayaran digital.
                                            Pembayaran dapat dilakukan melalui rekening BCA kami
                                            untuk kenyamanan Anda.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse5">
                                    <a class="accordion-item__title" href="#">Apakah layanan keamanan Anda tersedia 24 jam?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse5"
                                    class="collapse"
                                    data-parent="#accordion1">
                                    <div class="accordion-item__body">
                                        <p>
                                            Ya, kami menyediakan layanan keamanan 24 jam, 7 hari
                                            dalam seminggu, untuk memastikan fasilitas Anda selalu
                                            terlindungi.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                        </div>
                        <!-- /.accordion -->
                    </div>
                    <!-- /.col-lg-6 -->
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="accordion" id="accordion2">
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse6">
                                    <a class="accordion-item__title" href="#">Bagaimana cara memastikan bahwa staf keamanan yang
                                        ditugaskan kompeten?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse6"
                                    class="collapse"
                                    data-parent="#accordion2">
                                    <div class="accordion-item__body">
                                        <p>
                                            Semua staf keamanan kami telah melalui pelatihan
                                            sertifikasi profesional dan memiliki pengalaman yang
                                            memadai untuk menangani berbagai situasi di lapangan.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse7">
                                    <a class="accordion-item__title" href="#">Apakah Anda menyediakan layanan bodyguard untuk individu
                                        atau grup?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse7"
                                    class="collapse show"
                                    data-parent="#accordion2">
                                    <div class="accordion-item__body">
                                        <p>
                                            Ya, kami menyediakan layanan bodyguard profesional baik
                                            untuk individu maupun grup, dengan pengamanan yang
                                            terpersonalisasi dan disesuaikan dengan tingkat
                                            kebutuhan keamanan Anda.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse8">
                                    <a class="accordion-item__title" href="#">Apakah saya bisa mengubah atau menambah layanan setelah
                                        kontrak dimulai?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse8"
                                    class="collapse"
                                    data-parent="#accordion2">
                                    <div class="accordion-item__body">
                                        <p>
                                            Tentu, kami fleksibel dalam menyesuaikan layanan sesuai
                                            kebutuhan Anda. Anda dapat menghubungi kami untuk
                                            membahas perubahan atau penambahan layanan.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse9">
                                    <a class="accordion-item__title" href="#">Bagaimana jika saya mengalami masalah dengan
                                        pembayaran?</a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse9"
                                    class="collapse"
                                    data-parent="#accordion2">
                                    <div class="accordion-item__body">
                                        <p>
                                            Jika ada masalah dengan pembayaran, seperti transaksi
                                            yang gagal, harap hubungi customer service kami segera
                                            untuk mendapatkan bantuan.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                            <div class="accordion-item bounce-in">
                                <div
                                    class="accordion-item__header"
                                    data-toggle="collapse"
                                    data-target="#collapse10">
                                    <a class="accordion-item__title" href="#">Bagaimana cara menghubungi customer service?
                                    </a>
                                </div>
                                <!-- /.accordion-item-header -->
                                <div
                                    id="collapse10"
                                    class="collapse"
                                    data-parent="#accordion2">
                                    <div class="accordion-item__body">
                                        <p>
                                            Anda dapat menghubungi kami melalui email, telepon, atau
                                            form kontak yang tersedia di website kami. Tim kami siap
                                            membantu Anda dengan pertanyaan atau masalah yang Anda
                                            hadapi.
                                        </p>
                                    </div>
                                    <!-- /.accordion-item-body -->
                                </div>
                            </div>
                            <!-- /.accordion-item -->
                        </div>
                        <!-- /.accordion -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>
        <!-- /.FAQ -->

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
                            <!-- <nav>
                  <ul
                    class="list-unstyled footer__copyright-links d-flex flex-wrap mb-0"
                  >
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Cookies</a></li>
                  </ul>
                </nav> -->
                        </div>
                        <!-- /.col-xl-10 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.footer-secondary -->
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