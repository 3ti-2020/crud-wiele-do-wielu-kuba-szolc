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
        <div class="info">
            <?php
            session_start();
                if(!isset($_SESSION['zalogowano'])){
                    echo("<h2>Tutaj możesz zarządzać swoimi wypożyczonymi książkami</h2>");
                    echo("<p>Zaloguj się i wypożycz książkę</p>");
                }
            ?>
        </div>
        <?php
            if(isset($_SESSION['zalogowano']) && $_SESSION['user']=='b'){
                ?>
                    <div class="tabdiv">
                    <table>
                <?php
                    // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
                    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

                    $result = $conn->query("SELECT * FROM wypozyczenia JOIN books ON wypozyczenia.id_book = books.id_book JOIN autorzy ON books.id_autor = autorzy.id_autor JOIN tytuly ON books.id_tytul = tytuly.id_tytul");

                    while($row=$result->fetch_assoc()){
                        echo("<tr>
                            <td>".$row['user']."</td>
                            <td>".$row['nazwisko']."</td>
                            <td>".$row['tytul']."</td>
                            <td>".$row['wypozyczenie']."</td>");
                        if($row['zwrot'] != NULL){
                            echo("<td>".$row['zwrot']."</td>");
                        }else{
                            echo("<td>nie oddana</td>");
                        } 
                        $html = <<<HTML
                            <td>
                                <form action="oddaj.php" method="post">
                                    <input type="hidden" name="id" value="$row[id_wyp]">
                                    <input type="submit" value="Oddaj">
                                </form>
                            </td>
                            <td>
                                <form action="usun.php" method="post">
                                    <input type="hidden" name="id" value="$row[id_wyp]">
                                    <input type="submit" value="Usuń">
                                </form>
                            </td>
HTML;
                    echo($html);
                    }
                    echo("</tr>");
                ?>

                    </table>
                    </div>
                </div>
                <div class="forms">
                    <form action="wypozyczenie_bibliotekarz.php" method="post">
                        <select name="wyp_book" class="bibliotekarz_input">
                            <?php
                                $result_tytuly = $conn->query("SELECT * FROM books JOIN tytuly ON books.id_tytul = tytuly.id_tytul JOIN autorzy ON books.id_autor = autorzy.id_autor");
                                while($row=$result_tytuly->fetch_assoc()){
                                    echo("<option value=".$row['id_book'].">".$row['nazwisko']." ".$row['tytul']."</option>");
                                }
                            ?>
                        </select>
                        <select name="wyp_user" class="bibliotekarz_input">
                            <?php
                                $result_users = $conn->query("SELECT * FROM users");
                                while($row=$result_users->fetch_assoc()){
                                    echo("<option value=".$row['login'].">".$row['login']."</option>");
                                }
                            ?>
                        </select>
                        <input type="date" name="wyp_data_wyp" class="bibliotekarz_input">
                        <input type="submit" value="zatwierdź" class="bibliotekarz_input">
                    </form>
                </div>
                <?php
            }else{
            ?>
        </table>
        <table>
        <?php
            if(isset($_SESSION['zalogowano'])){
                // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
                $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

                $user = $_SESSION['user'];
                $sql = "SELECT * FROM wypozyczenia, books, tytuly, autorzy WHERE user = '$user' AND books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul AND books.id_book = wypozyczenia.id_book";
                $result = $conn->query($sql);

                while($row=$result->fetch_assoc()){
                    if($row['zwrot'] == NULL){

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
                }
                echo("</tr>");
            }
        }
        ?>

    
</body>
</html>