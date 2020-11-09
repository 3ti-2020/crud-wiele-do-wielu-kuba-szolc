<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuba Szolc</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <a href="index.php">KARTY</a>
            </li>
            <li class="mlink">
                <a href="../slider/index.html">SLIDER</a>
            </li>
            <li class="mlink">
                <a href="../logowanie/index.php">LOGOWANIE</a>
            </li>
            <li class="mlink">
                <a href="#">KSIĄŻKI</a>
            </li>
        </ul>
    </header>
    <div class="tablecont">
        <table>
        <?php
            session_start();
            if(!isset($_SESSION['zalogowano'])){
                echo("<h2>Tutaj możesz zarządzać swoimi wypożyczonymi książkami</h2><br>");
                echo("<p>Zaloguj się i wypożycz książkę</p>");
            }
            // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
            $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

            $user = $_SESSION['user'];
            $sql = "SELECT * FROM wypozyczenia, books, tytuly, autorzy WHERE user = '$user' AND books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul AND books.id_book = wypozyczenia.id_book";
            $result = $conn->query($sql);

            while($row=$result->fetch_assoc()){
                echo("<tr><td>".$row['tytul']."</td><td>".$row['imie']." ".$row['nazwisko']."</td>");
                
                $html = <<<HTML
                    <td>
                        <form action="oddaj.php" method="post">
                            <input type="hidden" name="id" value="$row[id_wyp]">
                            <input type="submit" value="Oddaj">
                        </form>
                    </td>
HTML;
                echo($html);
            }
            echo("</tr>");
            ?>
        </table>
    </div>
    
</body>
</html>