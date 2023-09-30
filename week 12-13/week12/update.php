<?php

include 'partials/header.php';
require __DIR__.'/users/users.php';

if(!isset($_GET['id'])){
    include "partials/not_found.php";
    exit;
}

$userId =$_GET['id'];

$user =getUserById($userId);
if(!$user){
    include "partials/not_found.php";
    exit;
};


if($_SERVER['REQUEST_METHOD']==='POST'){
    
    $user = array_merge($user, $_POST);
    // updateUser($user,$userId);

    // $user=array_merge($user,$_POST);
    if(true){
    $user = updateUser($_POST, $userId);
    uploadeImage($_FILES['picture'],$user);
    header("Location: index.php");

        }
}


        











include 'form.php';

?>















