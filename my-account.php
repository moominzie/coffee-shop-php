<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
    }

?>

<form name="update" method="post">
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
<?php echo htmlentities($result->updationDate);?>
</div>
<?php } ?>
</div>


<div class="col-md-12">  
<div class="form-group">
<label>Profile status : </label>
<?php if($result->Status==1){?>
<span style="color: green">Active</span>
<?php } else { ?>
<span style="color: red">Blocked</span>
<?php }?>
</div>
</div>


<div class="col-md-12">   
<a href="#loginform" data-toggle="modal" data-target="#loginform" style="color:white;">
    <p><button class="create-account" >Your Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button></p></a>

    </div>
<?php }} ?>
</form>



