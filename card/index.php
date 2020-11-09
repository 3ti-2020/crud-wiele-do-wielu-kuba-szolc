<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Kuba Szolc Card</title>
</head>
<body>
    <header class="header">
        <a href="https://github.com/3ti-2020" class="githublink"> <img class="githubimg" src="https://image.flaticon.com/icons/png/512/25/25231.png" alt="GITHUB"> </a>
        <h1 class="imie">Kuba Szolc gr.1 nr 13</h1>
        <ul class="menu">
            <li class="mlink">
                <a href="../index.php">CRUD</a>
            </li>
            <li class="mlink">
                <a href="#">KARTY</a>
            </li>
            <li class="mlink">
                <a href="../slider/index.html">SLIDER</a>
            </li>
            <li class="mlink">
                <a href="../logowanie/index.php">LOGOWANIE</a>
            </li>
            <li class="mlink">
                <a href="ksiazki.php">KSIĄŻKI</a>
            </li>
        </ul>
    </header>

    <?php
        session_start();
        if(!isset($_SESSION['zalogowano'])){
            echo("<h1>zaloguj się aby wypożyczać książki</h1>");
        }
    ?>
    <div class="container">

    <div class="card">
            <div class="black"></div>
                <h1>Fajna karta</h1>
                <h3>Pozostałe mniej fajne</h3>
                <img src="chair-red.jpg"  class="image">
            <div class="icons">
                <img src="colors.png" class="colors" alt="">
                <img src="cart.png" class="cart" alt="">
            </div>
            <div class="buyBefore">
               <input type="button" value="Kup krzesło" class="addToCart">
            </div>
            <div class="selectColorBefore">
                <h4>Wybierz kolor</h4>
                <input type="button" value="" class="color colorRed">
                    <i class="fa1 fa-check"></i>
                <input type="button" value="" class="color colorYel">
                    <i class="fa2 fa-check"></i>
                <input type="button" value="" class="color colorGre">
                    <i class="fa3 fa-check"></i>
            </div>

            <div class="price"><h2 class="h2price">$149.99</h2> <h3 class="h3price">199.99</h3></div>
        </div>


    
    <?php

        $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");
        $result = $conn->query("SELECT * FROM autorzy, books, tytuly WHERE books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul");
        while($row = $result->fetch_assoc()){
    ?>
        <div class="card">

    <?php
            $html = <<<HTML
                <h1>$row[tytul]</h1>
                <h3>$row[imie] $row[nazwisko]</h3>
                <img src=$row[img] alt="" class="wypImage">
HTML;
            echo($html);
    ?>
    <?php
            if(isset($_SESSION['zalogowano'])){
            $html = <<<HTML
                <form action="wypozyczenie.php" method="post">
                    <input type="hidden" name="wypBook" value=$row[id_book]>
                    <input type="submit" value="Wypożycz" class="wypozycz">
                </form>

HTML;
            echo($html);
            }
    ?>
        </div>
    <?php
        }
    ?>

</body>
<script src="main.js"></script>
</html>