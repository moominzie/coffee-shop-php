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
        padding: 50px;
        text-align: center;
        color: white;
    }
    img:hover{
      cursor: pointer;
    }

</style>

 
<div class="header">

      </div>
 
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2);">

  <?php if($_SESSION['alogin'])
{
?> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">  
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
      </li>    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add-menu.php">Add Menu</a>
          <a class="dropdown-item" href="add-subcategory.php">Add Sub-Category</a>
          <a class="dropdown-item" href="add-size.php">Add Glass Size</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="manage-food.php">Manage Food</a>
          <a class="dropdown-item" href="manage-beverage.php">Manage Beverage</a>
          <a class="dropdown-item" href="manage-freshbread.php">Manage Fresh Bread</a>
          <a class="dropdown-item" href="manage-toast.php">Manage Toast</a>
          <a class="dropdown-item" href="manage-subcategory.php"> Manage Sub-Category</a>
          <a class="dropdown-item" href="manage-size.php">Manage Glass Size</a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav navbar-right">
    <li class="nav-item active">
        <a class="nav-link" href="inbox.php"><p class="account"><i class="fas fa-inbox"></i>&nbsp Inbox</p><span class="sr-only" >(current)</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="account.php"><p class="account"><i class="fas fa-user-circle"></i>&nbsp Manage account</p><span class="sr-only" >(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="mycart.php"><p class="account"><i class="fas fa-store"></i>&nbsp Manage shop</p><span class="sr-only" >(current)</span></a>
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

