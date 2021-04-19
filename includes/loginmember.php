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
$currentpage=$_SERVER['REQUEST_URI'];
echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";
} else {
echo "<script>alert('Your Account Has been blocked .Please contact admin');</script>";

}
}

} 

else{
echo "<script>alert('Email or Password is incorrect!');</script>";
}
}
}
?>

<div class="modal fade" id="loginform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Please Login</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="login_wrap">
            <div class="col-md-12 col-sm-6">
              <form method="post">
              <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Email</label>
        <input class="form-control" type="text" name="emailid" autocomplete="off" required />
    </div>
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Password</label>
        <input class="form-control" type="password" name="password" required autocomplete="off"  />
        <p class="help-block"><a href="member-forgot-password.php"style="font-family: 'Open Sans', sans-serif; color: #EC7063; font-size: 14px">Forget Password?</a></p>
    </div>
    <div class="form-group">
       <label style="font-family: 'Montserrat', sans-serif">Verification code : </label>
        <input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
    </div>  
    <button type="submit" name="login" class="btn btn-info" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px;"> Login </button>
 
              </form>
            </div>
           
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Don't have an account? <a href="register.php" style="font-size:14px;">Signup Here</a></p>
      </div>
    </div>
  </div>
</div>
