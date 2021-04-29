<?php 
session_start();
include('includes/connection.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
    {   
header('location:loginmember.php');
}
else{ 
if(isset($_POST['updateadd']))
{    
$username=$_SESSION['username'];  
$address=$_POST['address'];
$amphure=$_POST['amphure'];
$district=$_POST['district'];
$province=$_POST['province'];
$postalcode=$_POST['postalcode'];
$sql="update address set Address=:address,ProvinceId=:province,AmphureId=:amphure,DistrictId=:district,PostalCode=:postalcode where Username=:username";
$query = $dbh->prepare($sql);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':amphure',$amphure,PDO::PARAM_STR);
$query->bindParam(':district',$district,PDO::PARAM_STR);
$query->bindParam(':province',$province,PDO::PARAM_STR);
$query->bindParam(':postalcode',$postalcode,PDO::PARAM_STR);

$query->execute();

header('location:checkout.php');
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

</head>

<style>

.card-data {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width:700px;
            margin: auto;
            text-align: none;
            align: center;
            border-radius: 15px;
            border: 0px solid white;
            margin-bottom: 50px;
          }
</style>

<body>


    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Change address</h4>
                
                            </div>

        </div>
             <div class="row">
           
<div class="col-md-12">
               <div class="card-data">
               <div class="panel-body">

               <form action="" method="post" role="form" enctype="multipart/form-data">
<div class="col-md-12">
<div class="form-group">
<label>Address</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<textarea class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Address);?>"  autocomplete="off" required><?php echo htmlentities($result->Address);?></textarea>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>District</label>
<select name="district" id="district_id" class="form-control form-control-lg">
<option value='0'> Select district</option>
</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Amphures</label>
<select name="amphure" id="amphure_id" class="form-control form-control-lg">
<option value='0'> Select amphure </option>
</select>
</div>
</div>

<div class="col-md-3">
<div class="form-group">
<label>Provine</label>
<label>Province</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
        <!-- END TITLE -->
    
    <select name="province" id="province_id" class="form-control form-control-lg" onBlur="getAmphure()" required>
<option value='0'> Select province </option>
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



<div class="col-md-3">
<div class="form-group">
<label>Postal code</label>
<input class="form-control" type="text" name="postalcode" id="" value="<?php echo htmlentities($result->PostalCode);?>" maxlength="5" autocomplete="off" required />
</div>
</div>

<div class="col-md-12">                             
<button type="submit" name="updateadd" class="create-account" >Update address </button>
</div>
</form>
<?php } ?>
</div>
</div>
</div>
</div>
    </div>
    </div>
     <!------MENU SECTION START-->
     <?php include('includes/footer.php');?>
<!-- MENU SECTION END-->
     <!-- CONTENT-WRAPPER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>


    
</body>
</html>
