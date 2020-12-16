$(document).ready(function(){

    $(document).on('submit', '#todo_form', function(
        event){
            event.preventDefault();

            console.log($('#task_name').val());
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
        })
})