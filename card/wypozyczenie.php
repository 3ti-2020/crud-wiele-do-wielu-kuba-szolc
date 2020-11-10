<?php
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $book = $_POST['wypBook'];
    session_start();
    $user = $_SESSION['user'];
    $date = date("Y-m-d",time());

    $sql = "INSERT INTO `wypozyczenia`(`id_book`, `user`, `wypozyczenie`, `zwrot`) VALUES ('$book', '$user', '$date', NULL)";

    mysqli_query($conn, $sql);

    header('Location: index.php');
?>