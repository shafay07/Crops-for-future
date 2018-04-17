//as the page loads this is called
$(document).ready(function() {
	var result = json_access();
	console.log(result);
	plot(result);
});

//brings the subseted data
function json_access(){
	var x_axis = [];
	var y_axis = [];
	var z_axis = [];
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
					z_axis[i] = data[i].zvalue;
					crop_name[i] = data[i].cropname;
				};
			},
			error: function(data){
				console.log(data);
			}

		});
	});
	return [x_axis,y_axis,z_axis,crop_name,xCat,yCat];
};


//plotly graph
function plot(res) {

	var graph_id = [];
	graph_id[0] = document.getElementById('graph');
	graph_id[1] = document.getElementById('graph1');
	graph_id[2] = document.getElementById('graph2');
	graph_id[3] = document.getElementById('graph3');

	var trace1 = {
		x: res[0],
		y: res[1],
		mode: 'markers',
		type: 'scatter',
		text: res[3],
		marker:{
			color: 'rgb(158, 180, 72)',
			size:10,
		},
	};
	var layout1 = {
		hovermode:'closest'
	};
	//second type, histogram
	var trace2 = {
		x: res[0],
		y: res[1],
		//mode: 'markers',
		type: 'histogram',
		marker: {
			color:'rgb(234, 167, 66)',
		}
	};
	var layout2 = {
		visible: true
	};
	//third type, box graph
	var trace3 = [
	{
		x : res[0],
		name : res[4],
		type: 'box'
	},
	{
		x : res[1],
		name : res[5],
		type :'box'
	}
]

	var layout3 = {

	};
	//fourth type of graph
	var trace4 = {
		x: res[0],
		y: res[1],
		z: res[2],
		mode: 'markers',
		marker: {
		color: 'rgba(0, 0, 155,0.5)',
		size: 7,
		line: {
		color: 'rgba(14, 65, 40,0.5)',
	},
		opacity: 1
	},
	type: 'scatter3d',
	text: res[3],
	};

	var layout4 = {
		hovermode:'closest'
	};


	data1 = [trace1];
	data2 = [trace2];
	data3 = trace3;
	data4 = [trace4];
	Plotly.newPlot(graph_id[0], data1,layout1);
	Plotly.newPlot(graph_id[1], data2,layout2);
	Plotly.newPlot(graph_id[2], data3,layout3);
	Plotly.newPlot(graph_id[3], data4,layout4);

};
