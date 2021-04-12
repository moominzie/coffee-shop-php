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
$price=$_POST['price'];
$category=$_POST['category'];
$subcategory=$_POST['subcategory'];
$image1=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/img/".$_FILES["img1"]["name"]);


$sql="INSERT INTO menu(MenuName,Price,Image1,CategoryId,SubCategoryId) VALUES(:menuname,:price,:image1,:category,:subcategory)";
$query = $dbh->prepare($sql);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':menuname',$menuname,PDO::PARAM_STR);
$query->bindParam(':image1',$image1,PDO::PARAM_STR);
$query->bindParam(':category',$category,PDO::PARAM_STR);
$query->bindParam(':subcategory',$subcategory,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $msg="Add the new Menu successfully";
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

       <!-- BOOTSTRAP CORE STYLE  -->
       <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


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
                <h4 class="header-line">Add Menu</h4>
                            </div>
        </div>
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

    <div class="panel panel-primary" style="margin-left:20%; margin-right:20%">
    
        <div class="panel-heading" style="font-size: 16px;">Menu</div>
        <div class="panel-body" style="">
 
 <div class="col-md-8">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Menu Name</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <input class="form-control" type="text" name="menuname" autocomplete="off" required />
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Menu Price</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <input class="form-control" type="number" name="price" autocomplete="off" required />
    </div>
    </div>

    <div class="col-md-4">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Picture</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <input class="form-control" type="file" name="img1" autocomplete="off" required />
    </div>
    </div>

    <div class="form-group col-md-4">
    <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Category</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <!-- END TITLE -->
    
    <select name="category" id="" class="form-control" onBlur="" required>
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

<div class="form-group col-md-4">
    <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Sub-Category</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <!-- END TITLE -->
    
    <select name="subcategory" id="" class="form-control" onBlur="" required>
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
<!-- END CATEGORY -->

<div class="col-md-12">
    <button type="submit" name="add" class="btn btn-danger" id="add" style="font-family: 'Staatliches', cursive; letter-spacing: 1px;"> Add Menu </button>
    </div>

    
        </div>
      </div>
    </div>
    </div>
  </form>

</body>
</html>

