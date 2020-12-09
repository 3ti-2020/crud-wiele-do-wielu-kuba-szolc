<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>
    <header class="header">
        <div class="logo"></div>
        <ul class="menu"></ul>
    </header>
    <main class="main">
        <?php
            $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");
            $articles = $conn->query("SELECT * FROM blog_posty");
            while($row_article = $articles->fetch_assoc()){
                echo("<article class='artykul'>");
                echo("<h2 class='tytul'>".$row_article['tytul']."</h2><h3 class='tagi>");
                echo("<h3 class='tagi'>");
                $tags = $conn->query("SELECT * FROM blog_tagi JOIN blog_posty_tagi USING(id_tag) WHERE blog_posty_tagi.id_post = ".$row_article['id_post']);
                while($row_tag = $tags->fetch_assoc()){
                    echo("#".$row_tag['nazwa']." ");
                }
                echo("</h3>");
                echo("<p class='tresc'>");
                echo($row_article['tresc']);
                echo("</p>");
            echo("</article>");
            }
        ?>
    </main>
</body>
</html>