<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <title>Blog</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="">
            <h1>LOG</h1>
        </div>
        <div class="buttons">
            <button class="dodaj btn">Dodaj post</button>
            <form action="index.php" method="get">
                <input type="text" name="tag_search" placeholder="szukaj tagu" class="search-input">
                <button type="submit" value="Szukaj" class="btn">
                    <?php
                        if(!isset($_GET['tag_search'])){
                            echo("<i class='fa fa-search'>");
                        }else{
                            echo("<i class='fa fa-times'></i>");
                        }
                    ?>
                </i></button>
            </form>
        </div>
    </header>
    <main class="main">
        <div class="inputy-cont">
            <h2 class="inputy">Dodaj post</h2>
            <form action="insert.php" method="post">
                <input type="text" name="tytul" placeholder="tytuł" class="intxt">
                <textarea name="tresc" id="" cols="30" rows="10" placeholder="post" class="intxt"></textarea>
                <b>tagi:</b>
                <div class="tags-check">
                <?php
                    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");
                    $tags_check = $conn->query("SELECT * FROM blog_tagi");
                    while($row_tags_check = $tags_check->fetch_assoc()){
                        echo("<div><input type='checkbox' name='tags[]' value=".$row_tags_check['id_tag'].">#".$row_tags_check['nazwa']."</div>" );
                    }
                ?>
                </div>
                <input type="text" name="new_tag" placeholder="nowy tag" class="intxt">
                <input type="submit" value="Dodaj" class="btn">
            </form>
        </div>
        <div class="backimg"></div>
        <div class="content">
        <?php
            if( isset($_GET['tag_search']) ){
                if($_GET['tag_search'] == ""){
                    header('Location: index.php');
                }else{
                    $tag_search = $_GET['tag_search'];
                    $tag_id = $conn->query("SELECT * FROM blog_tagi WHERE nazwa = '$tag_search'");
                    $tag_id = $tag_id->fetch_assoc();
                    $tag_id = $tag_id['id_tag'];
                }
            }
            if(isset($tag_id)){
                $articles = $conn->query("SELECT * FROM blog_posty JOIN blog_posty_tagi USING(id_post) WHERE id_tag = '$tag_id'");
            }else{
                $articles = $conn->query("SELECT * FROM blog_posty");
            }
            while($row_article = $articles->fetch_assoc()){
                echo("<article class='artykul'>");
                    echo("<h2 class='tytul'>".$row_article['tytul']."</h2>");
                    ?>
                    <h3 class="tagi">
                    <?php
                    $tags = $conn->query("SELECT * FROM blog_tagi JOIN blog_posty_tagi USING(id_tag) WHERE blog_posty_tagi.id_post = ".$row_article['id_post']);
                    while($row_tag = $tags->fetch_assoc()){
                        echo("#".$row_tag['nazwa']." ");
                    }
                    ?>
                    </h3>
                    <p class='tresc'>
                    <?php
                    echo($row_article['tresc']);
                    ?>
                    </p>
            </article>
            <?php
            }
        ?>
        </div>
    </main>
</body>
<script src="script.js"></script>
</html>