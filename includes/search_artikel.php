<?php
session_start();

require_once __DIR__ . "/../koneksi.php";

header('Content-Type: text/html; charset=UTF-8');

$keyword = trim($_GET['keyword'] ?? '');

if (empty($keyword)) {
    exit;
}

/*
|--------------------------------------------------------------------------
| QUERY
|--------------------------------------------------------------------------
*/
$sql = "
    SELECT 
        p.id,
        p.title_post,
        pc.name_category
    FROM post p
    LEFT JOIN post_category pc
        ON p.id_post_category = pc.id
    WHERE p.title_post LIKE ?
    ORDER BY p.created_at DESC
    LIMIT 5
";

$stmt = mysqli_prepare($conn, $sql);

/*
|--------------------------------------------------------------------------
| CHECK ERROR QUERY
|--------------------------------------------------------------------------
*/
if (!$stmt) {

    echo '
    <div class="no-result">
        Query Error
    </div>';

    exit;
}

$search = "%{$keyword}%";

mysqli_stmt_bind_param($stmt, "s", $search);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

/*
|--------------------------------------------------------------------------
| HASIL
|--------------------------------------------------------------------------
*/
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_assoc($result)) {

?>

        <a
            href="artikel_detail.php?id=<?= $row['id'] ?>"
            class="search-item">

            <div class="search-title">
                <?= htmlspecialchars(
                    mb_strimwidth(
                        $row['title_post'],
                        0,
                        70,
                        '...'
                    )
                ) ?>
            </div>

            <div class="search-category">
                <?= htmlspecialchars($row['name_category'] ?? '-') ?>
            </div>

        </a>

<?php
    }
} else {

    echo '
    <div class="no-result">
        Artikel tidak ditemukan
    </div>';
}
?>