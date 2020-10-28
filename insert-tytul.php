<?php
        $conn = new mysqli("remotemysql.com:3306", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $nowy_tytul = $_POST['tytul'];
        $dodaj_tytul = "INSERT INTO `tytuly`(`id_tytul`, `tytul`) VALUES (NULL, '$nowy_tytul')";

        mysqli_query($conn, $dodaj_tytul);

        header('Location: index.php');
?>