<?php 
require_once("includes/connection.php");
// code user email availablity
if(!empty($_POST["emailid"])) {
	$email= $_POST["emailid"];
	if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

		echo "<span style='color:red'> Please enter a valid email .</span>";
	}
	else {
		$sql ="SELECT EmailId FROM member WHERE EmailId=:email";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
echo "<span style='color:red'> Email already exists</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> Email available for Registration</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}


//Code check user name
if(!empty($_POST["username"])) {
	$username=$_POST["username"];
	$sql ="SELECT Username FROM member WHERE Username=:username";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':username', $username, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if($query -> rowCount() > 0){
	 echo "<span style='color:red'> Username is already in use </span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
	echo "<span style='color:green'> Username can be use </span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
	// End code check username


?>
