<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['alogin'])==0)
    {   
header('location:../loginadmin.php');
}
  
// code for block student    
if(isset($_GET['block']))
{
$memid=$_GET['block'];
$status=0;
$sql = "update member set Status=:status  WHERE id=:memid";
$query = $dbh->prepare($sql);
$query -> bindParam(':memid',$memid, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:shop-member.php');
}



//code for active member
if(isset($_GET['active']))
{
$memid=$_GET['active'];
$status=1;
$sql = "update member set Status=:status  WHERE id=:memid";
$query = $dbh->prepare($sql);
$query -> bindParam(':memid',$memid, PDO::PARAM_STR);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query -> execute();
header('location:shop-member.php');
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
            <h4 class="header-line" style="text-align:none; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;">Customer list &nbsp<i class="fas fa-user-check"></i>&nbsp&nbsp&nbsp<a href="member-address.php" style="color: black;">Customer address here</a></h4>  
    </div>

            <!-- Advanced Tables -->
            <div class="card-table">
                        <div class="panel-body" style="">
                            <div class="table-responsive">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Register date</th>
                                            <th>Last update profile</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT member.FirstName,member.LastName,member.EmailId,member.MobileNumber,member.Status,member.RegDate,member.updationDate,member.id as memid,member.Username as muname from member order by memid asc";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>                                      
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->FirstName);?></td>
                                             <td class="center"><?php echo htmlentities($result->LastName);?></td>
                                            <td class="center"><?php echo htmlentities($result->MobileNumber);?></td>
                                            <td class="center"><?php echo htmlentities($result->EmailId);?></td>
                                            <td class="center"><?php if($result->Status==1)
                                            { ?>
                                               <?php echo htmlentities("Active");?>&nbsp<i class="fa fa-check-circle-o" style="color: green"></i>
                                           <?php }   else { 
                                             echo htmlentities("Blocked"); ?>  <i class="fa fa-times-circle-o" style="color: red"></i>
                                            <?php }?> </td>
                                            <td class="center"><?php echo htmlentities($result->RegDate);?></td>
                                            <td class="center"><?php echo htmlentities($result->updationDate);?></td>
                                            <td class="center">
                                            <?php if($result->Status==1)
                                            {?>
                                            <a href="shop-member.php?block=<?php echo htmlentities($result->memid);?>" onclick="return confirm('Are you sure you want to block this customer?');"" >  <button class="btn btn-success" style="border-radius:15px;background-color: white;color: black"> Inactive</button>
                                            <?php } else {?>

                                            <a href="shop-member.php?active=<?php echo htmlentities($result->memid);?>" onclick="return confirm('Are you sure you want to active this customer?');""><button class="btn btn-success" style="border-radius:15px;background-color: #00A862;"> Active &nbsp<i class="fas fa-check-circle"></i></button> 
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
