<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if($_SESSION['login']!=''){
$_SESSION['login']='';
}
if(isset($_POST['login']))
{
  //code for captach verification
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
        else {
$email=$_POST['emailid'];
$password=($_POST['password']);
$sql ="SELECT EmailId,Password,Username,Status FROM member WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
 foreach ($results as $result) {
 $_SESSION['username']=$result->Username;
if($result->Status==1)
{
$_SESSION['login']=$_POST['emailid'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Invalid Details');</script>";
}
}
}
?>

<html lang="en">
<head>
<title>Coffee Shop | Coffee Store</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

</head>
<body>

    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!-- FORM START -->
<form action="" method="post" role="form" enctype="multipart/form-data">
    <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Member Login</h4>
                
                            </div>

        </div>
    <div class="panel panel-info" style="margin-left:20%; margin-right:20%">
        <div class="panel-heading" style="font-size: 16px;">Login</div>
        <div class="panel-body" style="">
              
    <div class="form-group">
        <label style="font-family:'Oswald', sans-serif;">Enter Email</label>
        <input class="form-control" type="text" name="emailid" autocomplete="off" required />
    </div>
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Password</label>
        <input class="form-control" type="password" name="password" required autocomplete="off"  />
        <p class="help-block"><a href="member-forgot-password.php"style="font-family: 'Prompt', sans-serif; color: #EC7063; font-size: 14px">Forget Password?</a></p>
    </div>
    <div class="form-group">
       <label style="font-family: 'Montserrat', sans-serif">Verification code : </label>
        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
    </div>  
    <button type="submit" name="login" class="btn btn-info" style="font-family: 'Prompt', sans-serif;"> Login </button> | <a href="signup.php" style="font-family: 'Prompt', sans-serif;">Do not register?</a>
 
  </div>
        </div>
      </div>
    </div>
  </form>


</body>
</html>

