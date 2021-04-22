<?php 
session_start();
include('includes/connection.php');
?>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
</head>

<style>
    .container {
        margin-top: 5%;
    }
    h1 {
      font-family: 'Asap', sans-serif;
    }
    b {
      font-family: 'Asap', sans-serif;
        font-size: 18px;
    }
    .pad-botm {
    padding-bottom:30px;
    }
    .header-line {
        font-weight:900;
        padding-bottom:25px;
        border-bottom:1px solid #eeeeee;
        text-transform:none;
        font-family: 'Noto Sans JP', sans-serif; 
    }

    .header-left {
        font-weight:900;
        padding-bottom:25px;
        text-transform:none;
        border-bottom:1px solid #eeeeee;
        font-family: 'Noto Sans JP', sans-serif; 
    }
    .header-right {
        text-align: right;
        padding-bottom:25px;
        text-transform:none;
        border-bottom:1px solid #eeeeee;
        font-family: 'Asap', sans-serif;
        margin-left: 70px;
    }
    .text_eng,a {
      font-family: 'Asap', sans-serif;
        font-size: 14px;

    }  
    .header1 {
        padding: 50px;
        text-align: center;
        color: white;
        font-size: 30px;
        margin-top: -30px;
    }.header {
        padding: 60px 70px;
        text-align: center;
        background-image: url("assets/img/coffee.jpg") ;
        background-size: 1400px 550px;
        color: white;
        font-size: 30px;
    }
    img:hover{
      cursor: pointer;
    }

    .count {

    }  


</style>

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
<div class="header">
        <h1 style="font-family: 'Orelega One', cursive; font-size: 64px;text-shadow: 2px 2px black;"><?php echo htmlentities($result->ShopName);?></h1>
      </div>
 
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);">
  <a class="navbar-brand" href="#"></a><img src="admin/uploads/logo/<?php echo htmlentities($result->Logo);?>" width="60" height="60" >
  <?php }} ?>
  
  <?php if($_SESSION['login'])
{
?> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">  
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="beverage.php">Beverage</a>
          <a class="dropdown-item" href="fresh-bread.php">Fresh Bread</a>
          <a class="dropdown-item" href="toast.php">Toast</a>
          <a class="dropdown-item" href="food.php">Food</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav navbar-right">
    <li class="nav-item active">
        <a class="nav-link" href="account.php"><p class="account"><i class="fas fa-user-circle"></i>&nbsp Account</p><span class="sr-only" >(current)</span></a>
      </li>
      <li class="nav-item active">
      <?php
$username=$_SESSION['username'];  
$sql="SELECT SUM(Quantity) as NumberCart FROM cart WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
                   
        <a class="nav-link" href="mycart.php"><p class="account"><i class="fas fa-shopping-cart"></i>&nbsp My Cart  <span class="count"><?php echo htmlentities($result->NumberCart);?></span><span class="cart_item" ><?php echo $results->id; ?></span></p><span class="sr-only" >(current)</span></a>
        <?php }} ?>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php"><p class="sign-out">Sign out</p><span class="sr-only" >(current)</span></a>
      </li>
    </ul>
  </div>

  <?php } else { ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">  
    <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Menu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="beverage.php">Beverage</a>
          <a class="dropdown-item" href="fresh-bread.php">Fresh Bread</a>
          <a class="dropdown-item" href="toast.php">Toast</a>
          <a class="dropdown-item" href="food.php">Food</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav navbar-right">
    <li class="nav-item active">
        <a class="nav-link" href="loginmember.php"><p class="sign-in">Sign in</p><span class="sr-only" >(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="register.php"><p class="sign-out">Join now</p><span class="sr-only" >(current)</span></a>
      </li>
    </ul>
  </div>
  <?php } ?>
</nav>