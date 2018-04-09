$(document).ready(function() {
  $.ajax({
    url: `http://localhost/Crops-for-future/api/data.php`,
    data: {cropA: crop1, cropB: crop2},
    type: "POST",
    success: function(data) {
      var value = {
        Adata: [],
        Bdata: [],
        ALat: [],
        BLat: []
      };

      let len = data.length;
      for (var i = 0; i < len; i++) {
        if (data[i].name_var_lndrce == crop1) {
          value.Adata.push(data[i].ash_mean);
          value.Adata.push(data[i].carbohydrates_cho_mean);
          value.Adata.push(data[i].fat_mean);
          value.Adata.push(data[i].fiber_total_dietary_fiber_mean);
          value.Adata.push(data[i].protein_mean);
          value.Adata.push(data[i].water_moisture_mean);
          
          value.ALat.push(data[i].latitude_optimal_max);
          value.ALat.push(data[i].latitude_optimal_mean);
          value.ALat.push(data[i].latitude_optimal_min);

          value.ALat.push(data[i].latitude_absolute_max);
          value.ALat.push(data[i].latitude_absolute_mean);
          value.ALat.push(data[i].latitude_absolute_min);


        } else if (data[i].name_var_lndrce == crop2) {
          value.Bdata.push(data[i].ash_mean);
          value.Bdata.push(data[i].carbohydrates_cho_mean);
          value.Bdata.push(data[i].fat_mean);
          value.Bdata.push(data[i].fiber_total_dietary_fiber_mean);
          value.Bdata.push(data[i].protein_mean);
          value.Bdata.push(data[i].water_moisture_mean);

          value.BLat.push(data[i].latitude_optimal_max);
          value.BLat.push(data[i].latitude_optimal_mean);
          value.BLat.push(data[i].latitude_optimal_min);

          value.BLat.push(data[i].latitude_absolute_max);
          value.BLat.push(data[i].latitude_absolute_mean);
          value.BLat.push(data[i].latitude_absolute_min);
        }
      }

      //get canvas
      var ctx1 = document.getElementById("nutrients").getContext("2d");
      var ctx2 = document.getElementById("latitude").getContext("2d");

      var data1 = {
        labels: [
          "Ash",
          "Carbohydrates",
          "Fat",
          "Fiber",
          "Protein",
          "Water Moisture"
        ],
        datasets: [
          {
            label: crop1,
            data: value.Adata,
            backgroundColor: "rgba(20, 20, 215, 0.8)",
            borderColor: "rgba(255, 255, 255, 0.5)",
            hoverBackgroundColor: "rgba(220,220,220,0.75)",
            hoverBorderColor: "rgba(220,220,220,1)"
          },
          {
            label: crop2,
            data: value.Bdata,
            backgroundColor: "rgba(20, 215,20 ,0.8)",
            borderColor: "rgba(255, 255, 255, 0.5)",
            hoverBackgroundColor: "rgba(220,220,220,0.75)",
            hoverBorderColor: "rgba(220,220,220,1)"
          }
        ]
      };

      var data2 = {
        labels: [
          "Optimal Max",
          "Optimal Mean",
          "Optimal Min",
          "Absolute Max",
          "Absolute Mean",
          "Absolute Min",
        ],
        datasets: [
          {
            label: crop1,
            data: value.ALat,
            backgroundColor: "rgba(20, 20, 215, 0.8)",
            borderColor: "rgba(255, 255, 255, 0.5)",
            hoverBackgroundColor: "rgba(220,220,220,0.75)",
            hoverBorderColor: "rgba(220,220,220,1)"
          },
          {
            label: crop2,
            data: value.BLat,
            backgroundColor: "rgba(20, 215,20 ,0.8)",
            borderColor: "rgba(255, 255, 255, 0.5)",
            hoverBackgroundColor: "rgba(220,220,220,0.75)",
            hoverBorderColor: "rgba(220,220,220,1)"
          }
        ]
      };

      var chart = new Chart(ctx1, {
        type: "bar",
        data: data1,
        options: {
          title: {
            display: true,
            position: "top",
            text: "Nutrients Composition of the Crops",
            fontSize: 18,
            fontColor: "#111"
          }
        }
      });
      var chart = new Chart(ctx2, {
        type: "bar",
        data: data2,
        options: {
          title: {
            display: true,
            position: "top",
            text: "The Latitudes",
            fontSize: 18,
            fontColor: "#111"
          }
        }
      });
    }
  });
});
