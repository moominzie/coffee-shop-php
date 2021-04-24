<?php
session_start();
error_reporting(0);
include('includes/connection.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['addcart']))
{    
  $username=$_SESSION['username'];  
  $productcode=$_POST['productcode'];
  $quantity=$_POST['quantity'];
  $total=$_POST['total'];
  $productimage=$_POST['productimage'];
  $productname=$_POST['productname'];
  $productprice=$_POST['productprice'];
  $status=1;
  $sql="INSERT INTO  cart (ProductCode,ProductName,ProductImage,ProductPrice,Quantity,TotalPrice,Username,Status) VALUES(:productcode,:productname,:productimage,:productprice,:quantity,:total,:username,:status)";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username',$username,PDO::PARAM_STR);
  $query->bindParam(':productcode',$productcode,PDO::PARAM_STR);
  $query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
  $query->bindParam(':total',$total,PDO::PARAM_STR);
  $query->bindParam(':productimage',$productimage,PDO::PARAM_STR);
  $query->bindParam(':productname',$productname,PDO::PARAM_STR);
  $query->bindParam(':productprice',$productprice,PDO::PARAM_STR);
  $query->bindParam(':status',$status,PDO::PARAM_STR);
  $query->execute();
}

?>

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

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">


</head>

<body>

<div class="modal fade" id="addcart">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title" style="text-align:center; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;"><i class="fas fa-shopping-cart"></i></h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="container-fluid">
            <div class="col-md-12 col-sm-6">
<?php 
$username=$_SESSION['username'];
$mid=intval($_GET['mid']);
$sql = "SELECT menu.MenuName,menu.Description,menu.Price,menu.Image1,category.Category,subcategory.SubCategory,size.SizeName,type.TypeName,size.Ounce,menu.id as mid,ProductCode from menu join category on menu.CategoryId=category.id join subcategory on menu.SubCategoryId=subcategory.id join size on menu.SizeId=size.id join type on menu.TypeId=type.id where menu.id=:mid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':mid', $mid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="image-box">
<img src="admin/uploads/img/<?php echo htmlentities($result->Image1);?>" width="50" height="50" style="">
</div>

<h4 class="" style="text-align:center; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;"><?php echo htmlentities($result->MenuName);?></h4>
<p style="text-align:center;font-weight:900;"><?php echo htmlentities($result->TypeName);?></p>
<p class="price" style="text-align:center;"><?php echo htmlentities($result->SizeName);?>&nbsp<?php echo htmlentities($result->Ounce);?> oz.</td>&nbsp | <?php echo htmlentities($result->Price);?>฿ </p>

              <form method="post">
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="productcode" value="<?php echo htmlentities($result->ProductCode);?>" required autocomplete="off"  />
                        <input class="form-control" type="hidden" name="productname" value="<?php echo htmlentities($result->MenuName);?>" required autocomplete="off"  />
                        <input class="form-control" type="hidden" name="productimage" value="<?php echo htmlentities($result->Image1);?>" required autocomplete="off"  />
                        <input class="form-control" type="hidden" name="productprice" value="<?php echo htmlentities($result->Price);?>" required autocomplete="off"  />
                        <input class="form-control" type="hidden" name="total"  required autocomplete="off"  />

<?php 
$username=$_SESSION['username'];
$sql = "SELECT Username FROM member WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

                        <input class="form-control" type="hidden" name="username" value="<?php echo htmlentities($result->Username);?>" required autocomplete="off"  />
                        <?php }} ?>
                    <div class="modal-footer text-center">
                    <div class="col-sm-3">
                    <input style="item-align:center;" class="form-control" type="number" name="quantity" value="1" required autocomplete="off"  />
                    </div>

                    <button class="create-account" name="addcart">Add Cart &nbsp<i class="fas fa-cart-plus"></i></button>
                     <?php }} ?>
                     </div>
                    </div>
              </form>

            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</div>
<?php } ?>
</body>