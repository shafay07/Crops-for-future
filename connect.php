<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
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
		//echo "You chose the following climate(s): <br>";
		foreach ($name as $climate)
		{
			//echo $climate."<br />";
			$climatearray[] = $climate;
			
		}
	}
	
	if(isset($_POST['zone'])) 
	{
		$name = $_POST['zone'];
		//echo "You chose the following zone(s): <br>";
		foreach ($name as $zone)
		{
			//echo $zone."<br>";
			$zonearray[] = $zone;
		}
	}
	if(isset($_POST['part'])) 
	{
		$name = $_POST['part'];
		//echo "You chose the following part(s): <br>";
		foreach ($name as $part)
		{
			//echo $part."<br>";
			$partarray[] = $part;
		}
	}
		
	//x and y axis
	$xAxis = $_POST['xAxis'];
	$yAxis = $_POST['yAxis'];
	$zAxis = $_POST['zAxis'];

	if($xAxis=="not selected" || $yAxis=="not selected" || $zAxis=="not selected")
		die("axis not selected");
	if (isset($_POST['xAxis']) && $xAxis!="not selected")			
		//echo "You chose the following x-axis: " . $xAxis . "<br>";	
	if (isset($_POST['yAxis']) && $yAxis!="not selected")			
		//echo "You chose the following y-axis: " . $yAxis . "<br>";
	if (isset($_POST['zAxis']) && $zAxis!="not selected")			
		//echo "You chose the following z-axis: " . $zAxis . "<br>";
	
	//choosing table based on axis category
	$xCat = $_POST['xCat'];
	$yCat = $_POST['yCat'];
	$zCat = $_POST['zCat'];
	
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
	
	//echo "axis category: " . implode(", ", $cat)."<br><br>";
	
	//query portion of checkboxes, to integrate with axis query part
    if(count($climatearray))
	{
		$climatequery =" AND agro.climate_zone LIKE '%" . implode("%' OR '%", $climatearray) . "%'";
		//echo $climatequery . "<br>";
	}
	if(count($zonearray))
	{
		$zonequery =" AND agro." . implode("=1 AND agro.", $zonearray) . "=1";
		//echo $zonequery . "<br>";
	}
	if(count($partarray))
	{
		$partquery =" AND mineral.plant_part_id IN ('" . implode("', '", $partarray)."') ";
		//echo $partquery . "<br>";
	}

	//sql query based on checkbox	
	$query = "SELECT tax.cropID, tax.common_name, "
			. $xCat . "." . $xAxis . ", " . $yCat . "." . $yAxis . ", " . $zCat . "." . $zAxis
			. " FROM crop_taxonomy tax LEFT JOIN agro_agroecology_livedb agro ON tax.cropID=agro.cropid";	
	$query .= " LEFT JOIN nutrient_minerals mineral ON tax.cropID=mineral.cropid LEFT JOIN general_plant_parts part ON mineral.plant_part_id=part.id ";
	if($cat[0]=="composition"||$cat[1]=="composition")
		$query .= " LEFT JOIN nutrient_proximate_composition composition ON tax.cropID=composition.cropid";
	$query .=" WHERE " . $xAxis . " IS NOT NULL AND " . $yAxis . " IS NOT NULL AND " . $zAxis . " IS NOT NULL";
	if(count($partarray))
		$query .= $partquery;
	if(count($climatearray))
		$query .= $climatequery;
	if(count($zonearray))
		$query .= $zonequery;
	//echo "<br>FULL QUERY: <br>" . $query;

//print results here and convert to json format	
$result = mysqli_query($conn,$query);
$jsonArray = array();
if(!$result) {
    die("<br>Database query failed");
}
else{
	//echo "<br><br>Database query success!<br>";
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
}


mysqli_close($conn);


?>