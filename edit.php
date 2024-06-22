<?php
// Misalnya, ambil id dari parameter GET
$id = $_GET['id'];

// Koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query SQL untuk mengambil data mahasiswa berdasarkan id
$sql = "SELECT * FROM daftar_mahasiswa WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Periksa hasil query
if ($result) {
    // Ambil data dari hasil query
    $data = mysqli_fetch_assoc($result);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian head -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            width: 50%;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            margin-right: 10px;
        }

        /* Tambahkan gaya untuk input yang tidak dapat diubah */
        input[readonly] {
            background-color: #eee;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <!-- Bagian body -->
    <h1>Edit Mahasiswa</h1>

    <form action="proses_edit.php" method="get">
        <!-- Formulir untuk mengedit mahasiswa -->
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama'] ?>" required>
        <br>
        <br>
        
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" value="<?= $data['nim'] ?>" readonly>
        <br>
        <br>
        
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?= $data['prodi'] ?>" required>
        <br>
        <br>

        <!-- Gunakan input tersembunyi untuk menyimpan id -->
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <input type="submit" value="Simpan">
    </form>

    <br>
    <a href="jawab1.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>