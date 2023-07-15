<?php
session_start();
require_once "../../../login page/Database.php";
require_once "Relfunctions.php";
require_once "fetchFinTasks.php";

$data = file_get_contents("php://input");
$path = json_decode($data, true);

$user_name  =  $_SESSION['userName'];



savePath_rtrnID($conn,$path);





?>






