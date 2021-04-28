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
if($query -> rowCount() > 0){
 echo "<span style='color:red'> Email already exists</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}else{
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
	}else if(strlen($_POST['username']) <5){
		echo "<span style='color:red'> Username need to be 5 characters or longer </span>";
		echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
			echo "<span style='color:green'> Username can be use </span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
	// End code check username


//Code check password name
if(!empty($_POST["password"])) {
	$password=$_POST["password"];
	$sql ="SELECT Password FROM member WHERE Password=:password";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if(strlen($_POST['password']) <8){
	 echo "<span style='color:red'> Password need to be 8 characters or longer </span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
			echo "<span style='color:green'> Password can be use </span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
	// End code check password


//Code check credit name
if(!empty($_POST["cardnumber"])) {
	$cardnumber=$_POST["cardnumber"];
	$sql ="SELECT CardNumber FROM credit WHERE CardNumber=:cardnumber";
	$query= $dbh -> prepare($sql);
	$query-> bindParam(':cardnumber', $cardnumber, PDO::PARAM_STR);
	$query-> execute();
	$results = $query -> fetchAll(PDO::FETCH_OBJ);
	$cnt=1;
	if(strlen($_POST['cardnumber']) <16){
	 echo "<span style='color:red'> Invalid card number, need 16 characters</span>";
	 echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
			echo "<span style='color:green'> Valid credit card number <span>&check;</span></span>";
			echo "<script>$('#submit').prop('disabled',false);</script>";
	}
}
	// End code check credit


?>
