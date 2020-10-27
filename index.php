<?php
    
    $conn = new mysqli("localhost", "root", "zaq1@WSX", "library");

    $result = $conn->query("SELECT * FROM pozycje");

    while($row=$result->fetch_assoc()){
        echo("<li>".$row['nazwisko']." ".$row['tytul']);
    }

?>