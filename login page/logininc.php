<?php
if(1){
$userName = $_POST['user_name'];
$userPass = $_POST['user_pass'];
require_once "Database.php";
require_once "signupfunctions.php";


loginUser($userName,$userPass,$conn);
}

else{
    header("location:index1.html?error=loginerror");
    exit();
}


