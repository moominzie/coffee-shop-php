
<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
  

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
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

  <style>
  /* Make the image fully responsive */
  footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  h3 {
        font-weight:900;
        text-transform:uppercase;
        font-family: 'Fjalla One', sans-serif;
        letter-spacing: 1px; 
    }
    * {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    }
    .image-box {
        position: relative;
        margin: auto;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);
    }
    .image-box img {
        max-width: 100%;
        transition: all 0.3s;
        display: block;
        transform: scale(1);
    }

    .image-box:hover img {
        transform: scale(1.1);
        cursor: pointer;
    }

    .img1{
      width: 570px;
      height: 570px;
      margin-top:20px;
      margin-right:35px;
      margin-bottom:20px;
    }

    .img2{
      width: 300px;
      height: 275px;
      margin-top:20px;
      margin-left: -25px;
    }

    .img3{
      width: 300px;
      height: 275px;
      margin-top:20px;
      margin-left: -25px;
    }

    .img4{
      width: 300px;
      height: 275px;
      margin-top:20px;
      margin-left: -25px;
    }
    .img5{
      width: 300px;
      height: 275px;
      margin-top:20px;
      margin-left: -25px;
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
  .sign-in{
    padding:5px 18px;
    border-radius:20px;
    border: 1px solid black;
    font-family: 'Asap', sans-serif;
    font-size: 14px;
    color: black;
    background-color: white;
  }
  .sign-in:hover{
    background-color: #0000000F;
  }
  .sign-out{
    padding:5px 18px;
    border-radius:20px;
    border: 1px solid black;
    font-family: 'Asap', sans-serif;
    font-size: 14px;
    color: white;
    background-color: black;
  }
  .sign-out:hover{
    background-color: #000000B3;
  }
  .carousel .carousel-item {
          width: 100%;
          height: 384px;
        }
        
        .carousel-item img {
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 384px;
        }
        .carousel-inner img {
          width: 100%;
          height: 100%;
        }

  </style>
  
</head>

<body>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<?php
$username=$_SESSION['username'];  
$sql="SELECT * FROM member WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
<?php if(($result->AddressStatus==1)&&($result->PaymentStatus==1)) { ?>
  <?php ($_SESSION['alertlogin']!="")
?>
<div class="alert alert-light" role="alert" >
 <?php echo htmlentities($_SESSION['alertlogin']);?>
<?php echo htmlentities($_SESSION['alertlogin']="");?>
&nbsp<a href="add-address.php" class="alert-link">Add your address</a> and <a href="add-payment.php" class="alert-link">Add your credit card information</a>&nbsp here
</div>

<?php } else if($result->AddressStatus==1) { ?>
  <?php ($_SESSION['alertlogin']!="")
?>
<div class="alert alert-light" role="alert" >
 <?php echo htmlentities($_SESSION['alertlogin']);?>
<?php echo htmlentities($_SESSION['alertlogin']="");?>
&nbsp<a href="add-address.php" class="alert-link">Add your address</a>&nbsp here
</div>

  <?php } else if($result->PaymentStatus==1)  { ?>
    <?php ($_SESSION['alertlogin']!="")
?>
<div class="alert alert-light" role="alert" >
 <?php echo htmlentities($_SESSION['alertlogin']);?>
<?php echo htmlentities($_SESSION['alertlogin']="");?>
&nbsp<a href="add-payment.php" class="alert-link">Add your credit card information</a>&nbsp here
</div>

    <?php } ?>






<?php }} ?>


    <!------MENU SECTION START-->
    <?php include('includes/carousel.php');?>
<!-- MENU SECTION END-->



<!--REGISTER PANEL START-->     

  <div class="container-fluid">
  <h3 class="header-shop">Today’s good mood is sponsored by coffee</h3>

    <div class="row">

      <div class="col-md-6">
      <div class="image-box img1">
      <a>
      <?php
    $sql = "SELECT Images from thumbnail where PositionId = 1";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
  
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="570" height="570" style="">
          <?php }} ?></a>
          </div>
      </div>

      <div class="col-md-3">
      <div class="image-box img2">
      <a href="cake.php" > 
      <?php
     $sql = "SELECT Images from thumbnail where PositionId = 2";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="">
          <?php }} ?></a>
      </div>


      <div class="image-box img3">
      <a href="beverage.php" > 
      <?php
     $sql = "SELECT Images from thumbnail where PositionId = 3";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="">
          <?php }} ?></a>
      </div>
      </div>

      <div class="col-md-3">
      <div class="image-box img4">
      <a href="bakery.php" > 
      <?php
     $sql = "SELECT Images from thumbnail where PositionId = 4";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="">
          <?php }} ?></a>
      </div>

      <div class="image-box img5">
      <a href="dessert.php" > 
      <?php
     $sql = "SELECT Images from thumbnail where PositionId = 5";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="">
          <?php }} ?></a>
      </div>
      </div>

      </div>
    </div>

        <!------FOOTER SECTION START-->
        <?php include('includes/footer.php');?>



</body>

</html>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

