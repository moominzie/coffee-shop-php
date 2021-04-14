<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    .container {
        margin-top: 5%;
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
        color: white;
        font-size: 30px;
        margin-top: -30px;
    }

</style>
<div class="header">
        
      </div>

      <nav class="navbar navbar-default" style="border-bottom: 5px solid #4682B4;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    
    </div>

    <?php if($_SESSION['alogin'])
{
?>   
    
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
          <li><a href="dashboard.php">Dashboard</a></li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Added <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="add-menu.php">Add Menu</a></li>
              <li><a href="add-subcategory.php">Add Sub-Category</a></li>
              <li><a href="add-size.php">Add Glass Size</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Management <i class="fa fa-angle-down"></i></a>
            <ul class="dropdown-menu">
            <li><a href="manage-food.php">Manage Food</a></li>
              <li><a href="manage-beverage.php">Manage Beverage</a></li>
              <li><a href="manage-freshbread.php">Manage Fresh Bread</a></li>
              <li><a href="manage-subcategory.php"> Manage Sub-Category</a></li>
              <li><a href="manage-size.php">Manage Glass Size</a></li>
            </ul>
          </li>

          <li><a href="inbox.php">Inbox </a></li>
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
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Beverage<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Add Coffee</a></li>
              <li><a href="#">Add Milk</a></li>
              <li><a href="#">Add Soda</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Food<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Add Fresh bread Menu</a></li>
              <li><a href="#">Add Spaghetti Menu</a></li>
              <li><a href="#">Add Appetizer & Snack Menu</a></li>
            </ul>
          </li>
         
        </ul>

        
        <ul class="nav navbar-nav navbar-right">
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> สมัครสมาชิก</a></li>
          <li><a href="loginmember.php"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a></li>
          <li><a href="login_admin.php"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบพนักงาน</a></li>
        </ul>
        <?php } ?>


    </div>
  </div>
</nav>
