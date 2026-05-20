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

    $deskripsi = mysqli_real_escape_string($con, $_POST['description']);
    $imgfile   = $_FILES['galleryimage']['name'];

    if (empty($imgfile)) {
        $error = "Gambar wajib diupload";
    } else {

        $extension = strtolower(pathinfo($imgfile, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($extension, $allowed_extensions)) {
            $error = "Format gambar tidak diizinkan (jpg, jpeg, png, gif)";
        } else {

            $imgnewfile = md5(time() . $imgfile) . "." . $extension;

            $uploadDir = "assets/galeri/";

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (move_uploaded_file($_FILES['galleryimage']['tmp_name'], $uploadDir . $imgnewfile)) {


                $query = mysqli_query($con, "
                    INSERT INTO tblgaleri (gambar, deskripsi, tgl_dibuat)
                    VALUES ('$imgnewfile', '$deskripsi', NOW())
                ");

                if ($query) {
                    $msg = "Galeri berhasil ditambahkan";
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
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App favicon -->
    <link href="assets/images/favicon.png" rel="icon" />
    <!-- App title -->
    <title>Tambah Galeri | KONIG KONTEN</title>

    <!-- Summernote css -->
    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- Jquery filer css -->
    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include('includes/topheader.php'); ?>
        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/leftsidebar.php'); ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <div class="content">
                <div class="container">

                    <!-- ====== PAGE TITLE (WAJIB – TIDAK DIHAPUS) ====== -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Tambah Postingan Galeri</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Galeri</a></li>
                                    <li><a href="#">Tambah Galeri</a></li>
                                    <li class="active">Tambah Galeri</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                    <!-- ====== ALERT ====== -->
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success">
                                    <strong>Bagus!</strong> <?php echo htmlentities($msg); ?>
                                </div>
                            <?php } ?>

                            <?php if ($error) { ?>
                                <div class="alert alert-danger">
                                    <strong>Oh Tidak!</strong> <?php echo htmlentities($error); ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- ====== FORM ====== -->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="card-box">
                                <h4 class="header-title m-b-20">Tambah Galeri / Dokumentasi</h4>

                                <form method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <label>Upload Gambar</label>
                                        <input type="file" name="galleryimage" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea name="description" class="form-control" rows="4" required></textarea>
                                    </div>

                                    <button type="submit" name="submit" class="btn btn-success">
                                        Simpan Galeri
                                    </button>

                                </form>
                            </div>
                        </div>
                    </div>

                </div><!-- container -->
            </div><!-- content -->

            <?php include('includes/footer.php'); ?>
        </div>
    </div>

    <!-- JS -->
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