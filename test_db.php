<?php
// test_db.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "galaxipedia";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("❌ KONEKSI GAGAL: " . $conn->connect_error);
} else {
    echo "✅ KONEKSI BERHASIL!<br>";
}

// Test query
$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

if ($result) {
    echo "✅ QUERY BERHASIL! Jumlah data: " . $result->num_rows;
} else {
    echo "❌ QUERY GAGAL: " . $conn->error;
}

$conn->close();
?>