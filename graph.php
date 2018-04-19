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
        var xVar = "<?php echo (isset($_POST['xAxis']) ? $_POST['xAxis'] : "
        null ")?>";
        var yVar = "<?php echo (isset($_POST['yAxis']) ? $_POST['yAxis'] : "
        null ")?>";
        var zVar = "<?php echo (isset($_POST['zAxis']) ? $_POST['zAxis'] : "
        null ")?>";
        var xCat = "<?php echo (isset($_POST['xCat']) ? $_POST['xCat'] : "
        null ")?>";
        var yCat = "<?php echo (isset($_POST['yCat']) ? $_POST['yCat'] : "
        null ")?>";
        var zCat = "<?php echo (isset($_POST['zCat']) ? $_POST['zCat'] : "
        null ")?>";
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

        #dim {
            width: 100%;
            height: 100%;
            transition: ease 1s;
            top: 0%;
            position: absolute;
            left: 0%;
            opacity: 0.6;
            display: none;
            z-index: 3;
            background: black;
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

        #help_button {
            width: 8%;
            height: 100%;
            border: none;
            background-color: #E3E3E3;
            font-size: 3vh;
            cursor: pointer;
            margin-left: 88%;
            margin-top: 0%;
        }

        #help_cont {
            position: absolute;
            top: 5%;
            left: 10%;
            width: 80%;
            height: 90%;
            overflow-y: auto;
            display: none;
            background-color: white;
            z-index: 4;
        }

        #title_top {
            margin-top: 0%;
            height: 8%;
            background-color: #96B53C;
            color: white;
            text-align: center;
            font-size: 5vh;
            position: fixed;
            width: 79%;
        }

        .welcome {
            text-align: center;
            margin-top: 12%;
        }

        .main_steps {
            color: #96B53C;
            text-align: left;
            margin-left: 5%;
            font-size: 4vh;
            font-weight: bold;
        }

        .steps {
            text-align: left;
            margin-left: 5%;

            font-size: 3vh;
            margin-right: 5%;
        }

        .note {
            font-weight: bold;
            color: #ED802C;
            font-size: 3vh;
            margin-right: 5%;
        }

        #start {
            position: absolute;
            width: 8%;
            height: 6vh;
            color: white;
            background-color: #ED802C;
            left: 43%;
            margin: 3%;

        }

        #start:hover {
            border: none;
            background-color: white;
            color: #ED802C;
        }


        #s_graph {
            position: absolute;
            height: 100%;
            width: 86%;
            top: 16%;
            left: 7%;
            ,
            display: block;
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
    </style>

</head>

<body>
    <!--HEADER-->
    <div class="nav_bar">
        <a href="index.html">
            <img id="logo" src="assets/cfflogo.png">
        </a>
        <button id="help_button" onclick="showHelp()">Help</button>
    </div>
    </div>

    <div id="dim"></div>

    <div id="s_graph">
        <ul class="nav nav-pills nav-justified">
            <li class="active">
                <a data-toggle="pill" href="#type1" onclick="autorangeChart(graph)">Scatter Plot</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type2" onclick="autorangeChart(graph1)">Bar Chart</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type3" onclick="autorangeChart(graph2)">Box Plot</a>
            </li>
            <li>
                <a data-toggle="pill" href="#type4" onclick="autorangeChart3d(graph3)">3D</a>
            </li>
        </ul>

        <div class="tab-content">
            <div id="type1" class="tab-pane fade in active">
                <div id="graph"></div>
            </div>
            <div id="type2" class="tab-pane fade">
                <div id="graph1"></div>
            </div>
            <div id="type3" class="tab-pane fade">
                <div id="graph2"></div>
            </div>
            <div id="type4" class="tab-pane fade">
                <div id="graph3"></div>
            </div>
        </div>
    </div>

    <div id="help_cont">
        <div id="title_top">USER GUIDE</div>
        <p class="welcome">
            <span style="font-size:5vh;">Welcome to our Data Visualisation website!</span>
            <br>
            <br>
            <span style="font-size:4vh;">The following is to ensure that you make the most of this tool:</span>
        </p>

        <p class="main_steps" style="margin-top:10%;">A. General Navigation
            <br>
        </p>
        <p class="steps" style="margin-top:2%;">1. Scrolling up and down enables the back and forth movement of the 3 sections that each contain a specific functionality,
            which are data subsetting and plotting, comparing crops and discovering individual crops.
            <br>
            <br>
            <br>
        </p>

        <p class="main_steps">B. Subsetting the data
            <br>
        </p>
        <p class="steps">1. Click on a button among the upper three - ZONE, CLIMATE and PARTS.
            <br>
            <span class="note">&nbsp&nbsp&nbspNOTE: Only ONE among the 3 can be chosen.</span>
            <br>2. On the corresponding slider that appears, select the box(es) of your choice.
            <br>3. Click "OK".
            <br>4. Click on a button among the lower three - AGROECOLOGY, MINERALS, NUTRIENT COMPOSITION.
            <br>5. Choose one of the options that you want as your X axis, and click on "Set X".
            <br>6. Repeat Step 5 to choose your Y and Z axes and click on "Set Y" and "Set Z (optional)" respectively.
            <br>
            <span class="note">&nbsp&nbsp&nbspNOTE: Axis values can be chosen from any of the three, for e.g., X axis can be chosen &nbsp&nbsp&nbspfrom
                AGROECOLOGY while Y axis can be chosen from MINERALS.</span>
            <br>7. Click "OK".
            <br>8. Click on "GO" to confirm your selections or click on "RESET" to restart the subsetting process.
            <br>
            <br>
            <br>
        </p>

        <p class="main_steps">C. Visualising subsetted data
            <br>
        </p>
        <p class="steps">1. When page loads, double-click on graph to auto-scale it.
            <br>2. The sidebar(small icons in a line) has many functions, discover them.
            <br>3. For the 3D-graph, the X,Y and Z need to be selected and click on "Orbital Rotation" to refresh the data.
            <br>4. The graphs are interactive,for e.g., you can zoom, select an area and even hover on point to get the crop
            name.
            <br>
            <br>
            <br>
        </p>

        <p class="main_steps">D. Comparing crop data
            <br>
        </p>
        <p class="steps">1. Enter the names of the crops to be compared into the two search bars. Click on "COMPARE".
            <br>2. Click on the "Taxonomy" tab to view differences in taxonomy-related data.
            <br>3. Click on the "Ecology System" tab to view differences in ecology system-related data.
            <br>4. Click on the "Rainfall", "Latitude", "Soil PH", "Minerals" and "Nutrients" tabs to view the differences represented
            respectively using charts.
            <br>
            <span class="note">&nbsp&nbsp&nbsp&nbspNOTE: The charts are interactive.</span>
            <br>5. Click the legend to hide the crop data.
            <br>6. Click on "RESET" for a new comparison.
            <br>
            <br>
            <br>
        </p>

        <p class="main_steps">E. Looking up a crop
            <br>
        </p>
        <p class="steps">1. Enter the name of the crop into the search bar.
            <br>2. Click "GO".
            <br>3. Use the arrows to slide through individual crop data.
            <br>4. Scroll on table to view more content.
            <br>5. Click on "Back to search" to look up a new crop.
            <br>
            <br>
            <br>
        </p>

        <p class="main_steps">F. Home
            <br>
        </p>
        <p class="steps">1. Click on the CFF logo from anywhere to go back to the home page and start anew.
            <br>
            <br>
            <br>
        </p>

        <p style="font-size:3vh;text-align:center;">You are now ready to start using our website!</p>
        <br>

        <button id="start" onclick="hideGuide()">START</button>

    </div>

    <script type="text/javascript">
        $('.nav-tabs a:first').tab('show');

        function showHelp() {
            document.getElementById("help_cont").style.display = 'block';
            document.getElementById("dim").style.display = 'block';
            document.getElementById("help_cont").style.opacity = 1;
        }

        function hideGuide() {
            document.getElementById("help_cont").style.display = 'none';
            document.getElementById("dim").style.display = 'none';
        }
    </script>
    <script>
        setTimeout(function () {
            autorangeChart('graph');
        }, 1500);

        function autorangeChart(graphid) {
            Plotly.relayout(graphid, {
                width: 1200, // or any new width
                height: 600, // " "
                'xaxis.autorange': true,
                'yaxis.autorange': true
            });
        }

        function autorangeChart3d(graphid) {
            Plotly.relayout(graphid, {
                width: 1200, // or any new width
                height: 600, // " "
                scene: {
                    aspectmode: "auto"
                },
                scene: {
                    xaxis: {
                        title: xVar,
                        backgroundcolor: "rgba(235, 127, 56, 0.8)",
                        gridcolor: "rgb(255, 255, 255)",
                        showbackground: true,
                        zerolinecolor: "rgb(255, 255, 255)"

                    },
                    yaxis: {
                        title: yVar,
                        backgroundcolor: "rgba(150, 180, 69, 0.8)",
                        gridcolor: "rgb(255, 255, 255)",
                        showbackground: true,
                        zerolinecolor: "rgb(255, 255, 255)"
                    },
                    zaxis: {
                        title: zVar,
                        backgroundcolor: "rgb(181, 181, 181)",
                        gridcolor: "rgb(255, 255, 255)",
                        showbackground: true,
                        zerolinecolor: "rgb(255, 255, 255)"
                    }   
                }
            });
        }
    </script>
</body>

</html>