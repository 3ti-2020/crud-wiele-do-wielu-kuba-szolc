<?php
        $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $nowe_imie = $_POST['imie'];
        $nowe_nazwisko = $_POST['nazwisko'];
        $dodaj_autora = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL, '$nowe_imie', '$nowe_nazwisko')";

        mysqli_query($conn, $dodaj_autora);
    
        header('Location: index.php');
?>

