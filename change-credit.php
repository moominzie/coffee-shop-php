<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['change']))
{    
    $username=$_SESSION['username'];  
    $cardnumber=$_POST['cardnumber'];
    $expiration=$_POST['expiration'];
    $cvv=$_POST['cvv'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $sql="update credit set CardNumber=:cardnumber,Expiration=:expiration,CVV=:cvv,FirstName=:firstname,LastName=:lastname where Username=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':cardnumber',$cardnumber,PDO::PARAM_STR);
    $query->bindParam(':expiration',$expiration,PDO::PARAM_STR);
    $query->bindParam(':cvv',$cvv,PDO::PARAM_STR);
    $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    
$query->execute();

$_SESSION['addcard']="Add payment method completely";
header('location:checkout.php');
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
    <script type="text/javascript" src='includes/jquery-3.4.1.min.js'></script>
<!-- Latest compiled and minified CSS -->
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
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow:wght@200;400&family=Bebas+Neue&family=Fjalla+One&family=Fredoka+One&family=Josefin+Sans&family=Open+Sans:wght@300&family=Staatliches&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">


    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Asap:wght@400&display=swap" rel="stylesheet">

</head>


<body>


    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Change credit card &nbsp<i class="far fa-credit-card"></i></h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="card">
               <div class="panel-body" style="margin:20px">

<form action="" method="post" role="form" enctype="multipart/form-data">
<?php 
$username=$_SESSION['username'];
$sql="SELECT * from  credit  where UserName=:username";
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
<label>Card number</label>
<input class="form-control" type="text" name="cardnumber" maxlength="16" value="<?php echo htmlentities($result->CardNumber);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Expiration</label>
<input class="form-control" type="text" name="expiration" value="<?php echo htmlentities($result->Expiration);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-2">
<div class="form-group">
<label>CVV</label>
<input class="form-control" type="text" name="cvv" value="<?php echo htmlentities($result->CVV);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Firstname</label>
<input class="form-control" type="text" name="firstname" value="<?php echo htmlentities($result->FirstName);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Lastname</label>
<input class="form-control" type="text" name="lastname" value="<?php echo htmlentities($result->LastName);?>" autocomplete="off" required />
</div>
</div>


<?php }} ?>

<div class="col-md-12">                             
<button type="submit" name="change" class="create-account" >Update credit card </button>
</div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
    </div>
    </div>
          <!------MENU SECTION START-->
          <?php include('includes/footer.php');?>
<!-- MENU SECTION END-->
     <!-- CONTENT-WRAPPER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


    
</body>
</html>
