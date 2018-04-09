//as the page loads this is called
window.onload = function() {
	var result = json_access();
	console.log(result);
	plot(result);
};

function json_access(){
	var x_axis = [];
	var y_axis = [];
	var crop_name = [];

	$(document).ready(function () {
		console.log(climatearray, zonearray, partarray, xVar, yVar, zVar, xCat, yCat, zCat);
		$.ajax({
			url: `api/graphData.php`,
			data: {
				climate: climatearray,
				zone: zonearray,
				part: partarray,
				xAxis: xVar,
				yAxis: yVar,
				zAxis: zVar,
				xCat: xCat,
				yCat: yCat,
				zCat: zCat,
			 },
			type: "POST",
			dataType: "json",
			success: function (data) {
				// begin accessing JSON data here
				console.log(data.length);
				for (i = 0; i < data.length; i++) {
					x_axis[i] = data[i].xvalue;
					y_axis[i] = data[i].yvalue;
					crop_name[i] = data[i].cropname;
				};
			},
			error: function(data){
				console.log(data);
			}

		});
	});
	return [x_axis,y_axis,crop_name];
};
function plot(res) {
	var trace1 = {
		x: res[0],
		y: res[1],
		mode: 'markers',
		type: 'scatter',
		text: res[2],
		marker: {
			size: 12,
			color : 'green'
		}
	};
	var layout = {

	};
	graph_id = document.getElementById('graph');
	data = [trace1];
	Plotly.newPlot(graph_id, data,layout);

};