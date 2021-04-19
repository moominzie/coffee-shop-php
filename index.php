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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <!-- BOOTSTRAP CORE STYLE  -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Pridi:wght@200&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&family=Pridi:wght@200&family=Prompt:wght@200&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300&family=Oswald&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Abel&family=Barlow:wght@200;400&family=Bebas+Neue&family=Fjalla+One&family=Fredoka+One&family=Josefin+Sans&family=Open+Sans:wght@300&family=Staatliches&display=swap" rel="stylesheet">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }
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
  
  </style>
  
</head>

<body>

    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<!--REGISTER PANEL START-->     
<div id="menu" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#menu" data-slide-to="0" class="active"></li>
    <li data-target="#menu" data-slide-to="1"></li>
    <li data-target="#menu" data-slide-to="2"></li>
  </ol>

      <div class="carousel-inner">

      <div class="item active">
        <?php
        
    $sql = "SELECT bevbanner.Images as bev from bevbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->bev);?>" class="d-block w-100" alt="banner" width="1366" height="384">
          <?php }} ?>
          
        </div>

        <div class="item">
        <?php
    $sql = "SELECT foodbanner.Images as food from foodbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->food);?>" class="d-block w-100" alt="banner" width="1366" height="384">
          <?php }} ?>
        </div>

        <div class="item">
        <?php
    $sql = "SELECT breadbanner.Images as bread from breadbanner";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {               ?>  
          <img src="admin/uploads/banner/<?php echo htmlentities($result->bread);?>" class="d-block w-100" alt="banner" width="1366" height="384">
          <?php }} ?>
        </div>

      </div>

        <a class="carousel-control-prev" href="#menu" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#menu" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
</div>


  <div class="container-fluid">
  <h3>Today’s good mood is sponsored by coffee</h3>
    <div class="row">

      <div class="col-md-6">
      <a href="beverage.php" > 
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
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="570" height="570" style="margin-bottom: 20px;margin-top: 20px;">
          <?php }} ?></a>
      </div>

      <div class="col-md-3">
      <a href="fresh-bread.php" > 
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
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="margin-bottom: 20px;margin-top: 20px;margin-left: -35px;">
          <?php }} ?></a>
      </div>

      <div class="col-md-3">
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
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="margin-bottom: 20px;margin-top: 20px;margin-left: -25px;">
          <?php }} ?></a>
      </div>

      <div class="col-md-3">
      <a href="food.php" > 
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
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="margin-bottom: 20px;margin-left: -35px;">
          <?php }} ?></a>
      </div>

      <div class="col-md-3">
      <a href="toast.php" > 
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
          <img src="admin/uploads/thumbnails/<?php echo htmlentities($result->Images);?>" width="300" height="275" style="margin-bottom: 20px;margin-left: -25px;">
          <?php }} ?></a>
      </div>

      </div>
    </div>

        <!------FOOTER SECTION START-->
        <?php include('includes/footer.php');?>



</body>
</html>

