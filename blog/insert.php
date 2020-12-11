<?php
    $conn = new mysqli("remotemysql.com", "1Ed39FMiyQ", "ZMFu5eO2lq", "1Ed39FMiyQ");

    $tytul = $_POST['tytul'];
    $tresc = $_POST['tresc'];
    $tags = $_POST['tags'];

    $posts_sql = "INSERT INTO blog_posty VALUES (NULL, '$tytul', '$tresc')";
    mysqli_query($conn, $posts_sql);
    $post_id = $conn->query("SELECT MAX(id_post) AS id_post FROM blog_posty");
    $post_id = $post_id->fetch_assoc();
    $post_id = intval($post_id['id_post']);

    if(isset($_POST['tags'])){
        $tags = $_POST['tags'];
    }

    if($_POST['new_tag']!=""){
        $new_tag = $_POST['new_tag'];
        $new_tag_sql = "INSERT INTO blog_tagi VALUES (NULL, '$new_tag')";
        mysqli_query($conn, $new_tag_sql);
        $tag_id = $conn->query("SELECT MAX(id_tag) AS id_tag FROM blog_tagi");
        $tag_id = $tag_id->fetch_assoc();
        if(isset($tags)){
            array_push($tags, $tag_id['id_tag']);
        }else{
            $tags = $tag_id['id_tag'];
        }
    }

    $n = count($tags);
    for($i=0; $i<$n; $i++){
        $tag = intval($tags[$i]);
        $sql = "INSERT INTO blog_posty_tagi VALUES (NULL, $post_id, $tag)";
        mysqli_query($conn, $sql);
    }

    header('Location: index.php');
?>