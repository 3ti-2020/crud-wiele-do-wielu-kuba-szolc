<?php
        $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");

        $nowa_ksiazka_autor = $_POST['autor'];
        $nowa_ksiazka_tytul = $_POST['ksiazka'];
        $dodaj_ksiazke = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (NULL, '$nowa_ksiazka_tytul', '$nowa_ksiazka_autor')";

        mysqli_query($conn, $dodaj_ksiazke);

        header('Location: index.php');
?>