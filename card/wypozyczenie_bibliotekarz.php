<?php
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $book = $_POST['wyp_book'];

    $result=$conn->query("SELECT ilosc FROM books WHERE id_book = $book")->fetch_assoc();
    if($result['ilosc'] > 0){
      
        $user = $_POST['wyp_user'];
        $data_wyp = $_POST['wyp_data_wyp'];
        $data_zwr = date('Y-m-d', strtotime($data_wyp.'+7 day'));
        // echo $data_zwr;
        // echo($book.$user.$data_wyp.$data_zwr);

        $sql = "INSERT INTO `wypozyczenia`(`id_wyp`, `id_book`, `user`, `wypozyczenie`, `zwrot`) VALUES (NULL, '$book', '$user', '$data_wyp', '$data_zwr')";
        $ilosc = "UPDATE books SET ilosc = ilosc-1 WHERE id_book = $book";

        mysqli_query($conn, $sql);
        mysqli_query($conn, $ilosc);
    }

    header('Location: ksiazki.php');
?>