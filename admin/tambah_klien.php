<?php
session_start();
include('includes/config.php');

/* =========================
   AKTIFKAN ERROR (DEV ONLY)
========================= */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* =========================
   CEK LOGIN
========================= */
if (!isset($_SESSION['login']) || strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit;
}

$msg = '';
$error = '';

/* =========================
   PROSES SUBMIT
========================= */
if (isset($_POST['submit'])) {

    $judul      = mysqli_real_escape_string($con, $_POST['judul']);
    $deskripsi  = mysqli_real_escape_string($con, $_POST['deskripsi']);
    $imgfile    = $_FILES['gambar']['name'];

    if (empty($judul) || empty($deskripsi)) {
        $error = "Judul dan deskripsi wajib diisi";
    } elseif (empty($imgfile)) {
        $error = "Gambar klien wajib diupload";
    } else {

        $extension = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

        if (!in_array($extension, $allowed_extensions)) {
            $error = "Format gambar tidak diizinkan (jpg, jpeg, png, gif, webp)";
        } else {

            $imgnewfile = md5(time() . $imgfile) . "." . $extension;

            $uploadDir = "assets/images/klien/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $imgnewfile)) {

                $query = mysqli_query($con, "
                    INSERT INTO tblklien (gambar, judul, deskripsi, tgl_dibuat)
                    VALUES ('$imgnewfile', '$judul', '$deskripsi', NOW())
                ");

                if ($query) {
                    $msg = "Data klien berhasil ditambahkan";
                } else {
                    $error = "Query gagal: " . mysqli_error($con);
                }
            } else {
                $error = "Upload gambar gagal";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Klien | KONIG KONTEN</title>

    <link href="assets/images/favicon.png" rel="icon" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/core.css" rel="stylesheet" />
    <link href="assets/css/components.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet" />
    <link href="assets/css/pages.css" rel="stylesheet" />
    <link href="assets/css/menu.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />

    <script src="assets/js/modernizr.min.js"></script>
</head>

<body class="fixed-left">

    <div id="wrapper">

        <?php include('includes/topheader.php'); ?>
        <?php include('includes/leftsidebar.php'); ?>

        <div class="content-page">
            <div class="content">
                <div class="container">

                    <!-- PAGE TITLE -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Tambah Klien</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Klien</a></li>
                                    <li class="active">Tambah Klien</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ALERT -->
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success">
                                    <strong>Sukses!</strong> <?php echo htmlentities($msg); ?>
                                </div>
                            <?php } ?>

                            <?php if ($error) { ?>
                                <div class="alert alert-danger">
                                    <strong>Error!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- FORM -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="card-box">
                                <h4 class="header-title m-b-20">Form Tambah Klien</h4>

                                <form method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Nama / Judul Klien</label>
                                        <input type="text" name="judul" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Klien</label>
                                        <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Logo / Gambar Klien</label>
                                        <input type="file" name="gambar" class="form-control" required>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success">
                                        Simpan Klien
                                    </button>

                                    <a href="kelola_klien.php" class="btn btn-default">
                                        Kembali
                                    </a>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include('includes/footer.php'); ?>
        </div>

    </div>

    <script>
        let resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>