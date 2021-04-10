<?php 
require_once("includes/connection.php");
// code user username availablity
if(isset($_POST['username'])){
	$username = $_POST['username'];
 
	// Check username
	$stmt = $dbh->prepare("SELECT count(*) as Username FROM member WHERE username=:username");
	$stmt->bindValue(':username', $username, PDO::PARAM_STR);
	$stmt->execute(); 
	$count = $stmt->fetchColumn();
 
	$response = "<span style='color: green;'>Username can be used</span>";
	if($count > 0){
	   $response = "<span style='color: red;'>Username is already in use</span>";
	}
 
	echo $response;
	exit;
 }

?>
✨✨฿฿