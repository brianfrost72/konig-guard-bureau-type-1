<?php include 'includes/visitor_tracker.php'; ?>

<?php
require_once 'koneksi.php';

/*
|--------------------------------------------------------------------------
| CONFIG
|--------------------------------------------------------------------------
*/
$limit = 6;
$page  = isset($_GET['page']) ? (int) $_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

$start  = ($page - 1) * $limit;
$search = trim($_GET['search'] ?? '');

/*
|--------------------------------------------------------------------------
| QUERY SEARCH
|--------------------------------------------------------------------------
*/
$where = "";
$params = [];

if (!empty($search)) {
    $where = "WHERE p.title_post LIKE ? 
              OR p.post_desc LIKE ?
              OR pc.name_category LIKE ?";

    $keyword = "%$search%";

    $params = [$keyword, $keyword, $keyword];
}

/*
|--------------------------------------------------------------------------
| TOTAL DATA
|--------------------------------------------------------------------------
*/
$sqlTotal = "
    SELECT COUNT(*) as total
    FROM post p
    LEFT JOIN post_category pc 
        ON p.id_post_category = pc.id
    $where
";

$stmtTotal = mysqli_prepare($conn, $sqlTotal);

if (!empty($params)) {
    mysqli_stmt_bind_param($stmtTotal, "sss", ...$params);
}

mysqli_stmt_execute($stmtTotal);

$resultTotal = mysqli_stmt_get_result($stmtTotal);
$totalData   = mysqli_fetch_assoc($resultTotal)['total'];

$totalPage = ceil($totalData / $limit);

/*
|--------------------------------------------------------------------------
| GET DATA POST
|--------------------------------------------------------------------------
*/
$sql = "
    SELECT 
        p.id,
        p.title_post,
        p.id_post_category,
        p.id_post_subcategory,
        p.post_desc,
        p.post_img,
        p.created_at,
        pc.name_category
    FROM post p
    LEFT JOIN post_category pc 
        ON p.id_post_category = pc.id
    $where
    ORDER BY p.created_at DESC
    LIMIT ?, ?
";

$stmt = mysqli_prepare($conn, $sql);

if (!empty($params)) {

    mysqli_stmt_bind_param(
        $stmt,
        "sssii",
        $params[0],
        $params[1],
        $params[2],
        $start,
        $limit
    );
} else {

    mysqli_stmt_bind_param(
        $stmt,
        "ii",
        $start,
        $limit
    );
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="description" content="" />
    <link href="assets/images/favicon/favicon.png" rel="icon" />
    <title>Artikel - KONIG GUARD BUREAU</title>

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
        .form-group {
            position: relative;
        }

        #searchResult {
            position: absolute;
            top: calc(100% + 8px);
            left: 0;
            width: 100%;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0, 0, 0, 0.12);
            z-index: 99999;
            overflow: hidden;
            display: none;
            border: 1px solid #ececec;
        }

        .search-item {
            display: flex;
            flex-direction: column;
            padding: 14px 20px;
            text-decoration: none;
            transition: all .2s ease;
            border-bottom: 1px solid #f3f3f3;
        }

        .search-item:last-child {
            border-bottom: none;
        }

        .search-item:hover {
            background: #f5f7fb;
        }

        .search-title {
            font-size: 15px;
            font-weight: 600;
            color: #162c52;
            margin-bottom: 4px;
            line-height: 1.5;
        }

        .search-category {
            font-size: 12px;
            color: #8b8b8b;
        }

        .no-result {
            padding: 18px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <!-- <div id="preloader">
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
    </div> -->
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
        <section class="blog-grid">
            <div class="container">
                <div class="row justify-content-center mb-50">
                    <div class="col-lg-6 col-md-8 col-12">
                        <form action="" method="GET" autocomplete="off">

                            <div class="form-group mb-0 position-relative">

                                <input
                                    type="text"
                                    id="searchInput"
                                    name="search"
                                    class="form-control"
                                    placeholder="Cari berita atau artikel..."
                                    value="<?= htmlspecialchars($search) ?>">

                                <!-- DROPDOWN SUGGEST -->
                                <div id="searchResult"></div>

                                <button
                                    type="submit"
                                    style="position:absolute; top:50%; right:10px;
                                    transform:translateY(-50%); width:45px; height:45px;
                                    border-radius:50%; background:#162c52; color:white;
                                    display:flex; align-items:center; justify-content:center;
                                    border:none; z-index:99; ">

                                    <i class="fas fa-search"></i>

                                </button>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="row">
                    <?php if (mysqli_num_rows($result) > 0): ?>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <div class="post-item">
                                    <div class="post__img">
                                        <a href="artikel_detail.php?id=<?= $row['id'] ?>">
                                            <img
                                                src="assets/images/blog/grid/1.jpg"
                                                alt="post image"
                                                loading="lazy" />
                                        </a>
                                        <!-- KATEGORI -->
                                        <div class="post__meta-cat">
                                            <a href="#">
                                                <?= htmlspecialchars($row['name_category'] ?? '-') ?>
                                            </a>
                                        </div>
                                        <!-- /.blog-meta-cat -->
                                    </div>
                                    <!-- /.post__img -->
                                    <div class="post__body">
                                        <!-- JUDUL -->
                                        <h4 class="post__title">
                                            <a href="#">
                                                <?= htmlspecialchars($row['title_post']) ?>
                                            </a>
                                        </h4>
                                        <!-- TANGGAL DAN JAM -->
                                        <div class="post__meta d-flex">
                                            <span class="post__meta-date">
                                                <?= date('d F Y, H:i', strtotime($row['created_at'])) ?> WIB
                                            </span>
                                        </div>
                                        <!-- DESKRIPSI -->
                                        <p class="post__desc">
                                            <?= mb_strimwidth(strip_tags($row['post_desc']), 0, 150, '...') ?>
                                        </p>
                                        <a
                                            href="artikel_detail.php?id=<?= $row['id'] ?>"
                                            class="btn btn__secondary btn__outlined">
                                            <i class="icon-arrow-right"></i>
                                            <span>Baca Selengkapnya...</span>
                                        </a>
                                    </div>
                                    <!-- /.post__body -->
                                </div>
                                <!-- /.post-item -->
                            </div>
                            <!-- /.col-lg-4 -->
                        <?php endwhile; ?>

                    <?php else: ?>

                        <div class="col-12 text-center">
                            <h5>Artikel tidak ditemukan</h5>
                        </div>

                    <?php endif; ?>
                </div>
                <!-- PAGINATION -->
                <?php if ($totalPage > 1): ?>

                    <div class="row mt-50">
                        <div class="col-12 text-center">

                            <nav class="pagination-area">
                                <ul class="pagination justify-content-center mb-0">

                                    <!-- PREV -->
                                    <?php if ($page > 1): ?>
                                        <li>
                                            <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">
                                                <i class="icon-arrow-left"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php

                                    $startPage = max(1, $page - 2);
                                    $endPage   = min($totalPage, $page + 2);

                                    // HALAMAN PERTAMA
                                    if ($startPage > 1) {
                                        echo '
                        <li>
                            <a href="?page=1&search=' . urlencode($search) . '">
                                1
                            </a>
                        </li>';

                                        if ($startPage > 2) {
                                            echo '
                            <li>
                                <span style="padding:10px 15px;">...</span>
                            </li>';
                                        }
                                    }

                                    // HALAMAN TENGAH
                                    for ($i = $startPage; $i <= $endPage; $i++) {

                                        $active = ($i == $page) ? 'current' : '';

                                        echo '
                        <li>
                            <a 
                                class="' . $active . '"
                                href="?page=' . $i . '&search=' . urlencode($search) . '">

                                ' . $i . '

                            </a>
                        </li>';
                                    }

                                    // HALAMAN TERAKHIR
                                    if ($endPage < $totalPage) {

                                        if ($endPage < $totalPage - 1) {
                                            echo '
                            <li>
                                <span style="padding:10px 15px;">...</span>
                            </li>';
                                        }

                                        echo '
                        <li>
                            <a href="?page=' . $totalPage . '&search=' . urlencode($search) . '">
                                ' . $totalPage . '
                            </a>
                        </li>';
                                    }

                                    ?>

                                    <!-- NEXT -->
                                    <?php if ($page < $totalPage): ?>
                                        <li>
                                            <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </nav>

                        </div>
                    </div>

                <?php endif; ?>

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
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/script.js"></script>

    <script>
        $(document).ready(function() {

            let searchTimeout;

            $("#searchInput").on("keyup focus", function() {

                clearTimeout(searchTimeout);

                let keyword = $(this).val().trim();

                searchTimeout = setTimeout(function() {

                    if (keyword.length >= 1) {

                        $.ajax({
                            url: "search_artikel.php",
                            type: "GET",
                            data: {
                                keyword: keyword
                            },

                            beforeSend: function() {

                                $("#searchResult")
                                    .html(`
                            <div class="no-result">
                                Mencari...
                            </div>
                        `)
                                    .fadeIn(150);

                            },

                            success: function(response) {

                                $("#searchResult")
                                    .html(response)
                                    .fadeIn(150);

                            }

                        });

                    } else {

                        $("#searchResult").fadeOut(100);

                    }

                }, 250);

            });

            // klik luar tutup dropdown
            $(document).on("click", function(e) {

                if (!$(e.target).closest(".form-group").length) {

                    $("#searchResult").fadeOut(100);

                }

            });

        });
    </script>
</body>

</html>