<?php
    $user = $_POST['user'];
    $haslo = $_POST['haslo'];

    // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $sql = "INSERT INTO users VALUES ('$user', '$haslo')";

    mysqli_query($conn, $sql);

    session_start();
    if(isset($_SESSION['fail'])){
        unset($_SESSION['fail']);
    }

    header('Location: index.php');
?>