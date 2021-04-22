<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['confirm']))
{    
$username=$_SESSION['username'];  
$orderid=$_POST['orderid'];
$total=$_POST['total'];
$quantity=$_POST['quantity'];
$customername=$_POST['customername'];
$customertel=$_POST['customertel'];
$sql="INSERT INTO  cforder (OrderId,ProductTotalPrice,Quantity,CustomerName,CustomerTel,CustomerUname) VALUES(:orderid,:total,:quantity,:customername,:customertel,:username)";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':orderid',$orderid,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':customername',$customername,PDO::PARAM_STR);
$query->bindParam(':customertel',$customertel,PDO::PARAM_STR);
$query->execute();

$_SESSION['msg']="Your order has been purchase";
header('location:mycart.php');
}

?>

<html lang="en">
<head>
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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">


</head>
<style>
        .card {
          box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
          max-width:800px;
          margin: auto;
          text-align: none;
          align: center;
          border: 0px solid white;
          margin-bottom: 50px;
          margin-top: 0px;
        }
        * {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
.image-box {
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 1);
    position: static;
    margin: auto;
    overflow: hidden;
    width: 200px;
    height: 200px;
    border-radius: 5%;
    margin-top:10px;
    margin-bottom:20px;
    margin-left:10px;
}
.image-box img {
    max-width: 100%;
    transition: all 0.3s;
    display: block;
    width: 200px;
    height: 200px;
    transform: scale(1);
}

.image-box:hover img {
    transform: scale(1.1);
    cursor: pointer;
}
#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    font-size: 18px;
    border: none;
    outline: none;
    background-color: #BC8F8F;
    color: white;
    cursor: pointer;
    padding: 15px;
    border-radius: 50%;
    box-shadow: 2px 2px 5px #000000;
  }

  #myBtn:hover {
    background-color: #555;
  }

  
</style>

<body>

    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!--REGISTER PANEL START-->      


    <div class="container">
    <div class="row pad-botm">
            <div class="col-md-10">
            <?php
$username=$_SESSION['username'];  
$sql="SELECT Quantity as NumberCart FROM checkout WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
                   <h4 class="header-left">Checkout &nbsp(<?php echo htmlentities($result->NumberCart);?>)</h4>
        <?php }} ?>
                   </div>
<?php
$username=$_SESSION['username'];  
$sql="SELECT Total as Total FROM checkout WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
                   <h5 class="header-right">Total price: <?php echo htmlentities($result->Total);?>  ฿ </h5>
                   <?php }} ?>
                        </div>
                        

                        <div class="card" >
                            
                        
<?php
$username=$_SESSION['username'];  
$sql="SELECT * FROM checkout WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  



<div class="card-header" style="border-radius:15px; width:400px;margin-top:10%;margin-left:5%;font-size:18px;font-family: 'Noto Sans JP', sans-serif; ">
    Prepare order &nbsp<i class="fas fa-shopping-basket"></i>
  </div>

  <div style="margin-left: 70px;margin-bottom: 70px;margin-top: 20px;margin-right: 70px;">
  <form name="update" method="post">     
  <h5 class="header-line">Order info</h5>
  <input class="form-control" type="hidden" name="orderid" value="<?php echo htmlentities($result->id);?>" required autocomplete="off"  />

<div class="col-md-12">  
<div class="form-group">
<label>Product quantity : </label>
<?php echo htmlentities($result->Quantity);?> item
</div>
</div>             
<input class="form-control" type="hidden" name="quantity" value="<?php echo htmlentities($result->Quantity);?>" required autocomplete="off"  />

<div class="col-md-12">  
<div class="form-group">
<label>Total price : </label>
<?php echo htmlentities($result->Total);?> ฿ 
</div>
</div>             
<input class="form-control" type="hidden" name="total" value="<?php echo htmlentities($result->Total);?>" required autocomplete="off"  />

<div class="col-md-12">  
<div class="form-group">
<label>Name-Surname :</label>
<?php echo htmlentities($result->CustomerName);?> &nbsp<?php echo htmlentities($result->CustomerLname);?>
</div>
</div>
<input class="form-control" type="hidden" name="customername" value="<?php echo htmlentities($result->CustomerName);?> <?php echo htmlentities($result->CustomerLname);?>" required autocomplete="off"  />


<div class="col-md-12">  
<div class="form-group">
<label><i class="fas fa-mobile-alt"></i>&nbsp Mobile number : </label>
<?php echo htmlentities($result->CustomerTel);?>
</div>
</div>

<input class="form-control" type="hidden" name="username" value="<?php echo htmlentities($result->Username);?>" required autocomplete="off"  />


<h5 class="header-line">Address</h5>
<?php 
$username=$_SESSION['username'];
$sql="SELECT Address,Username,PostalCode,districts.name_en as Districts,amphures.name_en as Amphures,provinces.name_en as Provinces from  address join districts on address.DistrictId=districts.id join amphures on address.AmphureId=amphures.id join provinces on address.ProvinceId=provinces.id  where Username=:username";
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
<i class="fas fa-map-marker-alt"></i>&nbsp <?php echo htmlentities($result->Address);?>&nbsp <?php echo htmlentities($result->Districts);?> &nbsp <?php echo htmlentities($result->Amphures);?> &nbsp <?php echo htmlentities($result->Provinces);?> &nbsp <?php echo htmlentities($result->PostalCode);?>
</div>
</div>


<?php }} ?>

<div class="col-md-12">  
          

<?php
$username=$_SESSION['username'];  
$sql="SELECT * FROM checkout WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

  <form name="update" method="post">     

<input class="form-control" type="hidden" name="orderid" value="<?php echo htmlentities($result->id);?>" required autocomplete="off"  />           
<input class="form-control" type="hidden" name="quantity" value="<?php echo htmlentities($result->Quantity);?>" required autocomplete="off"  />         
<input class="form-control" type="hidden" name="total" value="<?php echo htmlentities($result->Total);?>" required autocomplete="off"  />
<input class="form-control" type="hidden" name="customername" value="<?php echo htmlentities($result->CustomerName);?> <?php echo htmlentities($result->CustomerLname);?>" required autocomplete="off"  />
<input class="form-control" type="hidden" name="customertel" value="<?php echo htmlentities($result->CustomerTel);?>" required autocomplete="off"  />
<input class="form-control" type="hidden" name="username" value="<?php echo htmlentities($result->Username);?>" required autocomplete="off"  />


<button name="confirm" class="create-account" type="submit" onclick="emptyCart()">
    Confirm order
  </button>&nbsp&nbsp&nbsp<a href="change-address.php" style="color: black;">Change address</a>
</div>
</form>
<?php }} ?>   
</div>
 <?php }} ?>                                      
                                   

                     
                            </div>

    
    </div>
    <!-- REGISTER END-->
        </div>
      </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
     <?php include('includes/footer.php');?>

     <?php } ?>
</body>
</html>

<script>
function emptyCart() {
  <?php 
    $username=$_SESSION['username'];  
    $sql="DELETE FROM checkout WHERE Username=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->execute();?>
}
</script>
