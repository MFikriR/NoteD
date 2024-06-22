<?php
    $conn = mysqli_connect("localhost:3308", "root", "", "db_prak11");
    $sql = "INSERT INTO mahasiswa (nama, nim) VALUES ('Nana', 19101312)";
    
    if (mysqli_query($conn, $sql)) { 
        echo "Berhasil menambah data";
    } else { 
        echo "Gagal menambah data";
    }
?>