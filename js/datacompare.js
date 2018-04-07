$(document).ready(function(){
  /**
   * call the data.php file to fetch the result from db table.
   */
  $.ajax({
    url: `http://localhost/cff/api/data.php`,
    data: {cropA: crop1, cropB: crop2},
    type: "POST",
    success: function(data){
      var len = data.length;
      for (var i = 0; i < len; i++){
        if (data[i].name_var_lndrce == crop1){
          cropA.cropID = data[i].cropID;
          cropA.name_var_lndrce = data[i].name_var_lndrce;
          cropA.common_name = data[i].common_name;
          cropA.scientific_name = data[i].scientific_name;
          cropA.family = data[i].family;
          cropA.genus = data[i].genus;
          cropA.species = data[i].species;
          cropA.location = data[i].location_id;
          if (data[i].zone_A == "1"){
            cropA.zone += "A";
          }
          if (data[i].zone_B == "1"){
            cropA.zone += "B";
          }
          if (data[i].zone_C == "1"){
            cropA.zone += "C";
          }
          if (data[i].zone_D == "1"){
            cropA.zone += "D";
          }
          if (data[i].zone_E == "1"){
            cropA.zone += "E";
          }

          cropA.climate_zone = data[i].climate_zone;
          cropA.altitude_absolute_max = data[i].altitude_absolute_max;

          cropA.light_optimal_max = data[i].light_optimal_max;
          cropA.light_optimal_min = data[i].light_optimal_min;

          cropA.light_absolute_max = data[i].light_absolute_max;
          cropA.light_absolute_min = data[i].light_absolute_min;

          if (data[i].photoperiod_long == "1"){
            cropA.photoperiod +=  "Long";
          }
          if (data[i].photoperiod_medium == "1"){
            cropA.photoperiod +=  " Medium ";
          }
          if (data[i].photoperiod_short == "1"){
            cropA.photoperiod +=  " Short ";
          }

          if (data[i].soil_depth_optimal_deep == "1"){
            cropA.soil_depth_optimal +=  " Deep ";
          }
          if (data[i].soil_depth_optimal_medium == "1"){
            cropA.soil_depth_optimal +=  " Medium ";
          }
          if (data[i].soil_depth_optimal_low == "1"){
            cropA.soil_depth_optimal +=  " Low ";
          }
          if (data[i].soil_depth_absolute_deep == "1"){
            cropA.soil_depth_absolute +=  " Deep ";
          }
          if (data[i].soil_depth_absolute_medium == "1"){
            cropA.soil_depth_absolute +=  " Medium ";
          }
          if (data[i].soil_depth_absolute_low == "1"){
            cropA.soil_depth_absolute +=  " Low ";
          }

          if (data[i].soil_fertility_optimal_high  == "1"){
            cropA.soil_fertility_optimal += " High ";
          }
          if (data[i].soil_fertility_optimal_moderate == "1"){
            cropA.soil_fertility_optimal +=  " Moderate ";
          }
          if (data[i].soil_fertility_optimal_low == "1"){
            cropA.soil_fertility_optimal +=  " Low ";
          }
          if (data[i].soil_fertility_absolute_high  == "1"){
            cropA.soil_fertility_absolute += " High ";
          }
          if (data[i].soil_fertility_absolute_moderate == "1"){
            cropA.soil_fertility_absolute +=  " Moderate ";
          }
          if (data[i].soil_fertility_absolute_low == "1"){
            cropA.soil_fertility_absolute +=  " Low ";
          }

          if (data[i].soil_salinity_optimal_high  == "1"){
            cropA.soil_salinity_optimal += " High ";
          }
          if (data[i].soil_salinity_optimal_moderate == "1"){
            cropA.soil_salinity_optimal +=  " Moderate ";
          }
          if (data[i].soil_salinity_optimal_low == "1"){
            cropA.soil_salinity_optimal +=  " Low ";
          }
          if (data[i].soil_salinity_absolute_high  == "1"){
            cropA.soil_salinity_absolute += " High ";
          }
          if (data[i].soil_salinity_absolute_moderate == "1"){
            cropA.soil_salinity_absolute +=  " Moderate ";
          }
          if (data[i].soil_salinity_absolute_low == "1"){
            cropA.soil_salinity_absolute +=  " Low ";
          }

          if (data[i].soil_texture_optimal_heavy == "1"){
            cropA.soil_texture_optimal +=  " Heavy ";
          }
          if (data[i].soil_texture_optimal_medium == "1"){
            cropA.soil_texture_optimal +=  " Medium ";
          }
          if (data[i].soil_texture_optimal_light == "1"){
            cropA.soil_texture_optimal +=  " Light ";
          }
          if (data[i].soil_texture_absolute_heavy == "1"){
            cropA.soil_texture_absolute +=  " Heavy ";
          }
          if (data[i].soil_texture_absolute_medium == "1"){
            cropA.soil_texture_absolute +=  " Medium ";
          }
          if (data[i].soil_texture_absolute_light == "1"){
            cropA.soil_texture_absolute +=  " Light ";
          }
          /*  
Use in charts of Latitude
          cropA.latitude_absolute_max = data[i].latitude_absolute_max;
          cropA.latitude_absolute_mean = data[i].latitude_absolute_mean;
          cropA.latitude_absolute_min = data[i].latitude_absolute_min;
          cropA.latitude_optimal_max = data[i].latitude_optimal_max;
          cropA.latitude_optimal_mean = data[i].latitude_optimal_mean;
          cropA.latitude_optimal_min = data[i].latitude_optimal_min;            
Use in charts of Rainfall
            cropA.rainfall_optimal_max = data[i].rainfall_optimal_max;
            cropA.rainfall_optimal_mean = data[i].rainfall_optimal_mean;
            cropA.rainfall_optimal_min = data[i].rainfall_optimal_min;
            cropA.rainfall_absolute_max = data[i].rainfall_absolute_max;
            cropA.rainfall_absolute_mean = data[i].rainfall_absolute_mean;
            cropA.rainfall_absolute_min = data[i].rainfall_absolute_min;
            
Use in charts of Soil PH
            cropA.soil_ph_optimal_max = data[i].soil_ph_optimal_max;
            cropA.soil_ph_optimal_mean = data[i].soil_ph_optimal_mean;
            cropA.soil_ph_optimal_min = data[i].soil_ph_optimal_min;
            cropA.soil_ph_absolute_max = data[i].soil_ph_absolute_max;
            cropA.soil_ph_absolute_mean = data[i].soil_ph_absolute_mean;
            cropA.soil_ph_absolute_min = data[i].soil_ph_absolute_min;
            
Use in Temperature Charts
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



Nutrients         
///id have meaning KIV   //////
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

*/
        } else if (data[i].name_var_lndrce == crop2){
          cropB.cropID = data[i].cropID;
          cropB.name_var_lndrce = data[i].name_var_lndrce;
          cropB.common_name = data[i].common_name;
          cropB.scientific_name = data[i].scientific_name;
          cropB.family = data[i].family;
          cropB.genus = data[i].genus;
          cropB.species = data[i].species;
          cropB.location = data[i].location_id;
          if (data[i].zone_A == "1"){
            cropB.zone += "A";
          }
          if (data[i].zone_B == "1"){
            cropB.zone += "B";
          }
          if (data[i].zone_C == "1"){
            cropB.zone += "C";
          }
          if (data[i].zone_D == "1"){
            cropB.zone += "D";
          }
          if (data[i].zone_E == "1"){
            cropB.zone += "E";
          }

          cropB.climate_zone = data[i].climate_zone;
          cropB.altitude_absolute_max = data[i].altitude_absolute_max;

          cropB.light_optimal_max = data[i].light_optimal_max;
          cropB.light_optimal_min = data[i].light_optimal_min;
          cropB.light_absolute_max = data[i].light_absolute_max;
          cropB.light_absolute_min = data[i].light_absolute_min;

          if (data[i].photoperiod_long == "1"){
            cropB.photoperiod +=  "Long";
          }
          if (data[i].photoperiod_medium == "1"){
            cropB.photoperiod +=  " Medium ";
          }
          if (data[i].photoperiod_short == "1"){
            cropB.photoperiod +=  " Short ";
          }

          if (data[i].soil_depth_optimal_deep == "1"){
            cropB.soil_depth_optimal +=  " Deep ";
          }
          if (data[i].soil_depth_optimal_medium == "1"){
            cropB.soil_depth_optimal +=  " Medium ";
          }
          if (data[i].soil_depth_optimal_low == "1"){
            cropB.soil_depth_optimal +=  " Low ";
          }
          if (data[i].soil_depth_absolute_deep == "1"){
            cropB.soil_depth_absolute +=  " Deep ";
          }
          if (data[i].soil_depth_absolute_medium == "1"){
            cropB.soil_depth_absolute +=  " Medium ";
          }
          if (data[i].soil_depth_absolute_low == "1"){
            cropB.soil_depth_absolute +=  " Low ";
          }

          if (data[i].soil_fertility_optimal_high  == "1"){
            cropB.soil_fertility_optimal += " High ";
          }
          if (data[i].soil_fertility_optimal_moderate == "1"){
            cropB.soil_fertility_optimal +=  " Moderate ";
          }
          if (data[i].soil_fertility_optimal_low == "1"){
            cropB.soil_fertility_optimal +=  " Low ";
          }
          if (data[i].soil_fertility_absolute_high  == "1"){
            cropB.soil_fertility_absolute += " High ";
          }
          if (data[i].soil_fertility_absolute_moderate == "1"){
            cropB.soil_fertility_absolute +=  " Moderate ";
          }
          if (data[i].soil_fertility_absolute_low == "1"){
            cropB.soil_fertility_absolute +=  " Low ";
          }

          if (data[i].soil_salinity_optimal_high  == "1"){
            cropB.soil_salinity_optimal += " High ";
          }
          if (data[i].soil_salinity_optimal_moderate == "1"){
            cropB.soil_salinity_optimal +=  " Moderate ";
          }
          if (data[i].soil_salinity_optimal_low == "1"){
            cropB.soil_salinity_optimal +=  " Low ";
          }
          if (data[i].soil_salinity_absolute_high  == "1"){
            cropB.soil_salinity_absolute += " High ";
          }
          if (data[i].soil_salinity_absolute_moderate == "1"){
            cropB.soil_salinity_absolute +=  " Moderate ";
          }
          if (data[i].soil_salinity_absolute_low == "1"){
            cropB.soil_salinity_absolute +=  " Low ";
          }

          if (data[i].soil_texture_optimal_heavy == "1"){
            cropB.soil_texture_optimal +=  " Heavy ";
          }
          if (data[i].soil_texture_optimal_medium == "1"){
            cropB.soil_texture_optimal +=  " Medium ";
          }
          if (data[i].soil_texture_optimal_light == "1"){
            cropB.soil_texture_optimal +=  " Light ";
          }
          if (data[i].soil_texture_absolute_heavy == "1"){
            cropB.soil_texture_absolute +=  " Heavy ";
          }
          if (data[i].soil_texture_absolute_medium == "1"){
            cropB.soil_texture_absolute +=  " Medium ";
          }
          if (data[i].soil_texture_absolute_light == "1"){
            cropB.soil_texture_absolute +=  " Light ";
          }
          /*  
Use in charts of Latitude
              cropB.latitude_absolute_max = data[i].latitude_absolute_max;
              cropB.latitude_absolute_mean = data[i].latitude_absolute_mean;
              cropB.latitude_absolute_min = data[i].latitude_absolute_min;
              cropB.latitude_optimal_max = data[i].latitude_optimal_max;
              cropB.latitude_optimal_mean = data[i].latitude_optimal_mean;
              cropB.latitude_optimal_min = data[i].latitude_optimal_min;
  Use in charts of Rainfall
              cropB.rainfall_optimal_max = data[i].rainfall_optimal_max;
              cropB.rainfall_optimal_mean = data[i].rainfall_optimal_mean;
              cropB.rainfall_optimal_min = data[i].rainfall_optimal_min;
              cropB.rainfall_absolute_max = data[i].rainfall_absolute_max;
              cropB.rainfall_absolute_mean = data[i].rainfall_absolute_mean;
              cropB.rainfall_absolute_min = data[i].rainfall_absolute_min;
              
  Use in charts of Soil PH
              cropB.soil_ph_optimal_max = data[i].soil_ph_optimal_max;
              cropB.soil_ph_optimal_mean = data[i].soil_ph_optimal_mean;
              cropB.soil_ph_optimal_min = data[i].soil_ph_optimal_min;
              cropB.soil_ph_absolute_max = data[i].soil_ph_absolute_max;
              cropB.soil_ph_absolute_mean = data[i].soil_ph_absolute_mean;
              cropB.soil_ph_absolute_min = data[i].soil_ph_absolute_min;
              
  Use in Temperature Charts
              cropB.temperature_optimal_max = data[i].temperature_optimal_max;
            cropB.temperature_optimal_mean = data[i].temperature_optimal_mean;
            cropB.temperature_optimal_min = data[i].temperature_optimal_min;
            cropB.temperature_absolute_max = data[i].temperature_absolute_max;
            cropB.temperature_absolute_mean = data[i].temperature_absolute_mean;
            cropB.temperature_absolute_min = data[i].temperature_absolute_min;
  
  
            cropB.texture_clay_max = data[i].texture_clay_max;
            cropB.texture_clay_mean = data[i].texture_clay_mean;
            cropB.texture_clay_min = data[i].texture_clay_min;
            cropB.texture_sand_max = data[i].texture_sand_max;
            cropB.texture_sand_mean = data[i].texture_sand_mean;
            cropB.texture_sand_min = data[i].texture_sand_min;
            cropB.texture_silt_max = data[i].texture_silt_max;
            cropB.texture_silt_mean = data[i].texture_silt_mean;
            cropB.texture_silt_min = data[i].texture_silt_min;
  
  
  
  Nutrients         
  ///id have meaning KIV   //////
            cropB.plant_part_id = data[i].plant_part_id; 
            cropB.calcium_ca_mean = data[i].calcium_ca_mean;
            cropB.copper_cu_mean = data[i].copper_cu_mean;
            cropB.iron_fe_mean = data[i].iron_fe_mean;
            cropB.magnesium_mg_mean = data[i].magnesium_mg_mean;
            cropB.manganese_mn_mean = data[i].manganese_mn_mean;
            cropB.phosphorus_p_mean = data[i].phosphorus_p_mean;
            cropB.potassium_k_mean = data[i].potassium_k_mean;
            cropB.selenium_mean = data[i].selenium_mean;
            cropB.sodium_mean = data[i].sodium_mean;
            cropB.zinc_zn_mean = data[i].zinc_zn_mean;
            cropB.ash_mean = data[i].ash_mean;
            cropB.carbohydrates_cho_mean = data[i].carbohydrates_cho_mean;
            cropB.fat_mean = data[i].fat_mean;
            cropB.fiber_total_dietary_fiber_mean =
              data[i].fiber_total_dietary_fiber_mean;
            cropB.protein_mean = data[i].protein_mean;
            cropB.water_moisture_mean = data[i].water_moisture_mean;
  
  */
        }
      }

      // CROP A
      $("#commonname1").html(cropA.common_name);
      $("#varlndrce1").html(cropA.name_var_lndrce);
      $("#scientific1").html(cropA.scientific_name);
      $("#family1").html(cropA.family);
      $("#genus1").html(cropA.genus);
      $("#species1").html(cropA.species);
      $("#location1").html(cropA.location);
      $("#zone1").html(cropA.zone);
      $("#climate1").html(cropA.climate_zone);
      $("#maxabsalt1").html(cropA.altitude_absolute_max);
      $("#minlightopt1").html(cropA.light_optimal_min);
      $("#maxlightopt1").html(cropA.light_optimal_max);
      $("#minlightabs1").html(cropA.light_absolute_min);
      $("#maxlightabs1").html(cropA.light_absolute_max);
      $("#photoprd1").html(cropA.photoperiod);
      $("#optsoildeep1").html(cropA.soil_depth_optimal);
      $("#abssoildeep1").html(cropA.soil_depth_absolute);
      $("#optsoilfert1").html(cropA.soil_fertility_optimal);
      $("#abssoilfert1").html(cropA.soil_fertility_absolute);
      $("#optsoilsal1").html(cropA.soil_salinity_optimal);
      $("#abssoilsal1").html(cropA.soil_salinity_absolute);
      $("#optsoiltext1").html(cropA.soil_texture_optimal);
      $("#abssoiltext1").html(cropA.soil_texture_absolute);

      // CROP B
      $("#commonname2").html(cropB.common_name);
      $("#varlndrce2").html(cropB.name_var_lndrce);
      $("#scientific2").html(cropB.scientific_name);
      $("#family2").html(cropB.family);
      $("#genus2").html(cropB.genus);
      $("#species2").html(cropB.species);
      $("#location2").html(cropB.location);
      $("#zone2").html(cropB.zone);
      $("#climate2").html(cropB.climate_zone);
      $("#maxabsalt2").html(cropB.altitude_absolute_max);
      $("#minlightopt2").html(cropB.light_optimal_min);
      $("#maxlightopt2").html(cropB.light_optimal_max);
      $("#minlightopt2").html(cropB.light_absolute_min);
      $("#maxlightabs2").html(cropB.light_absolute_max);
      $("#photoprd2").html(cropB.photoperiod);
      $("#optsoildeep2").html(cropB.soil_depth_optimal);
      $("#abssoildeep2").html(cropB.soil_depth_absolute);
      $("#optsoilfert2").html(cropB.soil_fertility_optimal);
      $("#abssoilfert2").html(cropB.soil_fertility_absolute);
      $("#optsoilsal2").html(cropB.soil_salinity_optimal);
      $("#abssoilsal2").html(cropB.soil_salinity_absolute);
      $("#optsoiltext2").html(cropB.soil_texture_optimal);
      $("#abssoiltext2").html(cropB.soil_texture_absolute);
    }
  });
});
