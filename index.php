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
                <a href="#">CRUD</a>
            </li>
            <li class="mlink">
                <a href="card/index.php">KARTY</a>
            </li>
            <li class="mlink">
                <a href="slider/index.html">SLIDER</a>
            </li>
            <li class="mlink">
                <a href="logowanie/index.php">LOGOWANIE</a>
            </li>
            <li class="mlink">
                <a href="card/ksiazki.php">KSIĄŻKI</a>
            </li>
        </ul>
    </header>
    <div class="tablecont">
        <h2>Tutaj można tylko usuwać ksiązki z bazy (proszę tego nie robić). <br> Po więcej wrażeń zapraszam do zakładki "Książki".</h2>
        <table>
        <?php
            session_start();
            // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
            $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

            $result = $conn->query("SELECT * FROM autorzy, books, tytuly WHERE books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul");

            while($row=$result->fetch_assoc()){
                echo("<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['tytul']."</td>");
                
                if(isset($_SESSION['zalogowano'])){
                $html = <<<HTML
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="id" value="$row[id_book]">
                            <input type="submit" value="Usuń">
                        </form>
                    </td>
HTML;
                echo($html);
                }
            echo("</tr>");
            }
        ?>
        </table>
    </div>
    
    <div class="forms">
        <!-- <form method="post" action="insert-autor.php">
            <input type="text" name="imie" placeholder="imie">
            <input type="text" name="nazwisko" placeholder="nazwisko">
            <input type="submit" value="dodaj">
        </form>

        <form method="post" action="insert-tytul.php">
            <input type="text" name="tytul" placeholder="tytul">
            <input type="submit" value="dodaj">
        </form>

        <form method="post" action="insert-ksiazka.php">
            <select name="autor">
                <?php
                    // $result = $conn->query("SELECT * FROM autorzy");

                    // while($row=$result->fetch_assoc()){
                    //     echo("<option value='".$row['id_autor']."'>".$row['imie']."".$row['nazwisko']."</option>");
                    // }
                ?>
            </select>
            <select name="ksiazka">
                <?php
                    // $result = $conn->query("SELECT * FROM tytuly");

                    // while($row=$result->fetch_assoc()){
                    //     echo("<option value='".$row['id_tytul']."'> ".$row['tytul']."</option>");
                    // }
                ?>
            </select>
            <input type="submit" value="dodaj">
        </form> -->
        <?php
            if(isset($_SESSION['zalogowano'])){
                ?>
                    <form action="insert.php" method="post">
                        <input type="text" name="imie" placeholder="imie">
                        <input type="text" name="nazwisko" placeholder="nazwisko">
                        <input type="text" name="tytul" placeholder="tytul">
                        <input type="submit" value="dodaj">
                    </form>
                <?php
            }else{
                echo("Tylko zalogowani użytkownicy mogą edytować bazę danych");
            }
        ?>
    </div>
    
</body>
</html>

