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
    table,th,td {
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td {
        height: 50px;
    }
    table {
        margin-left: 70px;
    }
    h1 {
      font-family: 'Bebas Neue', cursive;
    }
    b {
      font-family: 'Bebas Neue', cursive;
        font-size: 18px;
    }
    .pad-botm {
    padding-bottom:30px;
    }
    .header-line {
        font-weight:900;
        padding-bottom:25px;
        border-bottom:1px solid #eeeeee;
        text-transform:uppercase;
        font-family: 'Fjalla One', sans-serif;
        letter-spacing: 1px; 
    }
    .text_eng,a {
        font-family: 'Open Sans', sans-serif;
        font-size: 16px;

    }  
    .header1 {
        padding: 50px;
        text-align: center;
        color: white;
        font-size: 30px;
        margin-top: -30px;
    }.header {
        padding: 50px;
        text-align: center;
        background-image: url("assets/img/coffee.jpg") ;
        background-size: 1290px 550px;
        color: white;
        font-size: 30px;
        margin-top: -30px;
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
        <h1 style="font-family: 'Caveat', cursive; font-size: 64px"><?php echo htmlentities($result->ShopName);?></h1>
      </div>
      <?php }} ?>
             
      <nav class="navbar navbar-default" style="border-bottom: 5px solid #BC8F8F;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"style="font-family: 'Caveat', cursive; font-size: 56px" >Home</a>
    </div>
    <?php if($_SESSION['login'])
{
?>  

    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="beverage.php">Beverage</a></li>
          <li><a href="food.php">Food</a></li>
          <li><a href="fresh-bread.php">Fresh Bread</a></li>
          <li><a href="toast.php">Toast</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" id="ddlmenuItem"  href="#">Account <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="my-account.php">My Account</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="my-address.php">My Address</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-address.php">Add Address</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout <i class="fa fa-sign-out" style="color: #DC143C"></i> </a></li>
            </ul>
          </li>

          <li><a href="#mycart" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal" style="font-size: 16px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Cart </a></li>
        </ul>

        <?php } else { ?>
          <ul class="nav navbar-nav">
          <li><a href="beverage.php">Beverage</a></li>
          <li><a href="food.php">Food</a></li>
          <li><a href="fresh-bread.php">Fresh Bread</a></li>
          <li><a href="toast.php">Toast</a></li>
          <li><a href="contactus.php">Contact Shop</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          <li><a href="loginmember.php"><span class="glyphicon glyphicon-log-in"></span> Member Login</a></li>
          <li><a href="loginadmin.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
        </ul>
        <?php } ?>


    </div>
  </div>
</nav>
