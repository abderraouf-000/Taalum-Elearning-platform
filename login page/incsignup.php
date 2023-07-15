<?php


 
if(!empty($_POST)){
    $userEmail  =  $_POST["email"];
    $userName  =  $_POST["username"];
    $userPass =  $_POST["pass"];
    
require_once 'database.php'; 
require_once 'signupfunctions.php'; 

if(usernameExist($userName,$userEmail,$conn)){
    header("location: signup.php?error=existEmailuser");
    exit();
}
createUser($userName,$userEmail,$userPass,$conn);

}

else{
header("location:signup.html");

}


?>