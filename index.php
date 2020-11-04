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
                <a href="crud/index.php">CRUD</a>
            </li>
            <li class="mlink">
                <a href="card/index.html">KARTY</a>
            </li>
            <li class="mlink">
                <a href="slider/index.php">SLIDER</a>
            </li>
        </ul>
    </header>
    <div class="tablecont">
        <table>
        <?php
            // $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");
            $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

            $result = $conn->query("SELECT * FROM autorzy, books, tytuly WHERE books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul");

            while($row=$result->fetch_assoc()){
                echo("<tr><td>".$row['imie']."</td><td>".$row['nazwisko']."</td><td>".$row['tytul']."</td></tr>");
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
        <form action="insert.php" method="post">
            <input type="text" name="imie" placeholder="imie">
            <input type="text" name="nazwisko" placeholder="nazwisko">
            <input type="text" name="tytul" placeholder="tytul">
            <input type="submit" value="dodaj">
        </form>
    </div>
    
</body>
</html>

