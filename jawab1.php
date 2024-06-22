<?php
// Koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Buka koneksi lagi sebelum menjalankan query SELECT
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Ambil data mahasiswa dari database
$sql = "SELECT * FROM daftar_mahasiswa";
$result = mysqli_query($conn, $sql);

// Periksa hasil query
if ($result) {
    // Ambil data dari hasil query
    $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
    <title>Daftar Mahasiswa</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007BFF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        td a {
            margin-right: 10px;
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
        
    </style>
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

        <?php $no = 1; ?>
        <?php foreach($students as $student): ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $student["nama"] ?></td>
                <td><?= $student["nim"] ?></td>
                <td><?= $student["prodi"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $student['id'] ?>">Edit</a> | 
                    <a href="hapus.php?id=<?= $student['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php $no++; ?>
        <?php endforeach; ?>
    </table>
</body>
</html>
