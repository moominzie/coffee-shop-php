<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['add']))
{    
$username=$_SESSION['username'];  
$address=$_POST['address'];
$amphure=$_POST['amphure'];
$district=$_POST['district'];
$province=$_POST['province'];
$postalcode=$_POST['postalcode'];
$type=$_POST['type'];
$sql="INSERT INTO  address (Address,ProvinceId,AmphureId,DistrictId,PostalCode,Username,TypeAddress) VALUES(:address,:province,:amphure,:district,:postalcode,:username,:type)";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':amphure',$amphure,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':province',$province,PDO::PARAM_STR);
$query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);
$query->bindParam(':type',$type,PDO::PARAM_STR);
$query->execute();

echo '<script>alert("Your address has been added")</script>';
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
<script>
function getAmphure() {
    $("#loaderIcon").show();
        jQuery.ajax({
            url: "get_amphure.php",
            data:'province_id='+$("#province_id").val(),
            type: "POST",
        success:function(data){
            $("#get_amphure_name").html(data);
            $("#loaderIcon").hide();
            },
        error:function (){}
    });
}

</script>

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
                           Add Address
                        </div>
                        <div class="panel-body">
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
<?php } ?>

<div class="col-md-12">
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Username</label>
<input class="form-control" type="text" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Address</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="email" name="address" id="" value=""  autocomplete="off" required></textarea>
</div>
</div>

  <!-- START TITLE -->     
  
<div class="form-group col-md-4">
    <label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Province</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <!-- END TITLE -->
    
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
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Zip/Postal Code</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<input class="form-control" type="text" name="postalcode" id="" value=""  autocomplete="off" required />
</div>
</div>

  <!-- START TITLE -->        
<div class="col-md-8">  
<div class="form-group">
<label style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;">Address Type</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* Please select 'Delivery Address' if you have already added your current address. </label>
        <!-- END TITLE -->
    <!-- START SELECT CM FORM ID TITLE -->
<select class="form-control" name="type" id="" required>
<option value=""> Select </option>
<?php $ret="select id,TypeAddress from adstype";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->TypeAddress);?></option>
<?php }} ?>
</select>
</div>
</div>
 <!-- END SELECT PROBLEM TITLE -->
<?php }} ?>

<div class="col-md-12">                             
<button type="submit" name="add" class="btn btn-primary" style="font-family: 'Staatliches', cursive; letter-spacing: 1px; font-size:14px;" >Add Address </button> | <a href="my-address.php" style="font-family: 'Staatliches', cursive; color: red">Edit your Current Address please click here!!</a>
</div>
</form>
</div>
</div>
</div>
</div>
    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


    
</body>
</html>
