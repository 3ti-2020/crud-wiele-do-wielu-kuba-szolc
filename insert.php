<?php
        $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
        // $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $nowe_imie = $_POST['imie'];
        $nowe_nazwisko = $_POST['nazwisko'];
        $autorzy = $conn->query("SELECT * FROM autorzy");
        $nie_dodawaj_autora = 0;
        while($row=$autorzy->fetch_assoc()){
            if($row['imie']==$nowe_imie && $row['nazwisko']==$nowe_nazwisko){
                $nie_dodawaj_autora = 1;
            }
        }
        if($nie_dodawaj_autora == 0){
            $dodaj_autora = "INSERT INTO `autorzy`(`id_autor`, `imie`, `nazwisko`) VALUES (NULL, '$nowe_imie', '$nowe_nazwisko')";
            mysqli_query($conn, $dodaj_autora);
        }


        
        $nowy_tytul = $_POST['tytul'];
        $tytuly = $conn->query("SELECT * FROM tytuly");
        $nie_dodawaj_tytulu = 0;
        while($row=$tytuly->fetch_assoc()){
            if($row['tytul']==$nowy_tytul){
                $nie_dodawaj_tytulu = 1;
            }
        }
        if($nie_dodawaj_tytulu == 0){
            $dodaj_tytul = "INSERT INTO `tytuly`(`id_tytul`, `tytul`) VALUES (NULL, '$nowy_tytul')";
            mysqli_query($conn, $dodaj_tytul);
        }

        $result = $conn->query("SELECT id_autor FROM autorzy WHERE imie='$nowe_imie' and nazwisko='$nowe_nazwisko'");
        $row = $result->fetch_assoc();
        $nowa_ksiazka_autor = $row['id_autor'];
        $result = $conn->query("SELECT id_tytul FROM tytuly WHERE tytul='$nowy_tytul'");
        $row = $result->fetch_assoc();
        $nowa_ksiazka_tytul = $row['id_tytul'];

        $ksiazki = $conn->query("SELECT * FROM books");
        $nie_dodawaj_ksiazki = 0;
        while($row=$ksiazki->fetch_assoc()){
            if($row['id_autor']==$nowa_ksiazka_autor && $row['id_tytul']==$nowa_ksiazka_tytul){
                $nie_dodawaj_ksiazki = 1;
            }
        }
        echo($nowa_ksiazka_autor.", ".$nowa_ksiazka_tytul.", ".$nie_dodawaj_ksiazki);
        if($nie_dodawaj_ksiazki == 0){
            $dodaj_ksiazke = "INSERT INTO `books`(`id_book`, `id_tytul`, `id_autor`) VALUES (NULL, '$nowa_ksiazka_tytul', '$nowa_ksiazka_autor')";
            mysqli_query($conn, $dodaj_ksiazke);
        }


        header('Location: index.php');
?>