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

$fname=$_POST['firstname']; 
$lname=($_POST['lastname']); 
$username=$_POST['username'];
$email=$_POST['email']; 
$mobileno=$_POST['mobileno'];
$password=($_POST['password']); 
$status=1;
$sql="INSERT INTO  member (Username,FirstName,LastName,EmailId,MobileNumber,Password,Status) VALUES(:username,:fname,:lname,:email,:mobileno,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    
        $msg="Registeration succesfully";
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Asap:wght@500&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow:wght@200;400&family=Bebas+Neue&family=Fjalla+One&family=Fredoka+One&family=Josefin+Sans&family=Open+Sans:wght@300&family=Staatliches&display=swap" rel="stylesheet">

</head>
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
function checkEmailAvailability() {
    $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'emailid='+$("#emailid").val(),
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
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

    <div class="panel panel-danger" style="margin-left:20%; margin-right:20%">
    
        <div class="panel-heading" style="font-family: 'Montserrat', sans-serif; font-size: 16px; letter-spacing: 1px;">Register Form</div>
        <div class="panel-body" style="">

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter First Name</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="firstname" autocomplete="off" required value="<?php echo htmlspecialchars($_POST['firstname'] ?? '', ENT_QUOTES); ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Last Name</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="lastname" autocomplete="off" required  value="<?php echo htmlspecialchars($_POST['lastname'] ?? '', ENT_QUOTES); ?>" />
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Email</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="email" name="email" id="emailid" onBlur="checkEmailAvailability()"  autocomplete="off" required value="<?php echo htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES); ?>"/>
        <span id="email-availability-status" style="font-size:12px;"></span> 
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Mobile Number</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="mobileno" id="mobilenumber" maxlength="10" onBlur=""  autocomplete="off" required value="<?php echo htmlspecialchars($_POST['mobileno'] ?? '', ENT_QUOTES); ?>" />
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Username</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="text" name="username" id="username" autocomplete="off" onBlur="checkUsernameAvailability()" required value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>"/>
        <span id="username-availability-status" style="font-size:12px;"></span> 
                <!-- Response -->
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Password</label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input class="form-control" type="password" name="password" autocomplete="off" required />
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
      <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Confirm Password </label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
      <input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label style="font-family: 'Montserrat', sans-serif">Verification code : </label>&nbsp;<label style="font-family: 'Oswald', sans-serif; color:red;">*</label>
        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
    </div>  
</div>

<div class="col-md-12">
    <button type="submit" name="signup" class="btn btn-danger" id="submit" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px;"> Register </button> | <a href="loginmember.php" style="font-family: 'Montserrat', sans-serif">Login</a>
</div>

    
    </div>
    <!-- REGISTER END-->
        </div>
      </div>
    </div>
  </form>


</body>
</html>

