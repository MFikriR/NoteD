<?php
// Koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian head -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>P11</title>
</head>
<body>
    <!-- Bagian body -->
    <h1>Daftar Mahasiswa</h1>
    <a href="tambah.php">Tambah Mahasiswa</a>
    <br>
    <br>
    <table border="1">
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>NIM</td>
            <td>Prodi</td>
            <td>Aksi</td>
        </tr>
        
        <?php
        $no = 1;

        // Query untuk mendapatkan data mahasiswa
        $query = "SELECT * FROM daftar_mahasiswa";
        $result = mysqli_query($conn, $query);

        // Periksa hasil query
        if ($result) {
            // Ambil data dari hasil query
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['prodi']}</td>
                        <td>
                            <a href='#' onclick='editAction(\"{$row['nim']}\")'>Edit</a> | 
                            <a href='#' onclick='hapusAction(\"{$row['nim']}\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }

            // Bebaskan hasil query
            mysqli_free_result($result);
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }

        // Tutup koneksi ke database
        mysqli_close($conn);
        ?>
    </table>

    <script>
        function editAction(nim) {
            // Logika atau fungsi untuk aksi Edit dengan parameter nim
            console.log('Aksi Edit untuk NIM: ' + nim);
        }

        function hapusAction(nim) {
            // Logika atau fungsi untuk aksi Hapus dengan parameter nim
            console.log('Aksi Hapus untuk NIM: ' + nim);
        }
    </script>
</body>
</html>
