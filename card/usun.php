<?php
    // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $del_id = $_POST['id'];
    $usun = "DELETE FROM wypozyczenia WHERE id_wyp = '$del_id' ";

        $result = $conn->query("SELECT books.id_book FROM books, wypozyczenia WHERE wypozyczenia.id_wyp = '$del_id' AND wypozyczenia.id_book = books.id_book");
        while($row=$result->fetch_assoc()){
                $book = $row['id_book'];
        }

    $ilosc = "UPDATE books SET ilosc = ilosc+1 WHERE id_book = $book";

    mysqli_query($conn, $usun);
    mysqli_query($conn, $ilosc);

    header('Location: ksiazki.php');
?>