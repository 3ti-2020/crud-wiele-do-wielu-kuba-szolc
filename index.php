<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
    <?php
        $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

        $result = $conn->query("SELECT * FROM autorzy, books, tytuly WHERE books.id_autor = autorzy.id_autor AND books.id_tytul = tytuly.id_tytul");

        while($row=$result->fetch_assoc()){
            echo("<tr><td>".$row['nazwisko']."</td><td>".$row['tytul']."</td></tr>");
        }
    ?>
    </table>
    <form method="post" action="insert-autor.php">
    <li>dodaj autora</li>
        <input type="text" name="imie" placeholder="imie">
        <input type="text" name="nazwisko" placeholder="nazwisko">
        <input type="submit" value="dodaj">
    </form>
    <form method="post" action="insert-tytul.php">
    <li>dodaj ksiazke</li>
        <input type="text" name="tytul" placeholder="tytul">
        <input type="submit" value="dodaj">
    </form>

    <form method="post" action="insert-ksiazka.php">
    <li>polacz autora z tytułem i utwórz książkę</li>
        <select name="autor">
            <?php
                $result = $conn->query("SELECT * FROM autorzy");

                while($row=$result->fetch_assoc()){
                    echo("<option value='".$row['id_autor']."'>".$row['imie']."".$row['nazwisko']."</option>");
                }
            ?>
        </select>
        <select name="ksiazka">
            <?php
                $result = $conn->query("SELECT * FROM tytuly");

                while($row=$result->fetch_assoc()){
                    echo("<option value='".$row['id_tytul']."'> ".$row['tytul']."</option>");
                }
            ?>
        </select>
        <input type="submit" value="dodaj">
    </form>
</body>
</html>

