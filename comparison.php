<?php
    if(isset($_POST['cropA'], $_POST['cropB'])){
        $cropAName = $_POST['cropA'];
        $cropBName = $_POST['cropB'];
    }
?>
    <!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title>Comparison Crops</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Know The Differences</h1>
                <p>Compare the crops and explore more</p>
            </div>
        </div>

        <!-- THE SEARCH BAR  -->
        <?php require('searchbar.php'); ?>
        <div class="container">
            <div class="well well-sm col-lg-8 col-lg-offset-2">
                <h5>Start with the taxonomy</h5>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="varlndrce1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">VAR LNDRCE NAME</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="varlndrce2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="commonname1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">COMMON NAME</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="commonname2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="scientific1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">SCIENTIFIC NAME</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="scientific2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="family1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">FAMILY</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="family2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="genus1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">GENUS</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="genus2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="species1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">SPECIES</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="species2"></div>
                </div>
            </div>
            <div class="well well-sm col-lg-8 col-lg-offset-2">
                <h5>Carry on to the crop ecology</h5>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="zone1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">ZONE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="zone2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="climate1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">CLIMATE ZONE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="climate2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="maxabsalt1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">MAXIMUM ABSOLUTE ALTITUDE </div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="maxabsalt2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="minlightopt1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">MINIMUM LIGHT OPTIMAL</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="minlightopt2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="maxlightopt1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">MAXIMUM LIGHT OPTIMAL</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="maxlightopt2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="maxlightabs1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">MAXIMUM LIGHT ABSOLUTE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="maxlightabs2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="minlightabs1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">MINIMUM LIGHT ABSOLUTE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="minlightabs2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="photoprd1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">PHOTOPERIOD</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="photoprd2"></div>
                </div>
            </div>
            <div class="well well-sm col-lg-8 col-lg-offset-2">
                <h5>Last but not least, the soil properties</h5>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="optsoildeep1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">OPTIMAL SOIL DEPTH</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="optsoildeep2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="abssoildeep1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">ABSOLUTE SOIL DEPTH</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="abssoildeep2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="optsoilfert1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">OPTIMAL SOIL FERTILITY</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="optsoilfert2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="abssoilfert1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">ABSOLUTE SOIL FERTILITY</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="abssoilfert2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="optsoilsal1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">OPTIMAL SOIL SALINITY</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="optsoilsal2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="abssoilsal1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">ABSOLUTE SOIL SALINITY</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropB text-left" id="abssoilsal2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="optsoiltext1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">OPTIMAL SOIL TEXTURE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="optsoiltext2"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <div class="cropA text-right" id="abssoiltext1"></div>
                </div>
                <div class="col-lg-2">
                    <div class="cropA text-center">ABSOLUTE SOIL TEXTURE</div>
                </div>
                <div class="col-lg-5">
                    <div class="cropA text-left" id="abssoiltext2"></div>
                </div>
            </div>
        </div>

        <div class="chartContainer">
            <canvas class="charts" id="rainfall"></canvas>
        </div>
        <div class="chartContainer">
            <canvas class="charts"  id="temperature"></canvas>
        </div>
        <div class="chartContainer">
            <canvas class="charts"  id="soilph"></canvas>
        </div>
        <div class="chartContainer">
            <canvas class="charts"  id="minerals"></canvas>
        </div>
        <div class="chartContainer">
            <canvas class="charts"  id="nutrients"></canvas>
        </div>
        <div class="chartContainer">
            <canvas class="charts"  id="latitude"></canvas>
        </div>


        <!-- Jquery -->
        <script>
            var crop1 = "<?=$cropAName?>";
            var crop2 = "<?=$cropBName?>";
            var cropA = {
                cropID: 0,
                name_var_lndrce: "",
                common_name: "",
                scientific_name: "",
                family: "",
                genus: "",
                species: "",
                location: 0,
                zone: "",
                climate_zone: "",
                altitude_absolute_max: 0,
                latitude_optimal_max: 0,
                latitude_optimal_mean: 0,
                latitude_optimal_min: 0,
                latitude_absolute_max: 0,
                latitude_absolute_mean: 0,
                latitude_absolute_min: 0,
                light_optimal_max: "",
                light_optimal_min: "",
                light_absolute_max: "",
                light_absolute_min: "",
                photoperiod: "",
                soil_depth_optimal: "",
                soil_depth_absolute: "",
                soil_fertility_optimal: "",
                soil_fertility_absolute: "",
                soil_ph_optimal_max: 0,
                soil_ph_optimal_mean: 0,
                soil_ph_optimal_min: 0,
                soil_ph_absolute_max: 0,
                soil_ph_absolute_min: 0,
                soil_salinity_optimal: "",
                soil_salinity_absolute: "",
                soil_texture_optimal: "",
                soil_texture_absolute: "",
                texture_clay_max: 0,
                texture_clay_mean: 0,
                texture_clay_min: 0,
                texture_sand_max: 0,
                texture_sand_mean: 0,
                texture_sand_min: 0,
                texture_silt_max: 0,
                texture_silt_mean: 0,
                texture_silt_min: 0,
                plant_part_id: 0,
                calcium_ca_mean: 0,
                copper_cu_mean: 0,
                iron_fe_mean: 0,
                magnesium_mg_mean: 0,
                manganese_mn_mean: 0,
                phosphorus_p_mean: 0,
                potassium_k_mean: 0,
                selenium_mean: 0,
                sodium_mean: 0,
                zinc_zn_mean: 0,
                ash_mean: 0,
                carbohydrates_cho_mean: 0,
                fat_mean: 0,
                fiber_total_dietary_fiber_mean: 0,
                protein_mean: 0,
                water_moisture_mean: 0
            };
            var cropB = {
                cropID: 0,
                common_name: "",
                name_var_lndrce: "",
                scientific_name: "",
                family: "",
                genus: "",
                species: "",
                location: 0,
                zone: "",
                climate_zone: "",
                altitude_absolute_max: 0,
                latitude_optimal_max: 0,
                latitude_optimal_mean: 0,
                latitude_optimal_min: 0,
                latitude_absolute_max: 0,
                latitude_absolute_mean: 0,
                latitude_absolute_min: 0,
                light_optimal_max: "",
                light_optimal_min: "",
                light_absolute_max: "",
                light_absolute_min: "",
                photoperiod: "",
                soil_depth_optimal: "",
                soil_depth_absolute: "",
                soil_fertility_optimal: "",
                soil_fertility_absolute: "",
                soil_ph_optimal_max: 0,
                soil_ph_optimal_mean: 0,
                soil_ph_optimal_min: 0,
                soil_ph_absolute_max: 0,
                soil_ph_absolute_min: 0,
                soil_salinity_optimal: "",
                soil_salinity_absolute: "",
                soil_texture_optimal: "",
                soil_texture_absolute: "",
                texture_clay_max: 0,
                texture_clay_mean: 0,
                texture_clay_min: 0,
                texture_sand_max: 0,
                texture_sand_mean: 0,
                texture_sand_min: 0,
                texture_silt_max: 0,
                texture_silt_mean: 0,
                texture_silt_min: 0,
                plant_part_id: 0,
                calcium_ca_mean: 0,
                copper_cu_mean: 0,
                iron_fe_mean: 0,
                magnesium_mg_mean: 0,
                manganese_mn_mean: 0,
                phosphorus_p_mean: 0,
                potassium_k_mean: 0,
                selenium_mean: 0,
                sodium_mean: 0,
                zinc_zn_mean: 0,
                ash_mean: 0,
                carbohydrates_cho_mean: 0,
                fat_mean: 0,
                fiber_total_dietary_fiber_mean: 0,
                protein_mean: 0,
                water_moisture_mean: 0
            };
        </script>
        <script src="js/datacompare.js"></script>
        <script src="js/linegraph.js"></script>
        <script src="js/radarchart.js"></script>
        <script src="js/barchart.js"></script>
    </body>

    </html>