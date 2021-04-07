<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(isset($_POST['signup']))
{
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {    

//Code for student ID
$count_my_page = ("userid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "wa+");
fputs($fp , "$hits[0]");
fclose($fp); 
$UserId= $hits[0];  
$fname=$_POST['fullname']; 
$username=$_POST['username'];
$email=$_POST['email']; 
$mobileno=$_POST['mobileno'];
$password=($_POST['password']); 
$status=1;
$sql="INSERT INTO  member (UserId,Username,FullName,EmailId,MobileNumber,Password,Status) VALUES(:UserId,:username,:fname,:email,:mobileno,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':UserId',$UserId,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo '<script>alert("Your Registration successfull and your member id is  "+"'.$UserId.'")</script>';
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}
}

?>

<html lang="en">
<head>
<title>Coffee Shop | Coffee Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

       <!-- BOOTSTRAP CORE STYLE  -->
       <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&family=Pridi:wght@200&family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Oswald&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">

  <script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
  {
      alert("Password and Confirm Password Field do not match  !!");
      document.signup.confirmpassword.focus();
  return false;
    }
      return true;
    }
</script>
<script>
function checkAvailability() {
    $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#emailid").val(),
        type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
    },
      error:function (){}
    });
}
</script>   
<script>
$(document).ready(function(){

$("#username").keyup(function(){

  var username = $(this).val().trim();

  if(username != ''){

     $.ajax({
        url: 'check_username.php',
        type: 'post',
        data: {username:username},
        success: function(response){

           // Show response
           $("#uname_response").html(response);

        }
     });
  }else{
     $("#uname_response").html("");
  }

});

});
</script>



</head>
<style>
   
</style>

<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!--REGISTER PANEL START-->      

</body>
</html>

