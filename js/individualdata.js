$(document).ready(function() {
  /**
   * call the data.php file to fetch the result from db table.
   */
  $("#search_btn").click(function() {
<<<<<<< HEAD
     window.cropA = $('#crop').val();
=======
>>>>>>> 5b55420e8e7868de51113a41a3c4bc4215bc7513
    $.ajax({
      url: `http://localhost/cff/api/data.php`,
      data: { crop: $('#crop').val() },
      type: "POST",
      success: function(data) {
        console.log(data);
        var len = data.length;
        var i = 0;
<<<<<<< HEAD
        var cropA = {
=======
        cropA = {
>>>>>>> 5b55420e8e7868de51113a41a3c4bc4215bc7513
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
          production_system: "",
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

        cropA.cropID = data[i].cropID;
        cropA.name_var_lndrce = data[i].name_var_lndrce;
        cropA.common_name = data[i].common_name;
        cropA.scientific_name = data[i].scientific_name;
        cropA.family = data[i].family;
        cropA.genus = data[i].genus;
        cropA.species = data[i].species;
        cropA.location = data[i].location_id;
        if (data[i].zone_A == "1") {
          cropA.zone += "A";
        }
        if (data[i].zone_B == "1") {
          cropA.zone += "B";
        }
        if (data[i].zone_C == "1") {
          cropA.zone += "C";
        }
        if (data[i].zone_D == "1") {
          cropA.zone += "D";
        }
        if (data[i].zone_E == "1") {
          cropA.zone += "E";
        }

        cropA.climate_zone = data[i].climate_zone;
        cropA.altitude_absolute_max = data[i].altitude_absolute_max;

        cropA.light_optimal_max = data[i].light_optimal_max;
        cropA.light_optimal_min = data[i].light_optimal_min;

        cropA.light_absolute_max = data[i].light_absolute_max;
        cropA.light_absolute_min = data[i].light_absolute_min;

        if (data[i].photoperiod_long == "1") {
          cropA.photoperiod += "Long";
        }
        if (data[i].photoperiod_medium == "1") {
          cropA.photoperiod += " Medium ";
        }
        if (data[i].photoperiod_short == "1") {
          cropA.photoperiod += "Short";
        }

        if (data[i].soil_depth_optimal_deep == "1") {
          cropA.soil_depth_optimal += "Deep";
        }
        if (data[i].soil_depth_optimal_medium == "1") {
          cropA.soil_depth_optimal += " Medium ";
        }
        if (data[i].soil_depth_optimal_low == "1") {
          cropA.soil_depth_optimal += " Low ";
        }
        if (data[i].soil_depth_absolute_deep == "1") {
          cropA.soil_depth_absolute += "Deep";
        }
        if (data[i].soil_depth_absolute_medium == "1") {
          cropA.soil_depth_absolute += " Medium ";
        }
        if (data[i].soil_depth_absolute_low == "1") {
          cropA.soil_depth_absolute += " Low ";
        }

        if (data[i].soil_fertility_optimal_high == "1") {
          cropA.soil_fertility_optimal += " High ";
        }
        if (data[i].soil_fertility_optimal_moderate == "1") {
          cropA.soil_fertility_optimal += " Moderate ";
        }
        if (data[i].soil_fertility_optimal_low == "1") {
          cropA.soil_fertility_optimal += " Low ";
        }
        if (data[i].soil_fertility_absolute_high == "1") {
          cropA.soil_fertility_absolute += " High ";
        }
        if (data[i].soil_fertility_absolute_moderate == "1") {
          cropA.soil_fertility_absolute += " Moderate ";
        }
        if (data[i].soil_fertility_absolute_low == "1") {
          cropA.soil_fertility_absolute += " Low ";
        }

        if (data[i].soil_salinity_optimal_high == "1") {
          cropA.soil_salinity_optimal += " High ";
        }
        if (data[i].soil_salinity_optimal_moderate == "1") {
          cropA.soil_salinity_optimal += " Moderate ";
        }
        if (data[i].soil_salinity_optimal_low == "1") {
          cropA.soil_salinity_optimal += " Low ";
        }
        if (data[i].soil_salinity_absolute_high == "1") {
          cropA.soil_salinity_absolute += " High ";
        }
        if (data[i].soil_salinity_absolute_moderate == "1") {
          cropA.soil_salinity_absolute += " Moderate ";
        }
        if (data[i].soil_salinity_absolute_low == "1") {
          cropA.soil_salinity_absolute += " Low ";
        }

        if (data[i].soil_texture_optimal_heavy == "1") {
          cropA.soil_texture_optimal += "Heavy";
        }
        if (data[i].soil_texture_optimal_medium == "1") {
          cropA.soil_texture_optimal += " Medium ";
        }
        if (data[i].soil_texture_optimal_light == "1") {
          cropA.soil_texture_optimal += "Light";
        }
        if (data[i].soil_texture_absolute_heavy == "1") {
          cropA.soil_texture_absolute += "Heavy";
        }
        if (data[i].soil_texture_absolute_medium == "1") {
          cropA.soil_texture_absolute += " Medium ";
        }
        if (data[i].soil_texture_absolute_light == "1") {
          cropA.soil_texture_absolute += "Light";
        }

        cropA.latitude_absolute_max = data[i].latitude_absolute_max;
        cropA.latitude_absolute_mean = data[i].latitude_absolute_mean;
        cropA.latitude_absolute_min = data[i].latitude_absolute_min;
        cropA.latitude_optimal_max = data[i].latitude_optimal_max;
        cropA.latitude_optimal_mean = data[i].latitude_optimal_mean;
        cropA.latitude_optimal_min = data[i].latitude_optimal_min;

        cropA.rainfall_optimal_max = data[i].rainfall_optimal_max;
        cropA.rainfall_optimal_mean = data[i].rainfall_optimal_mean;
        cropA.rainfall_optimal_min = data[i].rainfall_optimal_min;
        cropA.rainfall_absolute_max = data[i].rainfall_absolute_max;
        cropA.rainfall_absolute_mean = data[i].rainfall_absolute_mean;
        cropA.rainfall_absolute_min = data[i].rainfall_absolute_min;

        cropA.soil_ph_optimal_max = data[i].soil_ph_optimal_max;
        cropA.soil_ph_optimal_mean = data[i].soil_ph_optimal_mean;
        cropA.soil_ph_optimal_min = data[i].soil_ph_optimal_min;
        cropA.soil_ph_absolute_max = data[i].soil_ph_absolute_max;
        cropA.soil_ph_absolute_mean = data[i].soil_ph_absolute_mean;
        cropA.soil_ph_absolute_min = data[i].soil_ph_absolute_min;

        cropA.temperature_optimal_max = data[i].temperature_optimal_max;
        cropA.temperature_optimal_mean = data[i].temperature_optimal_mean;
        cropA.temperature_optimal_min = data[i].temperature_optimal_min;
        cropA.temperature_absolute_max = data[i].temperature_absolute_max;
        cropA.temperature_absolute_mean = data[i].temperature_absolute_mean;
        cropA.temperature_absolute_min = data[i].temperature_absolute_min;

        cropA.texture_clay_max = data[i].texture_clay_max;
        cropA.texture_clay_mean = data[i].texture_clay_mean;
        cropA.texture_clay_min = data[i].texture_clay_min;
        cropA.texture_sand_max = data[i].texture_sand_max;
        cropA.texture_sand_mean = data[i].texture_sand_mean;
        cropA.texture_sand_min = data[i].texture_sand_min;
        cropA.texture_silt_max = data[i].texture_silt_max;
        cropA.texture_silt_mean = data[i].texture_silt_mean;
        cropA.texture_silt_min = data[i].texture_silt_min;
        
        cropA.production_system = data[i].production_system;

        cropA.plant_part_id = data[i].plant_part_id;
        cropA.calcium_ca_mean = data[i].calcium_ca_mean;
        cropA.copper_cu_mean = data[i].copper_cu_mean;
        cropA.iron_fe_mean = data[i].iron_fe_mean;
        cropA.magnesium_mg_mean = data[i].magnesium_mg_mean;
        cropA.manganese_mn_mean = data[i].manganese_mn_mean;
        cropA.phosphorus_p_mean = data[i].phosphorus_p_mean;
        cropA.potassium_k_mean = data[i].potassium_k_mean;
        cropA.selenium_mean = data[i].selenium_mean;
        cropA.sodium_mean = data[i].sodium_mean;
        cropA.zinc_zn_mean = data[i].zinc_zn_mean;
        cropA.ash_mean = data[i].ash_mean;
        cropA.carbohydrates_cho_mean = data[i].carbohydrates_cho_mean;
        cropA.fat_mean = data[i].fat_mean;
        cropA.fiber_total_dietary_fiber_mean =
          data[i].fiber_total_dietary_fiber_mean;
        cropA.protein_mean = data[i].protein_mean;
        cropA.water_moisture_mean = data[i].water_moisture_mean;

        //$("#planttitle").html(cropA.common_name);
        $("#planttitle").html(cropA.name_var_lndrce);
        $("#sc_name").html(cropA.scientific_name);
        $("#family").text(cropA.family);
        $("#genus").text(cropA.genus);
        $("#species").html(cropA.species);
        $("#climate").html(cropA.climate_zone);
        $("#zone").html(cropA.zone);
        $("#location").html(cropA.location);
        $("#maxabsalt").html(cropA.altitude_absolute_max);

        $("#minlightopt").html(cropA.light_optimal_min);
        $("#maxlightopt").html(cropA.light_optimal_max);
        $("#minlightabs").html(cropA.light_absolute_min);
        $("#maxlightabs").html(cropA.light_absolute_max);

        $("#maxrainopt").html(cropA.rainfall_optimal_max);
        $("#meanrainopt").html(cropA.rainfall_optimal_mean);
        $("#minrainopt").html(cropA.rainfall_optimal_min);
        $("#maxrainabs").html(cropA.rainfall_absolute_max);
        $("#meanrainabs").html(cropA.rainfall_absolute_mean);
        $("#minrainabs").html(cropA.rainfall_absolute_min);

        $("#maxtempopt").html(cropA.temperature_optimal_max);
        $("#meantempopt").html(cropA.temperature_optimal_mean);
        $("#mintempopt").html(cropA.temperature_optimal_min);
        $("#maxtempabs").html(cropA.temperature_absolute_max);
        $("#meantempabs").html(cropA.temperature_absolute_mean);
        $("#mintempabs").html(cropA.temperature_absolute_min);

        $("#maxphopt").html(cropA.soil_ph_optimal_max);
        $("#meanphopt").html(cropA.soil_ph_optimal_mean);
        $("#minphopt").html(cropA.soil_ph_optimal_min);
        $("#maxphabs").html(cropA.soil_ph_absolute_max);
        $("#meanphabs").html(cropA.soil_ph_absolute_mean);
        $("#minphabs").html(cropA.soil_ph_absolute_min);

        $("#photoprd").html(cropA.photoperiod);
        $("#soilfertopt").html(cropA.soil_fertility_optimal);
        $("#soilfertabs").html(cropA.soil_fertility_absolute);
        $("#soildeepopt").html(cropA.soil_depth_optimal);
        $("#soildeepabs").html(cropA.soil_depth_absolute);
        $("#soilsalopt").html(cropA.soil_salinity_optimal);
        $("#soilsalabs").html(cropA.soil_salinity_absolute);
        $("#soiltextopt").html(cropA.soil_texture_optimal);
        $("#soiltextabs").html(cropA.soil_texture_absolute);
        $("#prodsys").html(cropA.production_system);

        $("#partid").html(cropA.plant_part_id);
        $("#calcium").html(cropA.calcium_ca_mean);
        $("#copper").html(cropA.copper_cu_mean);
        $("#iron").html(cropA.iron_fe_mean);
        $("#magnesium").html(cropA.magnesium_mg_mean);
        $("#manganese").html(cropA.manganese_mn_mean);
        $("#phosphorus").html(cropA.phosphorus_p_mean);
        $("#potassium").html(cropA.potassium_k_mean);
        $("#sodium").html(cropA.sodium_mean);
        $("#zinc").html(cropA.zinc_zn_mean);
        $("#watermoist").html(cropA.water_moisture_mean);

        
      }
    });
  });
});
