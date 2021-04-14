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
        padding: 70px;
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

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Beverage <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="add-menu.php">Add Menu</a></li>
              <li><a href="add-subcategory.php">Add Sub-Category</a></li>
              <li><a href="add-size.php">Add Glass Size</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
            <li><a href="manage-food.php">Manage Food</a></li>
              <li><a href="manage-beverage.php">Manage Beverage</a></li>
              <li><a href="manage-freshbread.php">Manage Fresh Bread</a></li>
              <li><a href="manage-subcategory.php"> Manage Sub-Category</a></li>
              <li><a href="manage-size.php">Manage Glass Size</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fresh Bread <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
            <li><a href="manage-food.php">Manage Food</a></li>
              <li><a href="manage-beverage.php">Manage Beverage</a></li>
              <li><a href="manage-freshbread.php">Manage Fresh Bread</a></li>
              <li><a href="manage-subcategory.php"> Manage Sub-Category</a></li>
              <li><a href="manage-size.php">Manage Glass Size</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" id="ddlmenuItem"  href="#">Account <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
            <li role="presentation"><a role="menuitem" tabindex="-1" href="admin-member.php">Admin Member</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="admin-profile.php">Admin Profile</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php">Change Password</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout <i class="fa fa-sign-out" style="color: #DC143C"></i> </a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" id="ddlmenuItem"  href="#">Manage Shop <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="add-admin.php">Add admin user</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="shop-information.php">Shop Information</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="shop-member.php">Shop Member</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="member-address.php">Member Address</a></li>
            </ul>
          </li>
        </ul>

        <?php } else { ?>
          <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Beverage <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="add-menu.php">Add Menu</a></li>
              <li><a href="add-subcategory.php">Add Sub-Category</a></li>
              <li><a href="add-size.php">Add Glass Size</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
            <li><a href="manage-food.php">Manage Food</a></li>
              <li><a href="manage-beverage.php">Manage Beverage</a></li>
              <li><a href="manage-freshbread.php">Manage Fresh Bread</a></li>
              <li><a href="manage-subcategory.php"> Manage Sub-Category</a></li>
              <li><a href="manage-size.php">Manage Glass Size</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Fresh Bread <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
            <li><a href="manage-food.php">Manage Food</a></li>
              <li><a href="manage-beverage.php">Manage Beverage</a></li>
              <li><a href="manage-freshbread.php">Manage Fresh Bread</a></li>
              <li><a href="manage-subcategory.php"> Manage Sub-Category</a></li>
              <li><a href="manage-size.php">Manage Glass Size</a></li>
            </ul>
          </li>
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
