<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuba Szolc Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <a href="https://github.com/3ti-2020" class="githublink"> <img class="githubimg" src="https://image.flaticon.com/icons/png/512/25/25231.png" alt="GITHUB"> </a>
        <h1>Kuba Szolc gr.1 nr 13</h1>
        <ul class="menu">
            <li class="mlink">
                <a href="../index.php">CRUD</a>
            </li>
            <li class="mlink">
                <a href="../card/index.php">KARTY</a>
            </li>
            <li class="mlink">
                <a href="../slider/index.html">SLIDER</a>
            </li>
            <li class="mlink">
                <a href="#">LOGOWANIE</a>
            </li>
        </ul>
    </header>
    <div class="main">
        <div class="container">
            <?php
            session_start();
            if(!isset($_SESSION['zalogowano'])){
                ?>
                    <form action="uwierzytelnianie.php" method="post" class="zaloguj">
                        <input type="text" name="user" placeholder="nazwa uzytkownika">
                        <input type="password" name="haslo" placeholder="haslo">
                        <input class="zaloguj" type="submit" value="zaloguj">
                    </form>
                    <form action="rejestracja.php" method="post" class="zarejestrujForm">
                        <input type="text" name="user" placeholder="nowa nazwa uzytkownika">
                        <input type="password" name="haslo" placeholder="nowe haslo">
                        <input class="zarejestruj" type="submit" value="utwórz nowe konto">
                    </form>
                    <button class="newAccount">nie masz konta?</button>
                    <button class="oldAccount">wróć do logowania</button>
                <?php
            }else{
                echo("Witaj ".$_SESSION['user']."!")
                ?>  
                    <form action="uwierzytelnianie.php" method="get">
                        <input type="hidden" name="akcja" value="wyloguj">
                        <input type="submit" value="wyloguj">
                    </form>
                <?php
            }
            if(isset($_SESSION['fail'])){
            ?>
                <p>niepoprawne dane</p>
            <?php
            }
            ?>
        </div>
    </div>
</body>
<script src="main.js"></script>
</html>