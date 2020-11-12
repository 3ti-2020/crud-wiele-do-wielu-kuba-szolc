<?php
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $book = $_POST['wyp_book'];
    $user = $_POST['wyp_user'];
    $data_wyp = $_POST['wyp_data_wyp'];
    $data_zwr = $_POST['wyp_data_zwr'];
    echo($book.$user.$data_wyp.$data_zwr);

    $sql = "INSERT INTO `wypozyczenia`(`id_wyp`, `id_book`, `user`, `wypozyczenie`, `zwrot`) VALUES (NULL, '$book', '$user', '$data_wyp', NULL)";

    mysqli_query($conn, $sql);

    header('Location: ksiazki.php');
?>