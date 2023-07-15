<?php

$server_name = "localhost";
$db_user_name = "MyAdmin";
$db_pass = "Raouf2003";
$db_name = "taalum";

$conn = mysqli_connect($server_name,$db_user_name,$db_pass,$db_name);

if(!$conn){
die("Connection Failed !".mysqli_connect_error());    
}

