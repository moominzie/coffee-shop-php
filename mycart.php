<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['checkout']))
{    
$username=$_SESSION['username'];  
$customername=$_POST['customername'];
$customerlname=$_POST['customerlname'];
$customertel=$_POST['customertel'];
$quantity=$_POST['quantity'];
$total=$_POST['total'];
$sql="update checkout set CustomerName=:customername,CustomerLname=:customerlname,CustomerTel=:customertel,Quantity=:quantity,Total=:total,Username=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':customername',$customername,PDO::PARAM_STR);
$query->bindParam(':customerlname',$customerlname,PDO::PARAM_STR);
$query->bindParam(':customertel',$customertel,PDO::PARAM_STR);
$query->bindParam(':quantity',$quantity,PDO::PARAM_STR);
$query->bindParam(':total',$total,PDO::PARAM_STR);
$query->execute();

header('location:checkout.php');
}

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from cart  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
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

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@900&display=swap" rel="stylesheet">


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

* {
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
.image-box {
    box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 1);
    position: static;
    margin: auto;
    overflow: hidden;
    width: 200px;
    height: 200px;
    border-radius: 5%;
    margin-top:10px;
    margin-bottom:20px;
    margin-left:10px;
}
.image-box img {
    max-width: 100%;
    transition: all 0.3s;
    display: block;
    width: 200px;
    height: 200px;
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

<body>
        <!------MENU SECTION START-->
        <?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>


    <div class="content-wrapper">
   <div class="container">
            <h4 class="header-line" style="text-align:none; font-family: 'Noto Sans JP', sans-serif; font-size: 22px;"><i class="fas fa-shopping-cart"></i>&nbsp My Cart </h4>
<?php if($_SESSION['msg']!="")
{?>

<div class="alert alert-success" role="alert" >
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close" onClick="emptyCart()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<script type="text/javascript">
function emptyCart() {
  <?php 
    $username=$_SESSION['username'];  
    $sql="DELETE FROM cart WHERE Username=:username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->execute();?>
}
</script>

<?php } ?>

<?php if($_SESSION['edit']!="")
{?>

<div class="alert alert-success" role="alert" >
 <?php echo htmlentities($_SESSION['edit']);?>
<?php echo htmlentities($_SESSION['edit']="");?>
&nbsp<a href="checkout.php" class="alert-link">Checkout order now</a>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php } ?>
<div class="row">

  <div class="col-md-6">
    <div class="">
      <div class="card-body">

      <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="display:none;">ID</th>
                                            <th style="display:none;">Product code</th>
                                            <th style="display:none;">Name</th>
                                            <th style="display:none;">Price</th>
                                            <th style="display:none;">Picture</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
$username=$_SESSION['username'];  
$sql="SELECT id,ProductCode,ProductName,ProductImage,ProductPrice,Quantity,TotalPrice,Username,ProductPrice*Quantity as Total FROM cart WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

                                        <tr class="odd gradeX">
                                            <td class="center" style="display:none;"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><div class="image-box"><img src="admin/uploads/img/<?php echo htmlentities($result->ProductImage);?>"></div></td>
                                            <td class="center">
                                                 <br>
                                                 <?php echo htmlentities($result->ProductCode);?>
                                                 <br><h4 class="" style="font-family: 'Noto Sans JP', sans-serif; font-size: 18px;"><?php echo htmlentities($result->ProductName);?> </h4>
                                                 <br><label>Price: </label> &nbsp<?php echo htmlentities($result->ProductPrice);?>  ฿ 
                                                 <br><label>Quantity: </label> &nbsp<?php echo htmlentities($result->Quantity);?>
                                                 <br><label>Total price: </label> &nbsp<?php echo htmlentities($result->Total);?>  ฿ 
                                                 <br><br><a href="mycart.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Are you sure you want to delete?');"" style="color:#585858;"><i class="fas fa-trash-alt"></i>&nbsp REMOVE ITEM</a> 
                                                 &nbsp<a href="edit-order.php?edit=<?php echo htmlentities($result->id);?>" style="color:#585858;"><i class="fas fa-edit"></i>&nbsp EDIT ITEM</a> 
                                            </td>
                                        </tr>


 <?php $cnt=$cnt+1;}} ?>                                      
                                    </tbody>
                                </table>
      </div>

      
    </div>
  </div>


  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
      <?php
$username=$_SESSION['username'];  
$sql="SELECT SUM(ProductPrice*Quantity) as Total,SUM(Quantity) as Quantity FROM cart WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">  
<div class="form-group">
<label>Product quantity : </label>
<?php echo htmlentities($result->Quantity);?> item
</div>
</div>             
<input class="form-control" type="hidden" name="quantity" value="<?php echo htmlentities($result->Quantity);?>" required autocomplete="off"  />

<div class="col-md-12">  
<div class="form-group">
<label>Total price : </label>
<?php echo htmlentities($result->Total);?> ฿ 
</div>
</div>             
<input class="form-control" type="hidden" name="total" value="<?php echo htmlentities($result->Total);?>" required autocomplete="off"  />


<?php }} ?> 

<?php if($_SESSION['msg']!="")
{?>

<div class="alert alert-success" role="alert" >
<?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
&nbsp<a href="checkout.php" class="alert-link">Checkout order here</a>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<?php } ?>

<form name="update" method="post">     


<?php
$username=$_SESSION['username'];  
$sql="SELECT * FROM member WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
             <input class="form-control" type="hidden" name="customername" value="<?php echo htmlentities($result->FirstName);?>" required autocomplete="off"  />
             <input class="form-control" type="hidden" name="customerlname" value="<?php echo htmlentities($result->LastName);?>" required autocomplete="off"  />
             <input class="form-control" type="hidden" name="customertel" value="<?php echo htmlentities($result->MobileNumber);?>" required autocomplete="off"  />
             <?php }} ?> 
             
             <?php
$username=$_SESSION['username'];  
$sql="SELECT ProductPrice*Quantity as Total,SUM(Quantity) as Quantity,Username,SUM(ProductPrice*Quantity) as ProductSum FROM cart WHERE Username=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
            <input class="form-control" type="hidden" name="quantity" value="<?php echo htmlentities($result->Quantity);?>" required autocomplete="off"  />
             <input class="form-control" type="hidden" name="total" value="<?php echo htmlentities($result->ProductSum);?>" required autocomplete="off"  />
             <?php }} ?>
             <input class="form-control" type="hidden" name="username" value="<?php echo htmlentities($result->Username);?>" required autocomplete="off"  />
  
             <a href=""><button name="checkout" type="submit" class="create-account" style="margin-left:220px;margin-bottom:10px;" > Checkout! </button></a>&nbsp&nbsp&nbsp<a href="checkout.php" style="color: black;">Continue checkout here</a>
             
</form>




      </div>
    </div>
  </div>
</div>

</div>

</div>

      <!------MENU SECTION START-->
      <?php include('includes/footer.php');?>
<!-- MENU SECTION END-->

<?php } ?>
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


