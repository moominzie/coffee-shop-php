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
  $sql="update address set Address=:address,Province=:province,Amphure=:amphure,District=:district,PostalCode=:postalcode where Username=:username";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':amphure',$amphure,PDO::PARAM_STR);
  $query->bindParam(':district',$district,PDO::PARAM_STR);
  $query->bindParam(':province',$province,PDO::PARAM_STR);
  $query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);
  
  $query->execute();
 $comadd="Your address has been update";
  header('location:account.php');
  }
  
?>


<h4 class="header-line">Your address</h4>

<?php 
$username=$_SESSION['username'];
$sql="SELECT * from address where Username=:username";
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
<?php  if($comadd)
{?>
<div class="alert alert-success" role="alert" >
 <?php echo htmlentities($comadd);?>
<?php echo htmlentities($comadd="");?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
</div>

<div class="col-md-12">    
<div class="form-group">
<i class="fas fa-map-marker-alt"></i>&nbsp <?php echo htmlentities($result->Address);?>&nbsp <?php echo htmlentities($result->District);?> &nbsp <?php echo htmlentities($result->Amphure);?> &nbsp <?php echo htmlentities($result->Province);?> &nbsp <?php echo htmlentities($result->PostalCode);?>
</div>
</div>


<?php }} ?>

<div class="col-md-12">            
<a href="#demo" data-toggle="collapse"><button class="create-account" >
    Edit address 
  </button></a>&nbsp&nbsp&nbsp<a href="add-address.php" style="color: black;">Add your address here</a>
</div>

  <div id="demo" class="collapse">
 
  <form action="" method="post" role="form" enctype="multipart/form-data">
<div class="col-md-12">
<div class="form-group">
<label>Address</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Address);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>District</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->District);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Amphure</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Amphure);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Province</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Province);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Postal code</label>
<input class="form-control" type="text" name="postalcode" id="" maxlength="5" value="<?php echo htmlentities($result->PostalCode);?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-12">                             
<button type="submit" name="updateadd" class="create-account" >Update address </button>
</div>
</form>
</div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

<?php } ?>