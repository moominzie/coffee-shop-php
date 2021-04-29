
<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['update']))
{    
$username=$_SESSION['username'];  
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$mobileno=$_POST['mobileno'];

$sql="update member set FirstName=:fname,LastName=:lname,MobileNumber=:mobileno where Username=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();
$compro="Your profile has been updated";
}

?>

<?php 
$username=$_SESSION['username'];
$sql="SELECT id,Username,FirstName,LastName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  member  where Username=:username ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  


<h4 class="header-line"><?php echo htmlentities($result->FirstName);?>&nbsp<?php echo htmlentities($result->LastName);?></h4>
<div class="col-md-8">
  <?php if($error){?><div class="alert alert-danger" role="alert" ><?php echo htmlentities($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div><?php } 
				else if($msg){?><div class="alert alert-success" role="alert" ><?php echo htmlentities($msg); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div><?php }?>
</div>

<div class="col-md-12">  
<div class="form-group">
<label><i class="fas fa-user-alt"></i>&nbsp Username : </label>
<?php echo htmlentities($result->Username);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Name-Surname : </label>
<?php echo htmlentities($result->FirstName);?> &nbsp<?php echo htmlentities($result->LastName);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label><i class="fas fa-mobile-alt"></i>&nbsp Mobile number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label><i class="fas fa-envelope"></i>&nbsp Email : </label>
<?php echo htmlentities($result->EmailId);?>
</div>
</div>



<div class="col-md-12">  
<div class="form-group">
<label><i class="fas fa-user-clock"></i>&nbsp Reg date : </label>
<?php
date_default_timezone_set("Asia/Bangkok");
echo htmlentities($result->RegDate);?>
</div>
<?php if($result->UpdationDate!=""){?>
<div class="form-group">
<label><i class="fas fa-history"></i>&nbsp Last updation Date : </label>
<?php echo htmlentities($result->UpdationDate);?>
</div>
<?php } ?>
</div>


<div class="col-md-12">  
<div class="form-group">
<label>Profile status : </label>
<?php if($result->Status==1){?>
<span style="color: green">Active <i class="far fa-check-circle"></i></span>
<?php } else { ?>
<span style="color: red">Blocked <i class="far fa-times-circle"></i></span>
<?php }?>
</div>
</div>




<?php }} ?>

<div class="col-md-12">            
<a data-toggle="collapse" href="#editprofile" role="button" aria-expanded="false" aria-controls="editprofile">
  <button class="create-account" >
    Edit your profile</button>
  </a>&nbsp&nbsp&nbsp<a href="change-password.php" style="color: black;">Change password here</a>
</div>


<div class="collapse" id="editprofile">
  <div>

  <form name="update" method="post">
<?php 
$username=$_SESSION['username'];
$sql="SELECT * from  member  where UserName=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-6">
<div class="form-group">
First name
<input class="form-control" type="text" name="firstname" value="<?php echo htmlentities($result->FirstName);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
Last name
<input class="form-control" type="text" name="lastname" value="<?php echo htmlentities($result->LastName);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
Mobile number
<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
Your email
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />

</div>
</div>

<div class="col-md-3">
<div class="form-group">
Username
<input class="form-control" type="email" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />
</div>
</div>

<?php }} ?>


<div class="col-md-12">
    <button type="submit" name="update" class="create-account" id="submit" > Update profile </button>
</div>
</form>
  </div>
</div>
<?php } ?> 