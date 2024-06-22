<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Ambil data yang dikirimkan melalui URL (parameter GET)
    $id = $_GET["id"];
    $nama = $_GET["nama"];
    $nim = $_GET["nim"];
    $prodi = $_GET["prodi"];

    // Koneksi ke database
    $conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query SQL untuk mengupdate data mahasiswa
    $sql = "UPDATE daftar_mahasiswa SET nama='$nama', nim='$nim', prodi='$prodi' WHERE id=$id";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate. <a href='jawab1.php'><br><br>Kembali ke Daftar Mahasiswa</a>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
} else {
    echo "Akses tidak sah!";
}
?>
