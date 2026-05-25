<?php
session_start();

require_once 'koneksi.php';

if (!isset($_SESSION['google_user'])) {
    die("Harus login");
}

$id_post = (int) $_POST['id_post'];

$comment = mysqli_real_escape_string(
    $conn,
    $_POST['comment']
);

$name = mysqli_real_escape_string(
    $conn,
    $_SESSION['google_user']['name']
);

$email = mysqli_real_escape_string(
    $conn,
    $_SESSION['google_user']['email']
);

$picture = mysqli_real_escape_string(
    $conn,
    $_SESSION['google_user']['picture']
);

mysqli_query($conn, "
    INSERT INTO post_commenters (
        name_commenters,
        pict_commenters,
        email_commenters,
        comment,
        status,
        id_post,
        commenters_date
    ) VALUES (
        '$name',
        '$picture',
        '$email',
        '$comment',
        'Aktif',
        '$id_post',
        NOW()
    )
");

header("Location: artikel_detail.php?id=$id_post");
exit;
