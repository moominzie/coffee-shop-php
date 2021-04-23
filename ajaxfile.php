<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/8.4.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="/__/firebase/8.4.1/firebase-analytics.js"></script>

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>

<?php 
include "includes/connection.php";

$request = 0;

if(isset($_POST['request'])){
	$request = $_POST['request'];
}

// Fetch amphure list by provinceid
if($request == 1){
	$provinceid = $_POST['provinceid'];

	$query = $dbh->prepare("SELECT * FROM amphures WHERE province_id=:province ORDER BY name_en");
	$query->bindValue(':province', (int)$provinceid, PDO::PARAM_INT);

	$query->execute();
	$amphureList = $query->fetchAll();

	$response = array();
	foreach($amphureList as $amphure){
		$response[] = array(
				"id" => $amphure['id'],
				"name_en" => $amphure['name_en']
			);
	}

	echo json_encode($response);
	exit;
}

// Fetch district list by amphureid
if($request == 2){
	$amphureid = $_POST['amphureid'];

	$query = $dbh->prepare("SELECT * FROM districts WHERE amphure_id=:amphure ORDER BY name_en");
	$query->bindValue(':amphure', (int)$amphureid, PDO::PARAM_INT);

	$query->execute();
	$districtList = $query->fetchAll();

	$response = array();
	foreach($districtList as $amphure){
		$response[] = array(
				"id" => $amphure['id'],
				"name_en" => $amphure['name_en'],
			);
	}

	echo json_encode($response);
	exit;
}




// Fetch district list by districtid
if($request == 0){
	$districtid = $_POST['districtid'];

	$query = $dbh->prepare("SELECT * FROM districts WHERE zip_code=:zipcode ORDER BY zip_code");
	$query->bindValue(':zipcode', (int)$districtid, PDO::PARAM_INT);

	$query->execute();
	$zipList = $query->fetchAll();

	$response = array();
	foreach($zipList as $zip){
		$response[] = array(
				"id" => $zip['id'],
				"zip_code" => $zip['zip_code'],
			);
	}

	echo json_encode($response);
	exit;
}




