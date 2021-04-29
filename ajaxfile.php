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




