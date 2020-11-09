<?php
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $book = $_POST['wypBook'];
    session_start();
    $user = $_SESSION['user'];

    $sql = "INSERT INTO `wypozyczenia`(`id_book`, `user`) VALUES ('$book', '$user')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
?>