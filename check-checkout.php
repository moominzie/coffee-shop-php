<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if($_SESSION['checkout']!=''){
$_SESSION['checkout']='';

$username=$_POST['username'];
$sql ="SELECT Status,Username FROM checkout WHERE Username=:username";
$query= $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['status']=$result->Status;
if($result->Status==1)
{
$_SESSION['checkout']=$_POST['username'];
echo "<script type='text/javascript'> document.location ='process.php'; </script>";
} else {
    
$_SESSION['noorder']="Please checkout";
header('location:mycart.php');
}
}
}}
?>