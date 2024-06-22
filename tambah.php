<?php
// Koneksi ke database
$conn = mysqli_connect("localhost:3308", "root", "", "db_prak12");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Inisialisasi variabel
$nama = $nim = $prodi = "";

// Tangkap data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $prodi = $_POST["prodi"];

    // Query SQL untuk menyimpan data ke dalam tabel mahasiswa
    $sql = "INSERT INTO daftar_mahasiswa (nama, nim, prodi) VALUES ('$nama', '$nim', '$prodi')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
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
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Tambah Mahasiswa</h1>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <br>
        
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required>
        <br>
        <br>
        
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" required>
        <br>
        <br>

        <input type="submit" value="Tambahkan">
    </form>

    <br>
    <a href="jawab1.php">Kembali ke Daftar Mahasiswa</a>
</body>
</html>