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
$username=$_SESSION['username'];  
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$mobileno=$_POST['mobileno'];

$sql="update employee set FirstName=:fname,LastName=:lname,MobileNumber=:mobileno where UserName=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();
    $msg="Update your Admin profile successfully";
 
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
<h4 class="header-line">Edit your profile</h4>        
<form name="update" method="post">
<?php 
$username=$_SESSION['username'];
$sql="SELECT UserName,AdminEmail,FirstName,LastName,MobileNumber from  employee  where UserName=:username";
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
<label>Username : </label>
<?php echo htmlentities($result->UserName);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Full Name : </label>
<?php echo htmlentities($result->FirstName);?>&nbsp<?php echo htmlentities($result->LastName);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Mobile Number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Email : </label>
<?php echo htmlentities($result->AdminEmail);?>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Enter First Name</label>
<input class="form-control" type="text" name="firstname" id="" value="<?php echo htmlentities($result->FirstName);?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Enter Last Name</label>
<input class="form-control" type="text" name="lastname" id="" value="<?php echo htmlentities($result->LastName);?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Enter Mobile Number</label>
<input class="form-control" type="text" name="mobileno" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required  />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>Enter Email</label>
<input class="form-control" type="email" name="adminemail" value="<?php echo htmlentities($result->AdminEmail);?>" autocomplete="off" required readonly />
</div>
</div>

<?php }} ?>
<div class="col-md-12">
  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
</div>

<div class="col-md-6">
    <button type="submit" name="update" class="create-account" id="submit" > Update profile </button>&nbsp&nbsp&nbsp<a href="change-password.php" style="color: black;">Change password here</a>
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
