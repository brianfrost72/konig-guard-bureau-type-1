<?php
session_start();

require_once __DIR__ . "/../koneksi.php";


// ======================
// AMBIL DATA VISITOR
// ======================

$ip_address = $_SERVER['REMOTE_ADDR'] ?? '';

$page_url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? '';

$referer = $_SERVER['HTTP_REFERER'] ?? '';


// ======================
// DETEKSI BROWSER
// ======================

$browser = 'Unknown';

if (stripos($user_agent, 'Edg') !== false) {

    $browser = 'Edge';
} elseif (stripos($user_agent, 'Chrome') !== false) {

    $browser = 'Chrome';
} elseif (stripos($user_agent, 'Firefox') !== false) {

    $browser = 'Firefox';
} elseif (stripos($user_agent, 'Safari') !== false) {

    $browser = 'Safari';
} elseif (stripos($user_agent, 'Opera') !== false || stripos($user_agent, 'OPR') !== false) {

    $browser = 'Opera';
}


// ======================
// DETEKSI DEVICE
// ======================

$device = 'Desktop';

if (preg_match('/tablet/i', $user_agent)) {

    $device = 'Tablet';
} elseif (preg_match('/mobile|android|iphone/i', $user_agent)) {

    $device = 'Mobile';
}


// ======================
// DETEKSI OS
// ======================

$operating_system = 'Unknown';

if (preg_match('/windows/i', $user_agent)) {

    $operating_system = 'Windows';
} elseif (preg_match('/android/i', $user_agent)) {

    $operating_system = 'Android';
} elseif (preg_match('/iphone|ipad/i', $user_agent)) {

    $operating_system = 'iOS';
} elseif (preg_match('/macintosh|mac os x/i', $user_agent)) {

    $operating_system = 'MacOS';
} elseif (preg_match('/linux/i', $user_agent)) {

    $operating_system = 'Linux';
}


// ======================
// UNIQUE VISITOR
// 1 IP + 1 PAGE + 1 HARI
// ======================

$stmt_check = mysqli_prepare($conn, "
    SELECT id
    FROM visitors
    WHERE ip_address = ?
    AND page_url = ?
    AND DATE(visit_date) = CURDATE()
    LIMIT 1
");

mysqli_stmt_bind_param(
    $stmt_check,
    "ss",
    $ip_address,
    $page_url
);

mysqli_stmt_execute($stmt_check);

$result_check = mysqli_stmt_get_result($stmt_check);


// ======================
// INSERT VISITOR
// ======================

if (mysqli_num_rows($result_check) == 0) {

    $stmt_insert = mysqli_prepare($conn, "
        INSERT INTO visitors (
            ip_address,
            page_url,
            browser,
            device,
            operating_system,
            user_agent,
            referer
        ) VALUES (
            ?, ?, ?, ?, ?, ?, ?
        )
    ");

    mysqli_stmt_bind_param(
        $stmt_insert,
        "sssssss",
        $ip_address,
        $page_url,
        $browser,
        $device,
        $operating_system,
        $user_agent,
        $referer
    );

    mysqli_stmt_execute($stmt_insert);
}
