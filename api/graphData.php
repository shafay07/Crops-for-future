<?php

//setting header to json
header('Content-Type: application/json');

// get the connection from conn.php
require_once('../conn.php');

//array of checkbox ticked
$climatearray = array();
$zonearray = array();
$partarray = array();

if(isset($_POST['climate'])) 
{
	$name = $_POST['climate'];
	if (is_array($name) || is_object($name)){
		foreach ($name as $climate)
		{
			$climatearray[] = $climate;

		}
	}
}

if(isset($_POST['zone'])) 
{
	$name = ($_POST['zone']);
	if (is_array($name) || is_object($name)){
		foreach ($name as $zone)
		{
			$zonearray[] = $zone;
		}
	}
}

if(isset($_POST['part'])) 
{
	$name = $_POST['part'];
	if (is_array($name) || is_object($name)){
		foreach ($name as $part)
		{
			$partarray[] = $part;
		}
  }
}


		
//x and y axis
$xAxis = $_POST['xAxis'];
$yAxis = $_POST['yAxis'];
$zAxis = $_POST['zAxis'];


//choosing table based on axis category
$xCat = $_POST['xCat'];
$yCat = $_POST['yCat'];
$zCat = $_POST['zCat'];


//query portion of checkboxes, to integrate with axis query part
if(count($climatearray))
{
	$climatequery =" AND agro.climate_zone LIKE '%" . implode("%' OR '%", $climatearray) . "%'";
}
if(count($zonearray))
{
	$zonequery =" AND agro." . implode("=1 AND agro.", $zonearray) . "=1";
}
if(count($partarray))
{
	$partquery =" AND mineral.plant_part_id IN ('" . implode("', '", $partarray)."') ";
}

//sql query based on checkbox	
if ($zAxis == "null"){
	$query = "SELECT tax.cropID, tax.common_name, $xCat.$xAxis, $yCat.$yAxis
	FROM crop_taxonomy tax LEFT JOIN agro_agroecology_livedb agro ON tax.cropID=agro.cropid
	LEFT JOIN nutrient_minerals mineral ON tax.cropID=mineral.cropid 
	LEFT JOIN general_plant_parts part ON mineral.plant_part_id=part.id
	LEFT JOIN nutrient_proximate_composition composition ON tax.cropID=composition.cropid
	WHERE $xAxis IS NOT NULL AND $yAxis IS NOT NULL";
}else {
	$query = "SELECT tax.cropID, tax.common_name, $xCat.$xAxis, $yCat.$yAxis, $zCat.$zAxis
		FROM crop_taxonomy tax LEFT JOIN agro_agroecology_livedb agro ON tax.cropID=agro.cropid
		LEFT JOIN nutrient_minerals mineral ON tax.cropID=mineral.cropid
		LEFT JOIN general_plant_parts part ON mineral.plant_part_id=part.id
		LEFT JOIN nutrient_proximate_composition composition ON tax.cropID=composition.cropid
		WHERE $xAxis IS NOT NULL AND $yAxis IS NOT NULL AND $zAxis IS NOT NULL";
}

if(count($partarray))
	$query .= $partquery;
if(count($climatearray))
	$query .= $climatequery;
if(count($zonearray))
	$query .= $zonequery;

//print results here and convert to json format	
$result = mysqli_query($mysqli,$query);
$jsonArray = array();
if(!$result) {
    die("Database query failed");
}
else{
	//echo "<br><br>Database query success!<br>";
	if ($zAxis == "null"){
		while($row = mysqli_fetch_array($result))
		{
			$jsonArray[] = array(
				'cropid'	=> $row[0],
				'cropname'	=> $row[1],
				'xcat'		=> $xCat,
				'xaxis'		=> $xAxis,
				'xvalue'	=> $row[2],
				'ycat'		=> $yCat,
				'yaxis'		=> $yAxis,
				'yvalue'	=> $row[3]
			);
		}
	}else {
		while($row = mysqli_fetch_array($result))
		{
			$jsonArray[] = array(
				'cropid'	=> $row[0],
				'cropname'	=> $row[1],
				'xcat'		=> $xCat,
				'xaxis'		=> $xAxis,
				'xvalue'	=> $row[2],
				'ycat'		=> $yCat,
				'yaxis'		=> $yAxis,
				'yvalue'	=> $row[3],
				'zcat'		=> $zCat,
				'zaxis'		=> $zAxis,
				'zvalue'	=> $row[4]
			);
		}
	}

	print json_encode($jsonArray);
}


mysqli_close($mysqli);


?>
