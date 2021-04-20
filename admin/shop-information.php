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
$sname=$_POST['shopname'];
$address=$_POST['address'];
$mobileno=$_POST['mobileno'];
$email=$_POST['shopemail'];
$logo=$_FILES["img1"]["name"];

move_uploaded_file($_FILES["img1"]["tmp_name"],"uploads/logo/".$_FILES["img1"]["name"]);

$sql="update shop set ShopName=:sname,Address=:address,MobileNumber=:mobileno,ShopEmail=:email,Logo=:logo";
$query = $dbh->prepare($sql);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':logo',$logo,PDO::PARAM_STR);
$query->execute();
$msg="Your Shop information has been update";
}
?>
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
<h4 class="header-line">Edit shop information</h4> 
<form name="update" method="post" enctype="multipart/form-data">
<?php
$sql="SELECT ShopName,Address,MobileNumber,ShopEmail,Logo from  shop  ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">
<div class="form-group">
<label>Name : </label>
<?php echo htmlentities($result->ShopName);?>
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Address : </label>
<?php echo htmlentities($result->Address);?>
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Mobile Number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Email : </label>
<?php echo htmlentities($result->ShopEmail);?>
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Enter Shop Name</label>
<input class="form-control" type="text" name="shopname" id="" value="<?php echo htmlentities($result->ShopName);?>"  autocomplete="off" required />
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Enter Shop Address</label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Address);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Enter Shop Mobile</label>
<input class="form-control" type="text" name="mobileno" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />
</div></div>

<div class="col-md-12">
<div class="form-group">
<label>Enter Shop Email</label>
<input class="form-control" type="text" name="shopemail" value="<?php echo htmlentities($result->ShopEmail);?>" autocomplete="off" required />
</div></div>

<div class="col-md-12">
<div class="form-group">
<img src="uploads/logo/<?php echo htmlentities($result->Logo);?>" width="100" height="100" >
    </div></div>

    <div class="col-md-12">
<div class="form-group">
        <label>Picture</label>&nbsp;<label for="" style="color: red;">* Please use image scale 100x100 px. </label>
        <input class="form-control" type="file" name="img1" autocomplete="off" required />
        </div>    </div>

<?php }} ?>
                              
<div class="col-md-12">
  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
</div>

<div class="col-md-6">
    <button type="submit" name="update" class="create-account" id="submit" > Update shop </button>&nbsp&nbsp&nbsp<a href="add-admin.php" style="color: black;">New staff here</a>
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
<?php } ?>
