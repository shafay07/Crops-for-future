$(document).ready(function() {
  $.ajax({
    url: `http://35.185.57.3/cff/api/data.php`,
    data: {cropA: crop1, cropB: crop2},
    type: "POST",
    success: function(data) {
      var value = {
        Adata: [],
        Bdata: []
      };

      let len = data.length;
      for (var i = 0; i < len; i++) {
        if (data[i].name_var_lndrce == crop1) {
          value.Adata.push(data[i].calcium_ca_mean);
          value.Adata.push(data[i].copper_cu_mean);
          value.Adata.push(data[i].iron_fe_mean);
          value.Adata.push(data[i].magnesium_mg_mean);
          value.Adata.push(data[i].manganese_mn_mean);
          value.Adata.push(data[i].phosphorus_p_mean);
          value.Adata.push(data[i].potassium_k_mean);
          value.Adata.push(data[i].selenium_mean);
          value.Adata.push(data[i].sodium_mean);
          value.Adata.push(data[i].zinc_zn_mean);
        } else if (data[i].name_var_lndrce == crop2) {
          value.Bdata.push(data[i].calcium_ca_mean);
          value.Bdata.push(data[i].copper_cu_mean);
          value.Bdata.push(data[i].iron_fe_mean);
          value.Bdata.push(data[i].magnesium_mg_mean);
          value.Bdata.push(data[i].manganese_mn_mean);
          value.Bdata.push(data[i].phosphorus_p_mean);
          value.Bdata.push(data[i].potassium_k_mean);
          value.Bdata.push(data[i].selenium_mean);
          value.Bdata.push(data[i].sodium_mean);
          value.Bdata.push(data[i].zinc_zn_mean);
        }
      }

      //get canvas
      var ctx = document.getElementById("minerals").getContext("2d");

      var data = {
        labels: [
          "Calcium",
          "Copper",
          "Iron",
          "Magnesium",
          "Manganese",
          "Phosphorus",
          "Potassium",
          "Selenium",
          "Sodium",
          "Zinc"
        ],
        datasets: [
          {
            label: crop1,
            data: value.Adata,
            backgroundColor: "blue",
            borderColor: "lightblue",
            fill: false,
            lineTension: 0.3,
            pointRadius: 5
          },
          {
            label: crop2,
            data: value.Bdata,
            backgroundColor: "green",
            borderColor: "lightgreen",
            fill: false,
            lineTension: 0.3,
            pointRadius: 5
          }
        ]
      };

      var chart = new Chart(ctx, {
        type: "line",
        data: data,
        options: {
          global: {
            responsive: false,
            maintainAspectRatio: false
          },
          title: {
            display: true,
            position: "top",
            text: "Minerals Composition of the Crops",
            fontSize: 18,
            fontColor: "#111"
          },
          legend: {
            display: true,
            position: "top"
          },
          scales: {
            xAxes: [
              {
                beginAtZero: true,
                ticks: {
                  stepSize: 1,
                  min: 0,
                  autoSkip: false
                }
              }
            ]
          }
        }
      });
    }
  });
});
