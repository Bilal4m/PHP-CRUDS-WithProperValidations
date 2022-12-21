<?php 
include 'connection.php';

$id = $_GET['id'];
$deletequery = "delete from crud where id = $id " ;

$query = mysqli_query ($con , $deletequery);

header('location:select.php');

?>