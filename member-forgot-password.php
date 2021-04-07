<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if(isset($_POST['change']))
{
  //code for captach verification
  if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
    echo "<script>alert('Incorrect verification code');</script>" ;
} 
    else {
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];
$newpassword=($_POST['newpassword']);
$sql ="SELECT EmailId FROM member WHERE EmailId=:email and MobileNumber=:mobileno";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':mobileno', $mobileno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update member set Password=:newpassword where EmailId=:email and MobileNumber=:mobileno";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':mobileno', $mobile, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Email หรือหมายเลขโทรศัพท์ไม่ถูกต้อง"; 
}
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title></title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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

  <script type="text/javascript">
function valid()
{
if(document.change.newpassword.value!= document.change.confirmpassword.value)
  {
      alert("Password and Confirm Password Field do not match  !!");
      document.change.confirmpassword.focus();
  return false;
    }
      return true;
    }
</script>

</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END--><!--REGISTER PANEL START-->      
<form action="" method="post" enctype="multipart/form-data" onSubmit="return valid();" name="change">
    <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Member login</h4>
                
                            </div>

        </div>
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>   
    <div class="panel panel-info" style="margin-left:20%; margin-right:20%">
    
        <div class="panel-heading"><b>รหัสผ่านใหม่</b></div>
        <div class="panel-body" style="">
 
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Register Email</label>
        <input class="form-control" type="text" name="email" autocomplete="off" required />
    </div>
    <div class="form-group">
        <label style="font-family: 'Oswald', sans-serif;">Enter Reg Mobile Number</label>
        <input class="form-control" type="text" name="mobileno" autocomplete="off" required />
    </div>

    
    <div class="form-group">
    <label style="font-family: 'Oswald', sans-serif;" >Password</label>
    <input class="form-control" type="password" name="newpassword" required autocomplete="off"  />
    </div>

    <div class="form-group">
    <label style="font-family: 'Oswald', sans-serif;">ConfirmPassword</label>
    <input class="form-control" type="password" name="confirmpassword" required autocomplete="off"  />
    </div>

    <div class="form-group">
    <label style="font-family: 'Montserrat', sans-serif">Verification code : </label>
    <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
    </div>  
    <button type="submit" name="change" class="btn btn-info" style=" font-family: 'Mitr', sans-serif; font-size: 16px">Change Password</button> | <a href="loginmember.php">Login</a>
    </div>
    <!-- REGISTER END-->
 
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
