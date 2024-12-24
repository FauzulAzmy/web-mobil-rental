<?php
$host = 'localhost';
$username = 'root'; // Ganti jika berbeda
$password = ''; // Ganti jika ada password
$dbname = 'crud_db';

$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
