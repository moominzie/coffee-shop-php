<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../loginadmin.php');
}
else{ 
if(isset($_POST['update']))
{


$images=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/banner/".$_FILES["img1"]["name"]);
$sql="update bevbanner set Images=:images";
$query = $dbh->prepare($sql);
$query->bindParam(':images',$images,PDO::PARAM_STR);
$query->execute();

$msg="Banner updated successfully";
}


  
  
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
    </style>
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Edit Banner</h4>
                
                            </div>

        </div>
        
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>


             <div class="row">
           
<div class="col-xl-9">
               <div class="panel panel-primary">
                        <div class="panel-heading" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px; font-size: 16px;">
                           Promotion 1
                        </div>
                        <div class="panel-body">

<form name="update" method="post" enctype="multipart/form-data">
<?php 

$sql = "SELECT Images from bevbanner";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">
<div class="form-group">
<img src="uploads/banner/<?php echo htmlentities($result->Images);?>" width="970" height="250" style="border:solid 1px #000">
</div>
</div>
<?php }} ?>

<div class="col-md-8">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Upload new beverage banner</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>&nbsp;<label for="" style="font-family: 'Montserrat', sans-serif; font-size:14px; color: #B03A2E"> Please use picture scale 970x250 px. </label>
        <input class="form-control" type="file" name="img1" autocomplete="off" required />
    </div>
    </div>
											

<div class="col-md-12">                   
<button type="submit" name="update" class="btn btn-danger" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px;"> Upload </button> | <a href="edit-food-banner.php" style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px; color: #BB8FCE" > Edit Promotion Banner 2</a> | <a href="edit-bread-banner.php" style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px; color: #BB8FCE" >Edit Promotion Banner 3</a>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>


     <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
