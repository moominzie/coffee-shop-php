<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:loginadmin.php');
}
if(isset($_POST['add']))
  {
$menuname=$_POST['menuname'];
$description=$_POST['description'];
$price=$_POST['price'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$type=$_POST['type'];
$size=$_POST['size'];
$productcode=$_POST['productcode'];
$image1=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/img/".$_FILES["img1"]["name"]);


$sql="INSERT INTO menu(MenuName,Description,Price,Image1,CategoryId,SubCategoryId,SizeId,TypeId,ProductCode) VALUES(:menuname,:description,:price,:image1,:category,:subcategory,:size,:type,:productcode)";
$query = $dbh->prepare($sql);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':menuname',$menuname,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':image1',$image1,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':subcategory',$subcategory,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->bindParam(':size',$size,PDO::PARAM_STR);
$query->bindParam(':productcode',$productcode,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $msg="Add the new Menu successfully. ";
  }
  else {
  $error="Something went wrong. please try again";  
  }
  }


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<script>
function checkProductcode() {
    $("#loaderIcon").show();
        jQuery.ajax({
        url: "check_availability.php",
        data:'productid='+$("#productid").val(),
        type: "POST",
    success:function(data){
        $("#product-code-status").html(data);
        $("#loaderIcon").hide();
    },
      error:function (){}
    });
}
</script>   

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
    </style>

<body>
      <!------MENU SECTION START-->
      <?php include('includes/header.php');?>
<!-- MENU SECTION END-->

<form action="" method="post" enctype="multipart/form-data" onSubmit="return valid();" name="add">
<div class="content-wrapper">
   <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
            <h4 class="header-line" style="text-align:none; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;">Create an Product &nbsp<i class="fas fa-mug-hot"></i></h4>
                            </div>
        </div>
<div class="card">
        <div class="panel-body" style="margin:20px">
 
        <div class="col-md-4">
    <div class="form-group">
        <label>Product code</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="productcode" id="productid" autocomplete="off" maxlength="10" onBlur="checkProductcode()" required />
        <span id="product-code-status" style="font-size:12px;"></span> 
    </div>
    </div>

 <div class="col-md-12">
    <div class="form-group">
        <label>Menu name</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="text" name="menuname" autocomplete="off" required />
    </div>
    </div>

    <div class="col-md-12">
    <div class="form-group">
        <label>Menu description</label>
        <textarea class="form-control" type="text" name="description" autocomplete="off"></textarea>
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
        <label>Menu price</label>&nbsp;<label for="" style="color: red;">* </label>
        <input class="form-control" type="number" name="price" autocomplete="off" required />
    </div>
    </div>

    <div class="col-md-8">
    <div class="form-group">
        <label>Picture</label>&nbsp;<label for="" style="color: red;">* Please use image scale 300x300 px. </label>
        <input class="form-control" type="file" name="img1" autocomplete="off" required />
    </div>
    </div>

    <div class="form-group col-md-6">
    <label>Category</label>&nbsp;<label for="" style="color: red;">* </label>
        <!-- END TITLE -->
    
    <select name="category" id="" class="form-control form-control-lg" onBlur="" required>
<option value='0'> Select Category </option>
<?php 
          ## Fetch amphures
          $query = $dbh->prepare("SELECT * FROM category ORDER BY id");
          $query->execute();
          $categoryList = $query->fetchAll();

          foreach($categoryList as $category){
             echo "<option value='".$category['id']."'>".$category['Category']."</option>";
          }
          ?>
</select>
</div>
<!-- END CATEGORY -->

<div class="form-group col-md-6">
    <label>Sub-Category</label>&nbsp;<label for="" style="color: red;">* </label><a href="add-subcategory.php" style="color: #006400" > /Add Sub-Category</a>
        <!-- END TITLE -->
    
    <select name="subcategory" id="" class="form-control form-control-lg" onBlur="" required>
<option value='0'> Select Sub-Category </option>
<?php 
          ## Fetch amphures
          $query = $dbh->prepare("SELECT * FROM subcategory ORDER BY id");
          $query->execute();
          $subcategoryList = $query->fetchAll();

          foreach($subcategoryList as $subcategory){
             echo "<option value='".$subcategory['id']."'>".$subcategory['SubCategory']."</option>";
          }
          ?>
</select>
</div>
<!-- END SUB CATEGORY -->

<div class="form-group col-md-6">
    <label>Glass Size</label><a href="add-size.php" style="color: #006400" > /Add Glass Size</a>
        <!-- END TITLE -->
    
    <select name="size" id="" class="form-control form-control-lg" onBlur="" required>
<option value='0'> Select Glass Size </option>
<?php 
          ## Fetch amphures
          $query = $dbh->prepare("SELECT * FROM size ORDER BY id");
          $query->execute();
          $sizeList = $query->fetchAll();

          foreach($sizeList as $size){
             echo "<option value='".$size['id']."'>".$size['SizeName']."</option>";
          }
          ?>
</select>
</div>
<!-- END TYPE -->

<div class="form-group col-md-6">
    <label>Beverage Type</label>
        <!-- END TITLE -->
    
    <select name="type" id="" class="form-control form-control-lg" onBlur="" required>
<option value='0'> Select Beverage Type </option>
<?php 
          ## Fetch amphures
          $query = $dbh->prepare("SELECT * FROM type ORDER BY id");
          $query->execute();
          $typeList = $query->fetchAll();

          foreach($typeList as $type){
             echo "<option value='".$type['id']."'>".$type['TypeName']."</option>";
          }
          ?>
</select>
</div>
<!-- END TYPE -->
<div class="col-md-12">
  <?php if($error){?><div class="alert alert-danger" role="alert" ><?php echo htmlentities($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button> </div><?php } 
				else if($msg){?><div class="alert alert-success" role="alert" ><?php echo htmlentities($msg); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div><?php }?>
</div>

<div class="col-md-12">                             
<button type="submit" name="add" class="create-account" > Submit </button>
</div>

    
        </div>
      </div>
    </div>
    </div>
  </form>

</body>
</html>

