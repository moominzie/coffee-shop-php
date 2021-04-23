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
        font-family: 'Coda Caption', sans-serif;
        letter-spacing: 1px; 
    }
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: left;
        font-family: arial;
        }

        .price {
        color: grey;
        font-size: 14px;
        }

        .card button {
        border: none;
        outline: 0;
        padding: 12px;
        color: white;
        background-color: #000;
        text-align: center;
        cursor: pointer;
        width: 100%;
        font-size: 18px;
        }

        .card button:hover {
        opacity: 0.7;
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
        width: 270px;
        height: 270px;
        border-radius: 5%;
    }
    .image-box img {
        max-width: 100%;
        transition: all 0.3s;
        display: block;
        width: 270px;
        height: 270px;
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
  
</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

    <!------MENU SECTION START-->
    <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<div class="container-fluid">
<h3 class="header-line" style="margin-top:30px; font-family: 'Fjalla One', sans-serif;text-transform:none;">Beverage</h3>

<?php 
$sql = "SELECT menu.MenuName,menu.Description,menu.Price,menu.Image1,category.Category,subcategory.SubCategory,size.SizeName,type.TypeName,size.Ounce,menu.id as mid from menu join category on menu.CategoryId=category.id join subcategory on menu.SubCategoryId=subcategory.id join size on menu.SizeId=size.id join type on menu.TypeId=type.id order by mid asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 

<div class="col-6 col-md-4">
<div class="image-box">
<a href="product-beverage.php?mid=<?php echo htmlentities($result->mid);?>" style="color: black" >
  <img src="admin/uploads/img/<?php echo htmlentities($result->Image1);?>" width="250" height="250" style="">
  </a>
  </div>
  <a href="product-beverage.php?mid=<?php echo htmlentities($result->mid);?>" style="color: black" ><h4 style="text-align:center;font-family: 'Fjalla One', sans-serif;"><?php echo htmlentities($result->MenuName);?></h4></a>
  <p style="text-align:center;"><?php echo htmlentities($result->Description);?></p>
  <p class="price" style="text-align:center;"><?php echo htmlentities($result->SizeName);?>&nbsp | <?php echo htmlentities($result->Price);?>฿ </p>
  
</div>
<?php }} ?>    


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


