<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit;
}

/* =========================
   PROSES HAPUS GALERI
========================= */
if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $id = intval($_GET['id']);

    // Ambil nama file gambar
    $imgQuery = mysqli_query($con, "SELECT gambar FROM tblgaleri WHERE id='$id'");
    $rowImg = mysqli_fetch_assoc($imgQuery);

    if ($rowImg) {
        $imgPath = "assets/galeri/" . $rowImg['gambar'];
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
    }

    $query = mysqli_query($con, "DELETE FROM tblgaleri WHERE id='$id'");

    if ($query) {
        $msg = "Galeri berhasil dihapus.";
    } else {
        $error = "Gagal menghapus galeri.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Kelola Galeri | KONIG KONTEN</title>
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/core.css" rel="stylesheet">
    <link href="assets/css/components.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="assets/css/pages.css" rel="stylesheet">
    <link href="assets/css/menu.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

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
                                <h4 class="page-title">Kelola Galeri</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li><a href="#">Galeri</a></li>
                                    <li class="active">Kelola Galeri</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <!-- ALERT -->
                    <div class="row">
                        <div class="col-sm-6">
                            <?php if ($msg) { ?>
                                <div class="alert alert-success"><?php echo htmlentities($msg); ?></div>
                            <?php } ?>
                            <?php if ($error) { ?>
                                <div class="alert alert-danger"><?php echo htmlentities($error); ?></div>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- TABLE -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">

                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Deskripsi</th>
                                                <th>Tgl Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM tblgaleri ORDER BY id DESC");
                                            $rowcount = mysqli_num_rows($query);

                                            if ($rowcount == 0) {
                                            ?>
                                                <tr>
                                                    <td colspan="5" align="center">
                                                        <h4 style="color:red">Belum ada galeri.</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                $cnt = 1; // COUNTER NOMOR
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr>
                                                        <!-- NO -->
                                                        <td><?php echo htmlentities($cnt); ?></td>

                                                        <!-- GAMBAR -->
                                                        <td>
                                                            <img src="assets/galeri/<?php echo htmlentities($row['gambar']); ?>"
                                                                width="300" style="border-radius:6px;">
                                                        </td>

                                                        <!-- DESKRIPSI -->
                                                        <td><?php echo htmlentities($row['deskripsi']); ?></td>

                                                        <!-- TANGGAL -->
                                                        <td><?php echo htmlentities($row['tgl_dibuat']); ?></td>

                                                        <!-- AKSI -->
                                                        <td>
                                                            
                                                            &nbsp;
                                                            <a href="kelola_galeri.php?id=<?php echo $row['id']; ?>&action=del"
                                                                onclick="return confirm('Yakin ingin menghapus galeri ini?')">
                                                                <i class="fa fa-trash-o" style="color:#f05050;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                            <?php
                                                    $cnt++;
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>

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