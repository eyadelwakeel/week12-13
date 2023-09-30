<?php

define('REQUIRE_FIELD_ERROR','This filed is require');

$errors=[];

$username='';
$email='';
$password='';
$Repeat_password='';
$CV='';



if($_SERVER['REQUEST_METHOD']=== 'POST'){

    $username=post_data('username');
    $email=post_data('email');
    $password=post_data('password');
    $Repeat_password=post_data('Repeat_password');
    $CV=post_data('CV');


    if(!$username){
        $errors['username']=REQUIRE_FIELD_ERROR;  
    }elseif(6 > strlen($username) || strlen($username) > 16 ){
        $errors['username']='Username must between 6 and 16 characters ';
    }

    if(!$email){
        $errors['email']=REQUIRE_FIELD_ERROR;
        
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email']='This field be valid email address';
    }

    if(!$password){
        $errors['password']=REQUIRE_FIELD_ERROR;
        
    }

    if(!$Repeat_password){
        $errors['Repeat_password']=REQUIRE_FIELD_ERROR;
        
    }elseif($Repeat_password !== $password){
        $errors['Repeat_password']='please sure the password equal the repeat password';
    }

    if(!$CV ){
        $errors['CV']= REQUIRE_FIELD_ERROR ; 
    }elseif(!filter_var($CV,FILTER_VALIDATE_URL)){
        $errors['CV']='This URL is invalid ';
    }


    echo '<pre>';
    // var_dump($username,$email,$password,$Repeat_password,$CV);
    // echo $username;
    // print_r($_POST);
    // print_r($errors);
    var_dump($username,$email,$password,$Repeat_password,$CV);
    // echo $email;
    echo '</pre>';
}

function post_data($field)
{
    $_POST[$field] ??='';

    return htmlspecialchars(stripslashes($_POST[$field]));

    // if(!isset($_POST)){
    //     return false;
    // }
    // $data =$_POST[$field]
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    

    <form action="" method="post" novalidate >

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">username</label>
                        <input  class="form-control <?php echo isset($errors['username']) ? 'is-invalid' : '' ?>" name="username" placeholder="eyadelwakeel"
                            value="<?php echo $username ?>" >
                        <small class="form-text text-muted">Min: 6 and max 16 charcters</small>
                        <div class="invalid-feedback" > 
                            <?php echo $errors['username'] ?? '' ?> </div>
                        <br>
                        <label for="">email</label>
                        <input type="text" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" placeholder="eelwakeel3@gmail.com" 
                            value="<?php echo $email ?>" >
                        <div class="invalid-feedback" > 
                            <?php echo $errors['email'] ?? '' ?> </div>
                        <br>   
                
                        </div>
                    </div>    
                <div class="col">  
                    <div class="form-group">  
                        <label for="">password</label>
                        <input type="text" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" placeholder="123" 
                            value="<?php echo $password ?>" >
                        <div class="invalid-feedback" > 
                            <?php echo $errors['password'] ?? '' ?> </div>
                        <br>
                        <label for="">Repeat password</label>
                        <input type="text" class="form-control <?php echo isset($errors['Repeat_password']) ? 'is-invalid' : '' ?>" name="Repeat_password" placeholder="123" 
                            value="<?php echo $Repeat_password ?>" >
                        <div class="invalid-feedback" > 
                            <?php echo $errors['Repeat_password'] ?? '' ?> </div>
                        <br>
                    <div class="form-group">
                        <label for="">Your CV link</label>
                        <input  type="link" class="form-control <?php echo isset($errors['CV']) ? 'is-invalid' : '' ?>" name="CV" placeholder="https:mycv.com" 
                            value="<?php echo $CV ?>" >
                        <div class="invalid-feedback"  > 
                            <?php echo $errors['CV'] ?? '' ?> </div>
                        <br>
                    </div>
                        <div>
                            <button>Register</button>
                        </div>

            </div>
        </div>


    </form>


</body>
</html>