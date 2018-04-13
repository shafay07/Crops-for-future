<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        var climatearray = <?php echo (isset($_POST['climate']) ? json_encode($_POST['climate']) :  "null")?>;
        var zonearray = <?php echo (isset($_POST['zone']) ? json_encode($_POST['zone']) : "null" )?>;
        var partarray = <?php echo (isset($_POST['part']) ? json_encode($_POST['part']) : "null" )?>;
        var xVar = "<?php echo (isset($_POST['xAxis']) ? $_POST['xAxis'] : "null ")?>";
        var yVar = "<?php echo (isset($_POST['yAxis']) ? $_POST['yAxis'] : "null ")?>";
        var zVar = "<?php echo (isset($_POST['zAxis']) ? $_POST['zAxis'] : "null ")?>";
        var xCat = "<?php echo (isset($_POST['xCat']) ? $_POST['xCat'] : "null ")?>";
        var yCat = "<?php echo (isset($_POST['yCat']) ? $_POST['yCat'] : "null ")?>";
        var zCat = "<?php echo (isset($_POST['zCat']) ? $_POST['zCat'] : "null ")?>";
    </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="js/control.js"></script>
    <title>Graph</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Chivo');
        * {
            font-family: 'Chivo', 'Arial';
        }

        body {
            overflow: hidden;
        }

        .nav_bar {
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 12%;
            background-color: #E3E3E3;
        }

        #logo {
            top: 4%;
            position: absolute;
            left: 5%;
            cursor: pointer;
            height: 90%;
        }

        #nav1,
        #nav2,
        #nav3 {
            padding: 3%;
            width: 30%;
            height: 100%;
            border: none;
            cursor: pointer;
            background-color: #E3E3E3;
            font-size: 3vh;
            cursor: pointer;
            margin-left: 2%;
        }

        #s_graph {
            position: absolute;
            height: 68%;
            width: 86%;
            top: 16%;
            display: block;
            left: 7%;
        }

        .nav a {
            color: #ED802C;
            font-weight: bold;
            font-size: 2vh;
        }

        .nav-pills>li.active>a,
        .nav-pills>li.active>a:focus,
        .nav-pills>li.active>a:hover {
            background-color: #96B53C;
        }

        /* Override svg container in plotly */
        .svg-container {
            width: 1000px  !important;
            height: 700px  !important;
        }
    </style>

</head>

<body>
    <!--HEADER-->
    <div class="nav_bar">
        <a href="index.html">
            <img id="logo" src="assets/cfflogo.png">
        </a>
    </div>

    <div id="s_graph">
        <ul class="nav nav-pills nav-justified">
            <li class="active">
                <a data-toggle="pill" href="#type1">Type 1</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type2">Type 2</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type3">Type 3</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type4">Type 4</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="type1" class="tab-pane fade in active">
                <div id="graph"></div>
            </div>
            <div id="type2" class="tab-pane fade">
                <div id="graph1" ></div>
            </div>
            <div id="type3" class="tab-pane fade">
                <div id="graph2"></div>
            </div>
            <div id="type4" class="tab-pane fade">
                <div id="graph3"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.nav-tabs a:first').tab('show');
    </script>
</body>

</html>