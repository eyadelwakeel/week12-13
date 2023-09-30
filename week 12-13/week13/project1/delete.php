<?php

$json_get=file_get_contents('todo.json');
$json_array=json_decode($json_get,true);



$todo_Name=$_POST['todo_name'];
unset($json_array[$todo_Name]);


file_put_contents('todo.json',json_encode($json_array,JSON_PRETTY_PRINT));

header('location: main.php');