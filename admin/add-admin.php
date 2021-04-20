<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:loginadmin.php');
}
if(isset($_POST['regadmin']))
{
//code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {    
 
$fname=$_POST['firstname']; 
$lname=$_POST['lastname']; 
$email=$_POST['email'];
$mobileno=$_POST['mobileno']; 
$username=$_POST['username'];
$password=md5($_POST['password']);
$status=1;
$sql="INSERT INTO  employee (FirstName,LastName,AdminEmail,MobileNumber,UserName,Password,Status) VALUES(:fname,:lname,:email,:mobileno,:username,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  $msg="Add the new ADMIN successfully. Your USERNAME is $username";
}
else {
$error="Something went wrong. please try again";  
}
}
}

?>

<html lang="en">
<head>
<?php
$sql="SELECT * from  shop ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>   
<title><?php echo htmlentities($result->ShopName);?></title>

      <?php }} ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
  <link href="assets/bs4/css/all.css" rel="stylesheet"> <!--load all styles -->

  <link href="assets/bs4/css/style.css" rel="stylesheet"> <!--load all styles -->

    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow:wght@200;400&family=Bebas+Neue&family=Fjalla+One&family=Fredoka+One&family=Josefin+Sans&family=Open+Sans:wght@300&family=Staatliches&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Asap:wght@400&display=swap" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">

  <script type="text/javascript">
function valid()
{
if(document.regadmin.password.value!= document.regadmin.confirmpassword.value)
  {
      alert("Password and Confirm Password Field do not match  !!");
      document.regadmin.confirmpassword.focus();
  return false;
    }
      return true;
    }
</script>
<script>
function checkEmailAvailability() {
    $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'adminemail='+$("#adminemail").val(),
        type: "POST",
    success:function(data){
        $("#email-availability-status").html(data);
        $("#loaderIcon").hide();
    },
      error:function (){}
    });
}

function checkUsernameAvailability() {
    $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'username='+$("#username").val(),
        type: "POST",
    success:function(data){
        $("#username-availability-status").html(data);
        $("#loaderIcon").hide();
    },
      error:function (){}
    });
}




</script>   


<script>
/*
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
*/
</script>




</head>
<style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>

<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!--REGISTER PANEL START-->      
<form action="" method="post" enctype="multipart/form-data" onSubmit="return valid();" name="signup">
<div class="content-wrapper">
   <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
            <h4 class="" style="text-align:center; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;">Create new staff</h4>
            <?php
                    $sql="SELECT * from  shop ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $cnt=1;
                    if($query->rowCount() > 0)
                    {
                    foreach($results as $result)
                    {               ?>   
                    <p style="text-align:center;color: grey;"> Join to <?php echo htmlentities($result->ShopName);?></p>

                        <?php }} ?>
                            </div>
        </div>
<div class="card">
<div class="panel-body" style="margin:50px">
 
 <div class="col-md-6">
    <div class="form-group">
        <label>Staff firstname</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="firstname" autocomplete="off" required value="<?php echo htmlspecialchars($_POST['firstname'] ?? '', ENT_QUOTES); ?>"/>
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label>Staff lastname</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="lastname" autocomplete="off" required value="<?php echo htmlspecialchars($_POST['lastname'] ?? '', ENT_QUOTES); ?>"/>
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label>Staff email</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="email" name="email" id="adminemail" onBlur="checkEmailAvailability()"  autocomplete="off" required value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>" />
        <span id="email-availability-status" style="font-size:12px;"></span> 
    </div>

    <div class="form-group">
        <label>Staff mobile number</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="mobileno" id="mobileno" onBlur=""  autocomplete="off" required value="<?php echo htmlspecialchars($_POST['mobileno'] ?? '', ENT_QUOTES); ?>"/>
       
    </div>
</div>

    

    <div class="col-md-6">
    <div class="form-group">
        <label>Username</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="username" id="username" onBlur="checkUsernameAvailability()" autocomplete="off" required />
        <span id="username-availability-status" style="font-size:12px;"></span> 
          <!-- Response -->
       <!--  <div id="uname_response" style="font-size:12px" ></div> -->
    </div>
    </div>

    <div class="col-md-6">
    <div class="form-group">
        <label>Password</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="password" name="password" autocomplete="off" required />
    </div>
    <div class="form-group">
      <label>Confirm password </label>&nbsp;<label for="" style="color: red;">* </label>
      <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
    </div>

   
    <div class="form-group">
        <label style="">Verification code : </label>&nbsp;<label style="color:red;">*</label>
        <input class="form-control" type="text"  name="vercode" maxlength="5" autocomplete="off" required /><img src="captcha.php" style="margin-top: 10px">
    </div>  
</div>

    <div class="col-md-12">
  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
</div>

<div class="col-md-6" style="margin-left:290px;margin-top:10px;">
    <button type="submit" name="regadmin" class="create-account" id="submit" > Create account </button>
</div>
    </div> 
    
    </div>
    <!-- REGISTER END-->
        </div>
      </div>
    </div>
    </div>
  </form>
</body>
</html>

