$(document).ready(function(){

    $(document).on('submit', '#todo_form', function(event){
            event.preventDefault();

            if($('#task_name').val()== ''){
                $('#message').html('Wpisz zadanie');
                return false;
            }else{
                $('#submit').attr('disabled', 'disabled');
                $.ajax({
                    url:"add_task.php",
                    method: "POST",
                    data:$(this).serialize(),
                    success:function(data){
                        $('#submit').attr('disabled', false);
                        $('#todo_form')[0].reset();
                        $('.list').prepend(data);
                    }
                })
                console.log($('.list'));
            }
    });
    $(document).on('click', '.tasks', function(){
        var task_list_id = $(this).attr('id');
        $('#tasks'+task_list_id).css('text-decoration', 'line');
        $.ajax({
            url:"update_task.php",
            method:"POST",
            data:{task_list_id:task_list_id},
            success:function(data){
                $('#task-'+task_list_id).css('text-decoration', 'line-through');
            }
        })
    });
    $(document).on('click', '.del-btn', function(){
        var task_list_id = $(this).data('id');
        $.ajax({
            url:"delete_task.php",
            method:"POST",
            data:{task_list_id:task_list_id},
            success:function(data){
                console.log('dziaa');
                $('#'+task_list_id).fadeOut('slow');
            }
        })
    });

});