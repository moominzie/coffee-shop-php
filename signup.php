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
$address=($_POST['address']); 
$username=$_POST['username'];
$email=$_POST['email']; 
$mobileno=$_POST['mobileno'];
$password=($_POST['password']); 
$status=1;
$sql="INSERT INTO  member (UserId,Username,FullName,Address,EmailId,MobileNumber,Password,Status) VALUES(:UserId,:username,:fname,:address,:email,:mobileno,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':UserId',$UserId,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
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
    .container {
        margin-top: 5%;
    }
    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td {
        height: 50px;
    }
    table {
        margin-left: 70px;
    }
    h1 {
        font-family: 'Montserrat', sans-serif, 'Prompt', sans-serif, 'Abril Fatface', cursive;
    }
    b {
        font-family: 'Prompt', sans-serif;
        font-size: 18px;
    }
    .pad-botm {
    padding-bottom:30px;
    }
    .header-line {
        font-weight:900;
        padding-bottom:25px;
        border-bottom:1px solid #eeeeee;
        text-transform:uppercase;
        font-family: 'Montserrat', sans-serif;
    }
    .text_eng,a {
        font-family: 'Montserrat', sans-serif, 'Prompt', sans-serif, 'Abril Fatface', cursive;
        font-size: 16px;

    }  
    .header1 {
        padding: 50px;
        text-align: center;
        color: white;
        font-size: 30px;
        margin-top: -30px;
    }.header {
        padding: 70px;
        text-align: center;
        background-image: url("assets/img/coffee.jpg") ;
        background-size: 1290px 550px;
        color: white;
        font-size: 30px;
        margin-top: -30px;
    }

</style>

<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!--REGISTER PANEL START-->      
<form action="" method="post" enctype="multipart/form-data" onSubmit="return valid();" name="signup">
    <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">User Signup</h4>
                
                            </div>

        </div>
    <div class="panel panel-danger" style="margin-left:20%; margin-right:20%">
    
        <div class="panel-heading" style="font-size: 16px;">Register Form</div>
        <div class="panel-body" style="">

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Name</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="fullname" autocomplete="off" required />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Last Name</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="fullname" autocomplete="off" required />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Email</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required />
        <span id="user-availability-status" style="font-size:12px;"></span> 
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Mobile Number</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="mobileno" id="mobilenumber" maxlength="10" autocomplete="off" required />
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Username</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="username" id="username" autocomplete="off" required />
                <!-- Response -->
        <div id="uname_response" style="font-size:12px" ></div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Password</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="password" name="password" autocomplete="off" required />
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
      <label style="font-family: 'Oswald', sans-serif;">Confirm Password </label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
      <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label style="font-family: 'Montserrat', sans-serif">Verification code : </label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control"  type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px;" /><img style="margin-top:10px" src="captcha.php">
    </div>  
</div>

<div class="col-md-12">
    <button type="submit" name="signup" class="btn btn-danger" id="submit" style="font-family: 'Prompt', sans-serif;"> Register </button> 
</div>

    
    </div>
    <!-- REGISTER END-->
        </div>
      </div>
    </div>
  </form>
</body>
</html>

