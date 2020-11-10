<?php
        // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
        $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $del_id = $_POST['id'];
        $date = date("Y-m-d",time());
        $oddaj = "UPDATE wypozyczenia SET zwrot = '$date' WHERE id_wyp = '$del_id' ";

        mysqli_query($conn, $oddaj);
    
        header('Location: ksiazki.php');
?>