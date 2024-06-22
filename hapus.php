<?php
// Misalnya, ambil id dari parameter GET
$id = $_GET['id'];

// Koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query SQL untuk menghapus data mahasiswa berdasarkan id
$sql = "DELETE FROM daftar_mahasiswa WHERE id = $id";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus <a href='jawab1.php'><br><br>Kembali ke Daftar Mahasiswa</a>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>