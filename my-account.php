<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
    }

?>
<h4 class="header-line">Your profile</h4>
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

<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Asap', sans-serif;">User Id : </label>
<?php echo htmlentities($result->id);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Username : </label>
<?php echo htmlentities($result->Username);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Firstname : </label>
<?php echo htmlentities($result->FirstName);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Lastname : </label>
<?php echo htmlentities($result->LastName);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Email : </label>
<?php echo htmlentities($result->EmailId);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label>Mobile number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div>
</div>


<div class="col-md-12">  
<div class="form-group">
<label>Reg date : </label>
<?php
date_default_timezone_set("Asia/Bangkok");
echo htmlentities($result->RegDate);?>
</div>
<?php if($result->UpdationDate!=""){?>
<div class="form-group">
<label>Last updation Date : </label>
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


<?php
$type=1;
$sql="SELECT id,Address,Username,AmphureId,ProvinceId,DistrictId,PostalCode,TypeAddress from  address  where Username=:username and TypeAddress=:type ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">    
<div class="form-group">
<label>Address : </label>
<?php echo htmlentities($result->Address);?>
</div>
</div>

<?php $sql = "SELECT provinces.name_en FROM provinces join address on address.ProvinceId=provinces.id where address.TypeAddress in (1) group by address.TypeAddress";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-12">    
<div class="form-group">
<label>Province : </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END PROVINCE -->

<?php $sql = "SELECT amphures.name_en FROM amphures join address on address.AmphureId=amphures.id where address.TypeAddress in (1) group by address.TypeAddress";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-12">    
<div class="form-group">
<label>Amphure : </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END AMPHURE -->

<?php $sql = "SELECT districts.name_en FROM districts join address on address.DistrictId=districts.id where address.TypeAddress in (1) group by address.TypeAddress";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-12">    
<div class="form-group">
<label>District : </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END DISTRICT -->

<?php 
$type=1;
$sql = "SELECT PostalCode,TypeAddress FROM address WHERE Username=:username and TypeAddress=:type";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-12">    
<div class="form-group">
<label>Zip/PostalCode : </label>
<?php echo htmlentities($result->PostalCode);?>
</div>
</div>
<?php }} ?>
<?php }} ?>
<!-- END AMPHURE -->

<div class="col-md-12">   
<a href="#loginform" data-toggle="modal" data-target="#loginform" style="color:white;">
    <p><button class="create-account" >Your Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button></p></a>

    </div>
<?php }} ?>
</form>



