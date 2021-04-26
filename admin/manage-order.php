<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../loginadmin.php');
}
if(isset($_GET['delivery']))
{
$cid=$_GET['delivery'];
$sql="delete from cart where id=:cid";
$query = $dbh->prepare($sql);
$query->bindParam(':cid',$cid,PDO::PARAM_STR);
$query->execute();

$_SESSION['msg']="Update process successfully";
header('location:manage-order.php');
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
<style>
    </style>

<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="container">
    <div class="row pad-botm">
            <div class="col-md-12">
            <h4 class="header-line" style="text-align:none; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;">Manage order &nbsp&nbsp&nbsp<a href="order.php" style="color: black;">Billing history &nbsp<i class="fas fa-file-invoice-dollar"></i></a></h4>
    </div>
    <?php if($_SESSION['msg']!="")
{?>

<div class="alert alert-success" role="alert" >
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
            <!-- Advanced Tables -->
            <div class="card-table">
                        <div class="panel-body" style="">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>
                                            <th>Product code</th>
                                            <th>Product</th>
                                            <th>Image</th>
                                            <th>Total</th>
                                            <th>Quantity</th>
                                            <th>Username</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql="SELECT cart.id as cid,cart.Status as Status,ProductCode,ProductName,ProductImage,ProductPrice*Quantity as Total,Quantity,member.Username,member.id as mid FROM cart join member on member.Username=cart.Username";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                     
                                        <tr class="odd gradeX">
                                             <td class="center" style="display:none;"><?php echo htmlentities($cnt);?></td>
                                             <td class="center"><?php echo htmlentities($result->ProductCode);?></td>
                                             <td class="center"><?php echo htmlentities($result->ProductName);?></td>
                                             <td class="center"><img src="uploads/img/<?php echo htmlentities($result->ProductImage);?>" width="100" height="100" style="border-radius:10px;"></td>
                                             <td class="center"><?php echo htmlentities($result->Total);?></td>
                                             <td class="center"><?php echo htmlentities($result->Quantity);?></td>
                                             <td class="center"><a style="color:black;" href="view-user.php?mid=<?php echo htmlentities($result->mid);?>"><?php echo htmlentities($result->Username);?></a></td>
                                             <td class="center">
                                             <?php if($result->Status==2) {?>
                                            <a class="btn btn-success" style="border-radius:15px;background-color: #00A862; color:white;">Customer confirmed</a>
                                            <?php } else if($result->Status==1)  {?>
                                            <a class="btn btn-warning" style="border-radius:15px;background-color: white;color: black">Waiting confirmation</a>
                                            <?php } ?>
                                            </td>
                                            <td class="center">
                                            <?php if($result->Status==2) {?>
                                                <a style="color: #006400;" href="manage-order.php?delivery=<?php echo htmlentities($result->cid);?>" onclick="return confirm('Confirm delivery?');""><button class="btn btn-success" style="border-radius:15px;background-color: white;color:black;"> Delivery now</button> </td>
                                            <?php } else if($result->Status==1)  {?>
                                                <a style="color: #006400;"><button class="btn btn-success" style="border-radius:15px;background-color: white;color:black;" disabled> Delivery now</button> </td>
                                            <?php } ?>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
                                </div>
                            </div>
                            
                
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>


            
    </div>


     <!-- CONTENT-WRAPPER SECTION END-->

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
