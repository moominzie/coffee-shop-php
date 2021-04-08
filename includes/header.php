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
        font-family: 'Montserrat', sans-serif, 'Prompt', sans-serif, 'Abril Fatface', cursive;
    }
    b {
        font-family: 'Prompt', sans-serif;
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
        font-family: 'Montserrat', sans-serif;
    }
    .text_eng,a {
        font-family: 'Montserrat', sans-serif, 'Prompt', sans-serif, 'Abril Fatface', cursive;
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
<div class="header">
        <h1 style="font-family: 'Caveat', cursive; font-size: 64px">Coffee Shop & Coffee Store</h1>
      </div>

      <nav class="navbar navbar-default" style="border-bottom: 5px solid#BC8F8F;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php" >Shop</a>
    </div>
    <?php if($_SESSION['login'])
{
?>   
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Dashboard</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Beverage<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Coffee</a></li>
              <li><a href="#">Milk</a></li>
              <li><a href="#">Soda</a></li>
            </ul>
        </li>

         <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Fresh bread</a></li>
              <li><a href="#">Spaghetti</a></li>
              <li><a href="#">Appetizer & Snack</a></li>
            </ul>
          </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" id="ddlmenuItem"  href="#">Account<i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="my-profile.php"> My Profile</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="change-password.php"> Change Password </a></li>
            </ul>
          </li>
          <li><a href="">Order</a></li>
         <a href="logout.php" class="btn btn-danger pull-right" style="margin-top: 8px">Logout</a>
        </ul>
        <?php } else { ?>
            <ul class="nav navbar-nav">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Beverage<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Coffee</a></li>
              <li><a href="#">Milk</a></li>
              <li><a href="#">Soda</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Fresh bread</a></li>
              <li><a href="#">Spaghetti</a></li>
              <li><a href="#">Appetizer & Snack</a></li>
            </ul>
          </li>
          <li><a href="contactus.php">Contact Shop</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
          <li><a href="loginmember.php"><span class="glyphicon glyphicon-log-in"></span> Member Login</a></li>
          <li><a href="loginadmin.php"><span class="glyphicon glyphicon-log-in"></span> Admin Login</a></li>
        </ul>
        <?php } ?>


    </div>
  </div>
</nav>
