<?php
    if (isset($_POST["submit"])) {
        echo "Anda memasukan data yaitu " . $_POST["nama"] . "<br><br>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Praktikum 12</title>
</head>
<body>
    <form action="" method="POST">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama">
        <br><br>
        <button type="submit" name="submit">Kirim</button>
        <br><br>
    </form>
</body>
</html>