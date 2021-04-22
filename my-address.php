<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['updateadd']))
{    
$username=$_SESSION['username'];  
$address=$_POST['address'];
$amphure=$_POST['amphure'];
$district=$_POST['district'];
$province=$_POST['province'];
$postalcode=$_POST['postalcode'];
$sql="update address set Address=:address,ProvinceId=:province,AmphureId=:amphure,DistrictId=:district,PostalCode=:postalcode where Username=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':amphure',$amphure,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':province',$province,PDO::PARAM_STR);
$query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);

$query->execute();

$msg="Your address has been updated";
}

?>
<body>
<h4 class="header-line">Your address</h4>
<form name="update" method="post">
<?php 
$username=$_SESSION['username'];
$sql="SELECT id,Address,Username,AmphureId,ProvinceId,DistrictId,PostalCode from  address  where Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-5">  
    <?php  if($msg)
{?>

    <div class="alert alert-success" role="alert" >
 <?php echo htmlentities($msg);?>
<?php echo htmlentities($msg="");?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
</div>

<div class="invisible">    
<?php echo htmlentities($result->Username);?>
</div>

<div class="col-md-12">    
<div class="form-group">
<i class="fas fa-map-marker-alt"></i>&nbsp <?php echo htmlentities($result->Address);?>


<?php 
$sql="SELECT districts.name_en,districts.zip_code from  address  join districts on districts.id=address.DistrictId";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<?php echo htmlentities($result->name_en);?>

<?php }} ?>
<!-- END DISTRICT -->

<?php 
$sql="SELECT amphures.name_en from  address  join amphures on amphures.id=address.AmphureId";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<?php echo htmlentities($result->name_en);?>
<?php }} ?>
<!-- END AMPHURE -->


<?php
$sql="SELECT provinces.name_en from  address  join provinces on provinces.id=address.ProvinceId";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<?php echo htmlentities($result->name_en);?>
<?php }} ?>
<!-- END PROVINCE -->

<?php 
$sql="SELECT PostalCode FROM address";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<?php echo htmlentities($result->PostalCode);?>
</div>
</div>
<?php }} ?>
<!-- END AMPHURE -->

<?php }} ?>


<div class="col-md-12">  
                           
<button class="create-account" data-toggle="collapse" href="#editaddress" role="button" aria-expanded="false" aria-controls="editaddress">
    Edit address
  </button>&nbsp&nbsp&nbsp<a href="add-address.php" style="color: black;">Add your address here</a>
</div>

  <div class="collapse" id="editaddress">
  <div class="">
      <!------MENU SECTION START-->
	  <?php include('edit-address.php');?>
  </div>
</div>


</form>

<?php } ?>
</body>
