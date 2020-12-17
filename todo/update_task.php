<?php
    include('conn.php');

    if($_POST['task_list_id']){
        $task_id = $_POST['task_list_id'];
        $del_query = "UPDATE `todo` SET `status`=1 WHERE `id`='$task_id'";
        mysqli_query($conn, $del_query);
    }
?>