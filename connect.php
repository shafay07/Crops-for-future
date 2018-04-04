<?php
$servername = 'localhost';
$username = 'admin';
$password = 'cffmysql';
$dbname = 'cff';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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
		$name = $_POST['climate'];
		echo "You chose the following climate(s): <br>";
		foreach ($name as $climate)
		{
			echo $climate."<br />";
			$climatearray[] = $climate;
			
		}
	}
	if(isset($_POST['zone'])) 
	{
		$name = $_POST['zone'];
		echo "You chose the following zone(s): <br>";
		foreach ($name as $zone)
		{
			echo $zone."<br>";
			$zonearray[] = $zone;
		}
	}
	if(isset($_POST['part'])) 
	{
		$name = $_POST['part'];
		echo "You chose the following part(s): <br>";
		foreach ($name as $part)
		{
			echo $part."<br>";
			$partarray[] = $part;
		}
	}
		
	//x and y axis
	$xAxis = $_POST['xAxis'];
	$yAxis = $_POST['yAxis'];
	$zAxis = $_POST['zAxis'];
	if($xAxis=="null"|| $yAxis=="null")
		die("axis not selected");
	else{	
		echo "You chose the following x-axis: " . $xAxis . "<br>";				
		echo "You chose the following y-axis: " . $yAxis . "<br>";
	}
	if ($zAxis!="null")			
		echo "You chose the following z-axis: " . $zAxis . "<br>";
	
	//choosing table based on axis category
	$xCat = $_POST['xCat'];
	$yCat = $_POST['yCat'];
	$zCat = $_POST['zCat'];
		
	//query portion of checkboxes, to integrate with axis query part
    if(count($climatearray))
	{
		$climatequery =" AND agro.climate_zone LIKE '%" . implode("%' OR '%", $climatearray) . "%'";
		echo $climatequery . "<br>";
	}
	if(count($zonearray))
	{
		$zonequery =" AND agro." . implode("=1 AND agro.", $zonearray) . "=1";
		echo $zonequery . "<br>";
	}
	if(count($partarray))
	{
		$partquery =" AND mineral.plant_part_id IN ('" . implode("', '", $partarray)."') ";
		echo $partquery . "<br>";
	}

	//sql query based on checkbox	
	$query = "SELECT tax.cropID, tax.common_name, "
			. $xCat . "." . $xAxis . ", " . $yCat . "." . $yAxis;
	if($zAxis!="null")
		$query .= ", " . $zCat . "." . $zAxis;
	$query .= " FROM crop_taxonomy tax LEFT JOIN agro_agroecology_livedb agro ON tax.cropID=agro.cropid";	
	$query .= " LEFT JOIN nutrient_minerals mineral ON tax.cropID=mineral.cropid LEFT JOIN general_plant_parts part ON mineral.plant_part_id=part.id LEFT JOIN nutrient_proximate_composition composition ON tax.cropID=composition.cropid";
	$query .=" WHERE " . $xAxis . " !=' ' AND " . $yAxis . " !=' '";
	if($zAxis!="null")
		$query .= " AND " . $zAxis . " !=' '";
	if(count($partarray))
		$query .= $partquery;
	if(count($climatearray))
		$query .= $climatequery;
	if(count($zonearray))
		$query .= $zonequery;
	echo "<br>FULL QUERY: <br>" . $query;

//print results here and convert to json format	
$result = mysqli_query($conn,$query);
$jsonArray = array();
if(!$result) {
    die("<br>Database query failed");
}
else{
	/*echo "<br><br>Database query success!<br><p>";
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
	
	print json_encode($jsonArray);
	echo "</p>";*/
	foreach($result as $row){
		$jsonArray[]=$row;
	}
	echo "<pre>";
	print json_encode($jsonArray);
	echo "</pre>";
}

//save into a json file
$fp = fopen('query.json', 'w');
fwrite($fp, json_encode($jsonArray));
fclose($fp);

echo "<br>JSON file created.<br>";


mysqli_close($conn);


?>