<?php 

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';



$todoname=$_POST['todo_name'] ?? " ";
$todoname=trim($todoname);

if($todoname){
    if(file_exists('todo.json')){
    $json_get=file_get_contents('todo.json');
    $json_array=json_decode($json_get,true);
    }else{
        $json_array=[];
    }
    $json_array[$todoname]=['completed'=>true];
    file_put_contents('todo.json',json_encode($json_array,JSON_PRETTY_PRINT));

    
}

header('location:main.php');