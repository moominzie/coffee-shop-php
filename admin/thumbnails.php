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
$name=$_POST['name'];
$images=$_FILES["img1"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/thumbnails/".$_FILES["img1"]["name"]);

$sql="INSERT INTO thumbnail (Name,Images) VALUES(:name,:images)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':images',$images,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
  $msg="Add the new Thumbnail successfully";
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

<!--REGISTER PANEL START-->      
<form action="" method="post" enctype="multipart/form-data" onSubmit="return valid();" name="signup">
<div class="content-wrapper">
   <div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Thumbnail</h4>
                            </div>
        </div>
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

    <div class="panel panel-primary" style="margin-left:20%; margin-right:20%">
    
        <div class="panel-heading" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px; font-size: 16px;">Thumbnail</div>
        <div class="panel-body" style="">
 
        <div class="col-md-12">
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Enter Thumbnail Name</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <input class="form-control" type="text" name="name" autocomplete="off" required />
    </div>
   

       
    <div class="form-group">
        <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Picture</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <input class="form-control" type="file" name="img1" autocomplete="off" required />
    </div>
   

    <button type="submit" name="add" class="btn btn-danger" id="add" style="font-family: 'Montserrat', sans-serif; letter-spacing: 1px;"> Add Thumbnail</button>
    </div>
  

    
        </div>
      </div>
    </div>
    </div>
  </form>
</body>
</html>

