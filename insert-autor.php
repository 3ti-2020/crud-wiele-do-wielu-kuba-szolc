<?php
        $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");

        $nowe_imie = $_POST['imie'];
        $nowe_nazwisko = $_POST['nazwisko'];
        $dodaj_autora = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL, '$nowe_imie', '$nowe_nazwisko')";

        mysqli_query($conn, $dodaj_autora);
    
        header('Location: index.php');
?>

