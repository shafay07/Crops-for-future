<?php

//setting header to json
header('Content-Type: application/json');
// get the connection from conn.php
require_once('../conn.php');

// for datacompare
if(isset($_POST['cropA'], $_POST['cropB'])){
	$cropA = $_POST['cropA'];
	$cropB = $_POST['cropB'];

	$query = "SELECT * FROM `crop_taxonomy` 
	LEFT JOIN `agro_agroecology_livedb` ON `agro_agroecology_livedb`.`cropid` = `crop_taxonomy`.`cropID`
	LEFT JOIN `nutrient_minerals` ON `nutrient_minerals`.`cropid` = `crop_taxonomy`.`cropID`
	LEFT JOIN `nutrient_proximate_composition` ON `nutrient_proximate_composition`.`cropid` = `crop_taxonomy`.`cropID`
	WHERE `crop_taxonomy`.`name_var_lndrce` IN ('$cropA','$cropB');";
}

// for individual data
if(isset($_POST['crop'])){
	$crop = $_POST['crop'];

	$query = "SELECT * FROM `crop_taxonomy` 
	LEFT JOIN `agro_agroecology_livedb` ON `agro_agroecology_livedb`.`cropid` = `crop_taxonomy`.`cropID`
	LEFT JOIN `nutrient_minerals` ON `nutrient_minerals`.`cropid` = `crop_taxonomy`.`cropID`
	LEFT JOIN `nutrient_proximate_composition` ON `nutrient_proximate_composition`.`cropid` = `crop_taxonomy`.`cropID`
	LEFT JOIN `crop_usage` ON `crop_usage`.`cropID` = `crop_taxonomy`.`cropID`
	WHERE `crop_taxonomy`.`name_var_lndrce` = '$crop';";
}



//execute query
$result = $mysqli->query($query);
$data= array();

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);

?>