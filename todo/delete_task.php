<?php
    include('conn.php');

    if($_POST['task_list_id']){
        $task_id = $_POST['task_list_id'];
        $del_query = "DELETE FROM `todo` WHERE `id`='$task_id'";
        mysqli_query($conn, $del_query);
    }
?>