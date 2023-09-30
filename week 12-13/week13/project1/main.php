<?php

$tods=[];
if(file_exists('todo.json')){
    $json=file_get_contents('todo.json');
    $tods=json_decode($json,true);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter Your todo ">
        <button>New todo</button>
    </form>    
<br>
<?php foreach ($tods as $i => $todo) : ?>
    <div style="margin-bottom: 20px;">
    <form style="display:inline-block" action="change_status.php" method="post">
    <input type="checkbox" <?php echo['completed'] ? 'checked' : '' ?> >
    </form>
    <?php echo $i ?>
    <form style="display: inline-block" action="delete.php" method="post">
        <input type="hidden" name="todo_name" value="<?php echo $i ?>">
    <button>Delete</button>
    </form>
    </div>
<?php  endforeach;  ?>
 


<script>
    const checkboxes =document.querySelectorAll('input[type=checkbox]');
checkboxes.forEach(ch=>{
    ch.onclick=function(){
        this.parentNode.submit();
);
    }
})
</script>

</body>
</html>