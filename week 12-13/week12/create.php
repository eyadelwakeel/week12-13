<?php

include 'partials/header.php';
// include 'users/users.php';
require __DIR__.'/users/users.php';


$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
    'extension' => '',
];



if($_SERVER['REQUEST_METHOD']==='POST'){

    $user = array_merge($user, $_POST);

    $user = createUser($_POST);

    uploadeImage($_FILES['picture'], $user);

        // header("Location: index.php");

    // putJson($user);
    header("Location: index.php");



}

?>
<?php include 'form.php' ?>
