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

$msg="Your address has been updated";
}

?>
<body>
<form name="update" method="post" id="editaddress">
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


<?php }} ?>
<!-- END DISTRICT -->

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

<?php }} ?>
<!-- END AMPHURE -->


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

<?php }} ?>
<!-- END PROVINCE -->

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


<div class="invisible">  
<input class="form-control" type="text" name="username" id="" value="<?php echo htmlentities($result->Username);?>"  autocomplete="off" required readonly />
</div>

<div class="col-md-12">    
<div class="form-group">
<label>Address</label>
<input class="form-control" type="text" name="address" id="" value="<?php echo htmlentities($result->Address);?>"  autocomplete="off" required />
</div>
</div>

<div class="col-md-4">    
<div class="form-group">
<label>Province</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="province" id="province_id" class="form-control form-control-lg" onBlur="getAmphure()" required>
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
<label>Amphure</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="amphure" id="amphure_id" class="form-control form-control-lg" required>
<option value='0'> Select Amphure </option>

</select>
</div>

<div class="form-group col-md-4">
<label>District</label>&nbsp;<label for="" style="font-family: 'Oswald', sans-serif; color: red;">* </label>
<select name="district" id="district_id" class="form-control form-control-lg" required>
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
<label>Zip/Postal code</label>
<input class="form-control" type="text" name="postalcode" id="" value="<?php echo htmlentities($result->PostalCode);?>"  autocomplete="off" required />
</div>
</div>


<?php }} ?>
<?php }} ?>


<div class="col-md-12">                             
<button type="submit" name="updateadd" class="create-account" >Update address </button>
</div>



</form>

<?php } ?>
</body>
