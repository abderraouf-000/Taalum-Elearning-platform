<?php

require_once 'Database.php'; 

function usernameExist($userName,$userEmail,$conn){
$sql = "SELECT * FROM userinf WHERE user_name = ? OR user_email = ?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
header("location: signup.php?error=stmtfailed");
   exit();
}
mysqli_stmt_bind_param($stmt,"ss",$userName,$userEmail);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($result);
if($row){//user exists
   return $row;
}
else{// user does not exist in the database
    return false;
}
mysqli_stmt_close($stmt);
}


// creating the user and sign up 

function createUser($userName,$userEmail,$userPass,$conn){
$sql = "INSERT INTO userinf (user_name,user_email,user_pass) values(?,?,?);";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt,$sql)){
header("location: signup.php?error=stmtfailed");
   exit();
}

$hashedPass  = password_hash($userPass,PASSWORD_DEFAULT);
mysqli_stmt_bind_param($stmt,"sss",$userName,$userEmail,$hashedPass);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
header("location:index1.html?error=none");

}


function loginUser($userName,$userPass,$conn){
//user name passed twice because we can look in the db using user name or email 
// it returns a row then we will compare the password
$existedUser = usernameExist($userName,$userName,$conn); 
if(!$existedUser){
   header("location:index1.html?error=none");
   exit();
}
$hashedPass = $existedUser["user_pass"];
$checkPwd =password_verify($userPass,$hashedPass); 

if(!$checkPwd){
   header("location:index1.html?error=none");
   exit();
}

// we must start a session 
session_start();
$_SESSION['userName'] = $existedUser["user_name"];
$_SESSION['userEmail'] = $existedUser["user_email"];
header("location:../dashboard/HomePage/dashhome.php?error=none");
exit();

}