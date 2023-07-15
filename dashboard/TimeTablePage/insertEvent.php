<?php
session_start();
require_once "../../login page/Database.php";
$data = file_get_contents("php://input");
$event = json_decode($data, true);



function insertEvent($conn,$event){

$Event_name = $event['Event_name'];
$Event_time = $event['Event_time'];
$Event_day= $event['Event_day'];
$Event_week = $event['Event_week'];
$category_id = $event['category_id'];
$creation_date= $event['creation_date'];

$user_name = $_SESSION['userName'];

$query = " replace into User_event (Event_name,Event_day,Event_time,Event_week,category_id,creation_date,user_name) values('$Event_name','$Event_day','$Event_time','$Event_week',$category_id,$creation_date,'$user_name')";


if(mysqli_query($conn,$query))
echo "Successful!";
else{
echo "problem";
}
    
}

insertEvent($conn,$event);




?>