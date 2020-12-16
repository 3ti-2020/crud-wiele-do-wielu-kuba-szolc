<?php

    include('conn.php');

    if($_POST['task_name']){
        $task_name = $_POST['task_name'];
        $ins_query = "INSERT INTO todo (name) VALUES ('$task_name')";
        mysqli_query($conn, $ins_query);
    }

    $sel_query = "SELECT * FROM todo ORDER BY id DESC LIMIT 1";

    $result = $conn->query($sel_query);

    while($task=$result->fetch_assoc()){

        // if($task['status']=='1'){
        //     $style = 'text-decoration: line-through';
        // }

        echo("<li class='tasks'>");
        echo("<a 
            class='task task-".$task['id']."'
            id='task-".$task['id']."'>
            ".$task['name']."
            </a>
            <button class='btn del-btn' data-id='".$task['id']."'>Usuń</button>");
        echo("</li>");
    }

?>