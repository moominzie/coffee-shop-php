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
          <a class="dropdown-item" href="add-menu.php">New menu &nbsp<i class="fas fa-plus"></i></a>
          <a class="dropdown-item" href="add-subcategory.php">Add sub-category</a>
          <a class="dropdown-item" href="add-size.php">Add glass size</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage product
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="manage-beverage.php">Manage beverage</a>
          <a class="dropdown-item" href="manage-cake.php">Manage cake</a>
          <a class="dropdown-item" href="manage-bakery.php">Manage bakery</a>
          <a class="dropdown-item" href="manage-dessert.php">Manage dessert and ice cream</a>
          <a class="dropdown-item" href="manage-subcategory.php"> Manage sub-category</a>
          <a class="dropdown-item" href="manage-size.php">Manage glass size</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop page
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="edit-banner.php">Manage banner</a>
          <a class="dropdown-item" href="edit-thumbnail.php">Manage thumbnails</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Manage member
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="add-admin.php">New staff &nbsp<i class="fas fa-user-plus"></i></a>
          <a class="dropdown-item" href="shop-member.php">Customer</a>
          <a class="dropdown-item" href="admin-member.php">Staff</a>
        </div>
      </li>

    </ul>

    <ul class="navbar-nav navbar-right">
    <li class="nav-item active">
        <a class="nav-link" href="manage-cart.php"><p class="account"><i class="fas fa-shopping-basket"></i>&nbsp Order</p><span class="sr-only" >(current)</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="inbox.php"><p class="account"><i class="fas fa-inbox"></i>&nbsp Inbox</p><span class="sr-only" >(current)</span></a>
      </li>
    <li class="nav-item active">
        <a class="nav-link" href="account.php"><p class="account"><i class="fas fa-user-circle"></i>&nbsp Manage account</p><span class="sr-only" >(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="manage-shop.php"><p class="account"><i class="fas fa-store"></i>&nbsp Manage shop</p><span class="sr-only" >(current)</span></a>
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

