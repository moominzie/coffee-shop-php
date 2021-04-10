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
$address=$_POST['address'];
$amphure=$_POST['amphure'];
$district=$_POST['district'];
$province=$_POST['province'];
$postalcode=$_POST['postalcode'];
$type=1;
$sql="update address set Address=:address,ProvinceId=:province,AmphureId=:amphure,DistrictId=:district,PostalCode=:postalcode where Username=:username and TypeAddress=:type";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':amphure',$amphure,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':province',$province,PDO::PARAM_STR);
$query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);

$query->execute();

echo '<script>alert("Your profile has been updated")</script>';
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
        <title>Coffee Shop | Coffee Store</title>

        <script type="text/javascript" src='includes/jquery-3.4.1.min.js'></script>

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
<body>
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Address</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           Current Address
                        </div>
                        <div class="panel-body">
                            <form name="update" method="post">
<?php 
$username=$_SESSION['username'];
$type=1;
$sql="SELECT id,Address,Username,AmphureId,ProvinceId,DistrictId,PostalCode,TypeAddress from  address  where Username=:username and TypeAddress=:type";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Username: </label>
<?php echo htmlentities($result->Username);?>
</div>
</div>

<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Address: </label>
<?php echo htmlentities($result->Address);?>
</div>
</div>

<?php
$type=1;
$sql="SELECT provinces.name_en from  address  join provinces on provinces.id=address.ProvinceId where address.TypeAddress in (1) group by address.TypeAddress ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-4">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Province: </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END PROVINCE -->

<?php 
$type=1;
$sql="SELECT amphures.name_en from  address  join amphures on amphures.id=address.AmphureId where address.TypeAddress in (1) group by address.TypeAddress ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-4">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Amphure: </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END AMPHURE -->

<?php 
$type=1;
$sql="SELECT districts.name_en from  address  join districts on districts.id=address.DistrictId where address.TypeAddress in (1) group by address.TypeAddress ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-4">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">District: </label>
<?php echo htmlentities($result->name_en);?>
</div>
</div>
<?php }} ?>
<!-- END DISTRICT -->

<?php 
$type=1;
$sql = "SELECT PostalCode FROM address WHERE Username=:username and TypeAddress=:type";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>    
<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Zip/PostalCode: </label>
<?php echo htmlentities($result->PostalCode);?>
</div>
</div>
<?php }} ?>
<!-- END AMPHURE -->

<!-- START FORM -->
<?php 
$type=1;
$sql="SELECT id,Address,Username,AmphureId,ProvinceId,DistrictId,PostalCode,TypeAddress from  address  where Username=:username and TypeAddress=:type ";
$query = $dbh -> prepare($sql);
$query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':type', $type, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  

<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Username: </label>
<input class="form-control" type="text" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />

</div>
</div>

<div class="col-md-12">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Address: </label>
<input class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Address);?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-4">    
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Province: </label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="province" id="province_id" class="form-control" onBlur="getAmphure()" required>
<option value='0'> Select Province </option>
<?php 
          ## Fetch amphures
          $query = $dbh->prepare("SELECT * FROM provinces ORDER BY name_en");
          $query->execute();
          $provinceList = $query->fetchAll();

          foreach($provinceList as $province){
             echo "<option value='".$province['id']."'>".$province['name_en']."</option>";
          }
          ?>
</select>
</div>
</div>

<div class="form-group col-md-4">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Amphure</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="amphure" id="amphure_id" class="form-control">
<option value='0'> Select Amphure </option>

</select>
</div>

<div class="form-group col-md-4">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">District</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="district" id="district_id" class="form-control">
<option value='0'> Select District</option>

</select>
</div>


	<!-- Script -->
	<script type="text/javascript">
	$(document).ready(function(){

		// Province
		$('#province_id').change(function(){

			var provinceid = $(this).val();
			
			// Empty state and city dropdown
			$('#amphure_id').find('option').not(':first').remove();
			$('#district_id').find('option').not(':first').remove();

			// AJAX request
			$.ajax({
				url: 'ajaxfile.php',
				type: 'post',
				data: {request: 1, provinceid: provinceid},
				dataType: 'json',
				success: function(response){
					
					var len = response.length;

		            for( var i = 0; i<len; i++){
		                var id = response[i]['id'];
		                var name_en = response[i]['name_en'];
		                    
		                $("#amphure_id").append("<option value='"+id+"'>"+name_en+"</option>");

		            }
				}
			});
			
		});


		// Amphure
		$('#amphure_id').change(function(){
			var amphureid = $(this).val();
			
			// Empty district dropdown
			$('#district_id').find('option').not(':first').remove();

			// AJAX request
			$.ajax({
				url: 'ajaxfile.php',
				type: 'post',
				data: {request: 2, amphureid: amphureid},
				dataType: 'json',
				success: function(response){
					
					var len = response.length;

		            for( var i = 0; i<len; i++){
		                var id = response[i]['id'];
		                var name_en = response[i]['name_en'];
		                    
		                $("#district_id").append("<option value='"+id+"'>"+name_en+"</option>");

		            }
				}
			});
		});
	});
	</script>

<div class="col-md-4">
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Zip/Postal Code</label>
<input class="form-control" type="text" name="postalcode" id="" value="<?php echo htmlentities($result->PostalCode);?>"  autocomplete="off" required />
</div>
</div>


<?php }} ?>
<?php }} ?>

<div class="col-md-12">                             
<button type="submit" name="update" class="btn btn-primary" style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;" >Update Now </button>
</div>
</form>
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
