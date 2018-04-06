<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$dbname = 'cff';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//setting header to json
header('Content-Type: application/json');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	//array of checkbox ticked
	$climatearray = array();
	$zonearray = array();
	$partarray = array();

	
	//checkbox options
    if(isset($_POST['climate'])) 
	{
		$name = json_decode($_POST['climate'], true);
		echo "name of climete " . $name;
		echo "You chose the following climate(s): <br>";
		foreach ($name as $climate)
		{
			echo $climate."<br />";
			$climatearray[] = $climate;
			
		}
	}
	if(isset($_POST['zone'])) 
	{

		$name = json_decode($_POST['zone'], true);
		echo "You chose the following zone(s): <br>";
		foreach ($name as $zone)
		{
			echo $zone."<br>";
			$zonearray[] = $zone;
		}
	}
	if(isset($_POST['part'])) 
	{
		$name = json_decode($_POST['part'], true);
		echo "You chose the following part(s): <br>";
		foreach ($name as $part)
		{
			echo $part."<br>";
			$partarray[] = $part;
		}
	}
		
	//x y z axis
	if(isset($_POST['xAxis'], $_POST['yAxis'])){
		$xAxis = $_POST['xAxis'];
		$yAxis = $_POST['yAxis'];
	}
	if(isset($_POST['zAxis'])){
		$zAxis = $_POST['zAxis'];
	}

	if (isset($_POST['xAxis']) && $xAxis!="not selected")			
		echo "You chose the following x-axis: " . $xAxis . "<br>";	
	if (isset($_POST['yAxis']) && $yAxis!="not selected")			
		echo "You chose the following y-axis: " . $yAxis . "<br>";
	if (isset($_POST['zAxis']) && $zAxis!="not selected")			
		echo "You chose the following z-axis: " . $zAxis . "<br>";	

	//choosing table based on axis category
	$xCat = $_POST['xCat'];
	$yCat = $_POST['yCat'];

	if ((isset($_POST['zCat']))){
		$zCat = $_POST['zCat'];
		echo "zCat exist";
	}else{
		echo "zCat not exist";
	}


	if($xCat == $yCat)
	{
		if($xCat == $zCat)
			$cat = array($xCat);
		else
			$cat = array($xCat,$zCat);
	}
	else if($xCat == $zCat || $yCat == $zCat)
		$cat = array($xCat,$yCat);
	else
		$cat = array($xCat,$yCat,$zCat);

	
	echo "axis category: " . implode(", ", $cat)."<br><br>";
	
	//query portion of checkboxes, to integrate with axis query part
    if(count($climatearray) > 0)
	{
		$climatequery =" AND agro.climate_zone LIKE '%" . implode("%' OR '%", $climatearray) . "%'";
		echo $climatequery . "<br>";
	}
	if(count($zonearray) > 0)
	{
		$zonequery =" AND agro." . implode("=1 AND agro.", $zonearray) . "=1";
		echo $zonequery . "<br>";
	}
	if(count($partarray) > 0)
	{
		$partquery =" AND mineral.plant_part_id IN ('" . implode("', '", $partarray)."') ";
		echo $partquery . "<br>";
	}

	//sql query based on checkbox	
	if ($zAxis == "\"null\""){
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

	if(count($partarray)>0){
		$query .= $partquery;
	}
	if(count($climatearray)>0){
		$query .= $climatequery;
	}
	if(count($zonearray)>0){
		$query .= $zonequery;
	}
	$query .=";";
	echo " " .count($partarray);
	echo " " .sizeof($climatearray);
	echo " " . sizeof($zonearray);
	echo "<br>FULL QUERY: <br>" . $query;
	echo "<br><br>";

//print results here and convert to json format	
$result = mysqli_query($conn,$query);
$jsonArray = array();
if(!$result) {
    die("<br>Database query failed");
}
else{
	//echo "<br><br>Database query success!<br>";
	if ($zAxis == ""){
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


mysqli_close($conn);


?>