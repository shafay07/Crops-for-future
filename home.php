<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Main</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>

      var climatearray = <?php echo (isset($_POST['climate']) ? json_encode($_POST['climate']) :  "null")?>;
//      var zonearray = JSON.stringify(//json_encode($_POST['zone']));
//      var partarray = JSON.stringify(//json_encode($_POST['part']));

      var zonearray = <?php echo (isset($_POST['zone']) ? json_encode($_POST['zone']) : "null" )?>;
      var partarray = <?php echo (isset($_POST['part']) ? json_encode($_POST['part']) : "null" )?>;
      var xVar = "<?php echo (isset($_POST['xAxis']) ? $_POST['xAxis'] : "null")?>";
      var yVar = "<?php echo (isset($_POST['yAxis']) ? $_POST['yAxis'] : "null")?>";
      var zVar = "<?php echo (isset($_POST['zAxis']) ? $_POST['zAxis'] : "null")?>";
      var xCat = "<?php echo (isset($_POST['xCat']) ? $_POST['xCat'] : "null")?>";
      var yCat = "<?php echo (isset($_POST['yCat']) ? $_POST['yCat'] : "null")?>";
      var zCat = "<?php echo (isset($_POST['zCat']) ? $_POST['zCat'] : "null")?>";
  </script>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <script src="js/control.js"></script>
</head>
<body>
  <h1><center>Graphs for the subseted data</center></h1>
  <div id = "graph" style="width:800px;height: 600px;"></div>
  <div id = "graph1" style="width:800px;height: 600px;"></div>
  <div id = "graph2" style="width:800px;height: 600px;"></div>
  <div id = "graph3" style="width:800px;height: 800px;"></div>
</body>
</html>
