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
        </ul>
    </header>
    <div class="container">
    
    <?php

        $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");
        $result = $conn->query("SELECT * FROM autorzy, books, tytuly WHERE books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul");
        while($row = $result->fetch_assoc()){
    ?>
        <div class="card">
            <div class="black"></div>

    <?php
            $html = <<<HTML
                <h1>$row[tytul]</h1>
                <h3>$row[imie] $row[nazwisko]</h3>
                <img src=$row[img] alt="" class="image">
                <div class="price"><h2 class="h2price">Nie posiadasz</h2><h3 class="h3price">Wypożyczalnia zadziała wkrótce</h3></div>
HTML;
            echo($html);
    ?>
            <div class="icons">
                <!-- <img src="colors.png" class="colors" alt=""> -->
                <img src="cart.png" class="cart" alt="">
            </div>
            <div class="buyBefore">
                <h4>Wypożycz</h4>
               <input type="button" value="Dodaj do swoich książek" class="addToCart">
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
        </div>
        <?php
        }
    ?>

</body>
<script src="main.js"></script>
</html>