<?php
session_start();
require_once "../../login page/Database.php";
$data = file_get_contents("php://input");
$category = json_decode($data, true);



function insertCat($conn,$category){
$category_name = $category['category_name'];
$category_color = $category['category_color'];
$creation_date= $category['creation_date'];

$user_name = $_SESSION['userName'];

$query = " insert into category (category_name,category_color,creation_date,user_name) values('$category_name','$category_color',$creation_date,'$user_name')";


if(mysqli_query($conn,$query))
echo mysqli_insert_id($conn);
else{
echo "problem";
}
    
}

insertCat($conn,$category);




?>
