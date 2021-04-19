<?php 
session_start();
include('includes/connection.php');
error_reporting(0);


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
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
    <script type="text/javascript" src='includes/jquery-3.4.1.min.js'></script>
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
</head>
<style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.price {
    color: grey;
    font-size: 14px;
}

button {
    border: none;
    outline: 0;
    padding: 5px;
    color: white;
    background-color: #000;
    text-align: center;
    cursor: pointer;
    width: 50%;
    font-size: 16px;
}
button:hover {
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
    width: 300px;
    height: 300px;
    border-radius: 5%;
    margin-top:10px;
}
.image-box img {
    max-width: 100%;
    transition: all 0.3s;
    display: block;
    width: 300px;
    height: 300px;
    transform: scale(1);
}

.image-box:hover img {
    transform: scale(1.1);
    cursor: pointer;
}
 /*------------------------
	1.10. Modal
--------------------------------*/
.modal-dialog {
  width: 650px;
}
.modal-content {
  padding: 0 32px 22px;
}
.modal-header {
	padding:15px 0;
	margin-bottom:25px;
    text-transform:uppercase;
    font-family: 'Fjalla One', sans-serif;
    letter-spacing: 1px; 
}
.modal-body {
	padding:10px 0;
}
.modal .modal-header .close {
  background: #000000 none repeat scroll 0 0;
  border-radius: 50%;
  color: #ffffff;
  font-size: 17px;
  height: 31px;
  line-height: 30px;
  margin-top: 5px;
  opacity: 1;
  text-align: center;
  text-shadow: none;
  width: 31px;
}


    </style>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<?php 
$username=$_SESSION['username'];
$mid=intval($_GET['mid']);
$sql = "SELECT menu.MenuName,menu.Description,menu.Price,menu.Image1,category.Category,subcategory.SubCategory,size.SizeName,type.TypeName,size.Ounce,menu.id as mid from menu join category on menu.CategoryId=category.id join subcategory on menu.SubCategoryId=subcategory.id join size on menu.SizeId=size.id join type on menu.TypeId=type.id where menu.id=:mid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':mid', $mid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<div class="container-fluid">
<h3 class="header-line" style="margin-top:30px; font-family: 'Fjalla One', sans-serif;text-transform:none;">Product</h3>
<div class="col-6 col-md-6">
<div class="image-box">
<img src="admin/uploads/img/<?php echo htmlentities($result->Image1);?>" width="250" height="250" style="">
</div>
</div>

<div class="col-6 col-md-3">
<a href="product.php?mid=<?php echo htmlentities($result->mid);?>" style="color: black" ><h4 style="margin-left:20px;font-family: 'Fjalla One', sans-serif;"><?php echo htmlentities($result->MenuName);?></h4></a>
<p style="margin-left:20px;"><?php echo htmlentities($result->Description);?></p>
<p style="margin-left:20px;font-weight:900;"><?php echo htmlentities($result->TypeName);?></p>
<p class="price" style="margin-left:20px;"><?php echo htmlentities($result->SizeName);?>&nbsp<?php echo htmlentities($result->Ounce);?> oz.</td>&nbsp | <?php echo htmlentities($result->Price);?>฿ </p>
<?php if($_SESSION['login'])
{

?>  
    <a href="#addcart" data-toggle="modal" data-dismiss="modal">
    <p><button style="margin-left:20px;" >Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button></p>
    
    <a href="#buynow" data-toggle="modal" data-dismiss="modal">
    <p><button style="margin-left:20px;" >Buy Now </button></p>
<?php } else { ?>
          <!--Login-Form -->
<?php include('includes/loginmember.php');?>
<!--/Login-Form --> 
  <a href="#loginform" data-toggle="modal" data-dismiss="modal">
    <p><button style="margin-left:20px;" >Add to Cart <i class="fa fa-shopping-cart" aria-hidden="true"></i></button></p>


    <a href="#loginform" data-toggle="modal" data-dismiss="modal">
    <p><button style="margin-left:20px;" >Buy Now </button></p>
</div>
<?php } ?>
<?php }} ?>   
</div>
</div>

     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>


    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>

</body>
</html>
