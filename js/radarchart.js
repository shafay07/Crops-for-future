$(document).ready(function() {
  $("#compare_btn").click(function() {
    cropr1 = $("#search1").val();
    cropr2 = $("#search2").val();
    $.ajax({
      url: `api/data.php`,
      data: { cropA: cropr1, cropB: cropr2 },
      type: "POST",
      success: function(data) {
        var value = {
          ARain: [],
          BRain: [],
          ATemp: [],
          BTemp: [],
          ASoil: [],
          BSoil: []
        };

        let len = data.length;
        for (var i = 0; i < len; i++) {
          if (data[i].name_var_lndrce == cropr1) {
            value.ARain.push(data[i].rainfall_optimal_max);
            value.ARain.push(data[i].rainfall_optimal_mean);
            value.ARain.push(data[i].rainfall_optimal_min);
            value.ARain.push(data[i].rainfall_absolute_max);
            value.ARain.push(data[i].rainfall_absolute_mean);
            value.ARain.push(data[i].rainfall_absolute_min);

            value.ATemp.push(data[i].temperature_optimal_max);
            value.ATemp.push(data[i].temperature_optimal_mean);
            value.ATemp.push(data[i].temperature_optimal_min);
            value.ATemp.push(data[i].temperature_absolute_max);
            value.ATemp.push(data[i].temperature_absolute_mean);
            value.ATemp.push(data[i].temperature_absolute_min);

            value.ASoil.push(data[i].soil_ph_optimal_max);
            value.ASoil.push(data[i].soil_ph_optimal_mean);
            value.ASoil.push(data[i].soil_ph_optimal_min);
            value.ASoil.push(data[i].soil_ph_absolute_max);
            value.ASoil.push(data[i].soil_ph_absolute_mean);
            value.ASoil.push(data[i].soil_ph_absolute_min);
          } else if (data[i].name_var_lndrce == cropr2) {
            value.BRain.push(data[i].rainfall_optimal_max);
            value.BRain.push(data[i].rainfall_optimal_mean);
            value.BRain.push(data[i].rainfall_optimal_min);
            value.BRain.push(data[i].rainfall_absolute_max);
            value.BRain.push(data[i].rainfall_absolute_mean);
            value.BRain.push(data[i].rainfall_absolute_min);

            value.BTemp.push(data[i].temperature_optimal_max);
            value.BTemp.push(data[i].temperature_optimal_mean);
            value.BTemp.push(data[i].temperature_optimal_min);
            value.BTemp.push(data[i].temperature_absolute_max);
            value.BTemp.push(data[i].temperature_absolute_mean);
            value.BTemp.push(data[i].temperature_absolute_min);

            value.BSoil.push(data[i].soil_ph_optimal_max);
            value.BSoil.push(data[i].soil_ph_optimal_mean);
            value.BSoil.push(data[i].soil_ph_optimal_min);
            value.BSoil.push(data[i].soil_ph_absolute_max);
            value.BSoil.push(data[i].soil_ph_absolute_mean);
            value.BSoil.push(data[i].soil_ph_absolute_min);
          }
        }

        //get canvas
        var ctx1 = document.getElementById("rainfall").getContext("2d");
        var ctx2 = document.getElementById("temperature").getContext("2d");
        var ctx3 = document.getElementById("soilph").getContext("2d");

        var data1 = {
          labels: [
            "Optimal_max",
            "Optimal_mean",
            "Optimal_min",
            "Absolute_max",
            "Absolute_mean",
            "Absolute_min"
          ],
          datasets: [
            {
              label: cropr1,
              data: value.ARain,
              backgroundColor: "rgba(184, 215, 230, 0.2)",
              borderColor: "rgba(0, 0, 255, 0.5)",
              pointBackgroundColor: "rgba(0,0,255,0.8)"
            },
            {
              label: cropr2,
              data: value.BRain,
              backgroundColor: "rgba(175,239,145,0.2)",
              borderColor: "rgba(0, 255, 0, 0.5)",
              pointBackgroundColor: "rgba(71,128,12,1)"
            }
          ]
        };
        var data2 = {
          labels: [
            "Optimal_max",
            "Optimal_mean",
            "Optimal_min",
            "Absolute_max",
            "Absolute_mean",
            "Absolute_min"
          ],
          datasets: [
            {
              label: cropr1,
              data: value.ATemp,
              backgroundColor: "rgba(184, 215, 230, 0.2)",
              borderColor: "rgba(0, 0, 255, 0.5)",
              pointBackgroundColor: "rgba(0,0,255,0.8)"
            },
            {
              label: cropr2,
              data: value.BTemp,
              backgroundColor: "rgba(175,239,145,0.2)",
              borderColor: "rgba(0, 255, 0, 0.5)",
              pointBackgroundColor: "rgba(71,128,12,1)"
            }
          ]
        };
        var data3 = {
          labels: [
            "Optimal_max",
            "Optimal_mean",
            "Optimal_min",
            "Absolute_max",
            "Absolute_mean",
            "Absolute_min"
          ],
          datasets: [
            {
              label: cropr1,
              data: value.ASoil,
              backgroundColor: "rgba(184, 215, 230, 0.2)",
              borderColor: "rgba(0, 0, 255, 0.5)",
              pointBackgroundColor: "rgba(0,0,255,0.8)"
            },
            {
              label: cropr2,
              data: value.BSoil,
              backgroundColor: "rgba(175,239,145,0.2)",
              borderColor: "rgba(0, 255, 0, 0.5)",
              pointBackgroundColor: "rgba(71,128,12,1)"
            }
          ]
        };

        var chart1 = new Chart(ctx1, {
          type: "radar",
          data: data1,
          options: {
            global: {
              responsive: false,
              maintainAspectRatio: false
            },

            title: {
              display: true,
              positon: "top",
              text: "Rainfall of the Crops",
              fontsize: 18,
              fontColor: "#111"
            },
            legend: {
              display: true,
              position: "top"
            },
            scale: {
              ticks: {
                beginAtZero: true
              }
            }
          }
        });

        var chart2 = new Chart(ctx2, {
          type: "radar",
          data: data2,
          options: {
            global: {
              responsive: false,
              maintainAspectRatio: false
            },

            title: {
              display: true,
              positon: "top",
              text: "Temperature of the Crops",
              fontsize: 18,
              fontColor: "#111"
            },
            legend: {
              display: true,
              position: "top"
            },
            scale: {
              ticks: {
                beginAtZero: true
              }
            }
          }
        });
        var chart3 = new Chart(ctx3, {
          type: "radar",
          data: data3,
          options: {
            global: {
              responsive: false,
              maintainAspectRatio: false
            },

            title: {
              display: true,
              positon: "top",
              text: "Soil PH of the Crops",
              fontsize: 18,
              fontColor: "#111"
            },
            legend: {
              display: true,
              position: "top"
            },
            scale: {
              ticks: {
                beginAtZero: true
              }
            }
          }
        });
      }
    });
  });
});
