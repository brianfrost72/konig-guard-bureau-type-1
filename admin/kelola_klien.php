<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
    exit;
}

$msg = '';
$error = '';

/* =========================
   PROSES HAPUS KLIEN
========================= */
if (isset($_GET['action']) && $_GET['action'] == 'del') {
    $id = intval($_GET['id']);

    // Ambil nama file gambar
    $imgQuery = mysqli_query($con, "SELECT gambar FROM tblklien WHERE id='$id'");
    $rowImg = mysqli_fetch_assoc($imgQuery);

    if ($rowImg) {
        $imgPath = "assets/images/klien/" . $rowImg['gambar'];
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
    }

    $query = mysqli_query($con, "DELETE FROM tblklien WHERE id='$id'");

    if ($query) {
        $msg = "Klien berhasil dihapus.";
    } else {
        $error = "Gagal menghapus klien.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kelola Klien | KONIG KONTEN</title>
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
                                <h4 class="page-title">Kelola Klien</h4>
                                <ol class="breadcrumb p-0 m-0">
                                    <li><a href="#">Admin</a></li>
                                    <li class="active">Klien</li>
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

                                <a href="tambah_klien.php" class="btn btn-success m-b-20">
                                    <i class="fa fa-plus"></i> Tambah Klien
                                </a>

                                <div class="table-responsive">
                                    <table class="table table-colored table-centered table-inverse m-0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Logo</th>
                                                <th>Nama Klien</th>
                                                <th>Deskripsi</th>
                                                <th>Tgl Dibuat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $query = mysqli_query($con, "SELECT * FROM tblklien ORDER BY id DESC");
                                            if (mysqli_num_rows($query) == 0) {
                                            ?>
                                                <tr>
                                                    <td colspan="6" align="center">
                                                        <h4 style="color:red">Belum ada data klien.</h4>
                                                    </td>
                                                </tr>
                                                <?php
                                            } else {
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $cnt; ?></td>

                                                        <td>
                                                            <img src="assets/images/klien/<?php echo htmlentities($row['gambar']); ?>"
                                                                width="120" style="border-radius:6px;">
                                                        </td>

                                                        <td><?php echo htmlentities($row['judul']); ?></td>

                                                        <td><?php echo htmlentities($row['deskripsi']); ?></td>

                                                        <td><?php echo htmlentities($row['tgl_dibuat']); ?></td>

                                                        <td>
                                                            <a href="kelola_klien.php?id=<?php echo $row['id']; ?>&action=del"
                                                                onclick="return confirm('Yakin ingin menghapus klien ini?')">
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