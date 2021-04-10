<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
    }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <title>Coffee Shop | Coffee Store</title>
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



</head>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Account Info</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           My Account
                        </div>
                        <div class="panel-body">
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
<label style="font-family: 'Oswald', sans-serif;">User Id : </label>
<?php echo htmlentities($result->id);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Username : </label>
<?php echo htmlentities($result->Username);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">First Name : </label>
<?php echo htmlentities($result->FirstName);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Last Name : </label>
<?php echo htmlentities($result->LastName);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Email : </label>
<?php echo htmlentities($result->EmailId);?>
</div>
</div>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Mobile Number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div>
</div>


<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Reg Date : </label>
<?php
date_default_timezone_set("Asia/Bangkok");
echo htmlentities($result->RegDate);?>
</div>
<?php if($result->UpdationDate!=""){?>
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Last Updation Date : </label>
<?php echo htmlentities($result->UpdationDate);?>
</div>
</div>
<?php } ?>

<div class="col-md-12">  
<div class="form-group">
<label style="font-family: 'Oswald', sans-serif;">Profile Status : </label>
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
<label style="font-family: 'Oswald', sans-serif;">Address : </label>
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
<label style="font-family: 'Oswald', sans-serif;">Province : </label>
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
<label style="font-family: 'Oswald', sans-serif;">Amphure : </label>
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
<label style="font-family: 'Oswald', sans-serif;">District : </label>
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
<label style="font-family: 'Oswald', sans-serif;">Zip/PostalCode : </label>
<?php echo htmlentities($result->PostalCode);?>
</div>
</div>
<?php }} ?>
<?php }} ?>
<!-- END AMPHURE -->

<?php }} ?>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
