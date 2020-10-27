<?php
        $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");

        $nowy_tytul = $_POST['tytul'];
        $dodaj_tytul = "INSERT INTO `tytuly`(`id_tytul`, `tytul`) VALUES (NULL, '$nowy_tytul')";

        mysqli_query($conn, $dodaj_tytul);

        header('Location: index.php');
?>