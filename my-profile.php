<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['update']))
{    
$username=$_SESSION['username'];  
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$mobileno=$_POST['mobileno'];

$sql="update member set FirstName=:fname,LastName=:lname,MobileNumber=:mobileno where Username=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':lname',$lname,PDO::PARAM_STR);
$query->bindParam(':mobileno',$mobileno,PDO::PARAM_STR);
$query->execute();
$msg="Your profile has been updated";
}

?>
<body>
<h4 class="header-line">Edit your profile</h4>
<form name="update" method="post">


<?php 
$username=$_SESSION['username'];
$sql="SELECT id,Username,FirstName,LastName,EmailId,MobileNumber,RegDate,UpdationDate,Status from  member  where Username=:username ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  



<div class="col-md-5">
<?php  if($msg)
{?>

    <div class="alert alert-success" role="alert" >
 <?php echo htmlentities($msg);?>
<?php echo htmlentities($msg="");?>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php } ?>
<div class="form-group">
Username
<input class="form-control" type="text" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />
</div>


<div class="form-group">
First name
<input class="form-control" type="text" name="firstname" value="<?php echo htmlentities($result->FirstName);?>" autocomplete="off" required />
</div>

<div class="form-group">
Last name
<input class="form-control" type="text" name="lastname" value="<?php echo htmlentities($result->LastName);?>" autocomplete="off" required />
</div>


<div class="form-group">
Mobile number
<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />

<div class="form-group">
Your email
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />
</div>
                          
</div>
</div>

<?php }} ?>

<div class="col-md-12">                             
<button type="submit" name="update" class="create-account" >Update profile </button>
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
