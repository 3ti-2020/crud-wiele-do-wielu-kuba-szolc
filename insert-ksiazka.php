<?php
        $conn = new mysqli("remotemysql.com:3306", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $nowa_ksiazka_autor = $_POST['autor'];
        $nowa_ksiazka_tytul = $_POST['ksiazka'];
        $dodaj_ksiazke = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (NULL, '$nowa_ksiazka_tytul', '$nowa_ksiazka_autor')";

        mysqli_query($conn, $dodaj_ksiazke);

        header('Location: index.php');
?>