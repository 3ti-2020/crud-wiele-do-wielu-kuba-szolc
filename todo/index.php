<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
</head>
<body>
    
    <div class="content">
        <form class="form" method="post" id='todo-form'>
            <label>Podaj zadanie</label>
            <div class="input-area">
                <input type="text" name="task-name" id="task-name" class="task-name" placeholder="Co masz do zrobienia...">
                <input type="submit" value="Dodaj" class="btn submit-btn">
            </div>
            <p class="message" id="message"></p>
        </form>
        <!-- <div class="list">
            <template class="task-cont">
                <div class="task-text"></div>
            </template>
        </div> -->
        <ul class="list">
        <?php
            include('conn.php');

            $query = "SELECT * FROM todo ORDER BY id DESC";
            $result = $conn->query($query);

            while($task = $result->fetch_assoc()){

                $style='';
                if($task['status']=='1'){
                    $style = 'text-decoration: line-through';
                }

                echo("<li class='tasks'>");
                    echo("<a 
                    class='task task-".$task['id']."'
                    id='task-".$task['id']."'
                    style='".$style."'>
                    ".$task['name']."
                    </a>
                    <button class='btn del-btn' data-id='".$task['id']."'>Usuń</button>");
                echo("</li>");
            }
        ?>
        </ul>
    </div>

</body>
    <script src="script.js"></script>
</html>