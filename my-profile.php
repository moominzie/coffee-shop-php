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
$compro="Your profile has been updated";
}

?>
  <form name="update" method="post">
<?php 
$username=$_SESSION['username'];
$sql="SELECT * from  member  where UserName=:username";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-6">

<div class="form-group">
First name
<input class="form-control" type="text" name="firstname" value="<?php echo htmlentities($result->FirstName);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
Last name
<input class="form-control" type="text" name="lastname" value="<?php echo htmlentities($result->LastName);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-6">
<div class="form-group">
Mobile number
<input class="form-control" type="text" name="mobileno" maxlength="10" value="<?php echo htmlentities($result->MobileNumber);?>" autocomplete="off" required />
</div>
</div>

<div class="col-md-3">
<div class="form-group">
Your email
<input class="form-control" type="email" name="email" id="emailid" value="<?php echo htmlentities($result->EmailId);?>"  autocomplete="off" required readonly />

</div>
</div>
<div class="col-md-3">
<div class="form-group">
Username
<input class="form-control" type="email" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />
</div>
</div>

<?php }} ?>


<div class="col-md-12">
    <button type="submit" name="update" class="create-account" id="submit" > Update profile </button>
</div>
</form>
 
    
<?php } ?>


