<?php
// konfigurasi koneksi database
// $host = "localhost";      // biasanya localhost
// $username = "root";       // username database
// $password = "";           // password database
// $database = "newsportal"; // ganti dengan nama database kamu

// membuat koneksi
// $koneksi = new mysqli($host, $username, $password, $database);

// cek koneksi
// if ($koneksi->connect_error) {
//     die("Koneksi gagal: " . $koneksi->connect_error);
// }

// jika berhasil
// echo "Koneksi berhasil!";
$con = mysqli_connect("localhost", "root", "", "newsportal");
if (!$con) {
    error_log("DB connection failed: " . mysqli_connect_error());
}
