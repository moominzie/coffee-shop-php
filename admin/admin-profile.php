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

<h4 class="header-line"><?php echo htmlentities($result->FirstName);?>&nbsp<?php echo htmlentities($result->LastName);?></h4>
<div class="col-md-12">
<div class="form-group">
<label><i class="fas fa-user-alt"></i>&nbsp Username : </label>
<?php echo htmlentities($result->UserName);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label>Name-Surname : </label>
<?php echo htmlentities($result->FirstName);?>&nbsp<?php echo htmlentities($result->LastName);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label><i class="fas fa-phone"></i>&nbspMobile number : </label>
<?php echo htmlentities($result->MobileNumber);?>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label><i class="fas fa-envelope"></i>&nbspEmail : </label>
<?php echo htmlentities($result->AdminEmail);?>
</div>
</div>
<?php }} ?>

<div class="col-md-5">
  <?php if($error){?><div class="errorWrap"> <?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="alert alert-success" role="alert" > <?php echo htmlentities($msg); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div><?php }?>
</div>

<div class="col-md-12">                    
<button class="create-account" data-toggle="collapse" href="#editprofile" role="button" aria-expanded="false" aria-controls="editprofile">
    Edit profile
    </button>&nbsp&nbsp&nbsp<a href="change-password.php" style="color: black;">Change password here</a>
</div>

  <div class="collapse" id="editprofile">
  <div class="">
      <!------MENU SECTION START-->
	  <?php include('edit-profile.php');?>
  </div>
</div>
                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
    </div>
</div>
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
<?php } ?>
