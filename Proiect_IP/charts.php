<script>
	window.onload = function() {

		var chartTemperatura = new CanvasJS.Chart("chartContainerTemperatura", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: false,
			title: {
				text: "Temperatura"
			},
			subtitles: [{
				text: "Evolutia temperaturii in timp"
			}],
			axisX: {
				lineColor: "black",
				labelFontColor: "black"
			},
			axisY2: {
				gridThickness: 0,
				title: "Grade celsius",
				suffix: "",
				titleFontColor: "black",
				labelFontColor: "black"
			},
			legend: {
				cursor: "pointer",
				itemmouseover: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
					e.chart.render();
				},
				itemmouseout: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
					e.chart.render();
				},
				itemclick: function(e) {
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			toolTip: {
				shared: true
			},
			data: [{
				type: "spline",
				name: "Temperatura",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "###°C",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Temperatura"];
						$pieces = explode(" ", $string);
						$part1 = $pieces[0];
						$part2 = $pieces[1];
						$pieces = explode("-", $part1);
						$year = $pieces[0];
						$month = $pieces[1] - 1;
						$day = $pieces[2];
						$pieces = explode(":", $part2);
						$hour = $pieces[0];
						$minute = $pieces[1];
						$second = $pieces[2];
						echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: " . $lumina . " },";
					}
					?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartPuls = new CanvasJS.Chart("chartContainerPuls", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: false,
			title: {
				text: "Puls"
			},
			subtitles: [{
				text: "Evolutia pulsului in timp"
			}],
			axisX: {
				lineColor: "black",
				labelFontColor: "black"
			},
			axisY2: {
				gridThickness: 0,
				title: "BPM",
				suffix: "",
				titleFontColor: "black",
				labelFontColor: "black"
			},
			legend: {
				cursor: "pointer",
				itemmouseover: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
					e.chart.render();
				},
				itemmouseout: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
					e.chart.render();
				},
				itemclick: function(e) {
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			toolTip: {
				shared: true
			},
			data: [{
				type: "spline",
				name: "Pulsul",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "###0 BPM",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Puls"];
						$pieces = explode(" ", $string);
						$part1 = $pieces[0];
						$part2 = $pieces[1];
						$pieces = explode("-", $part1);
						$year = $pieces[0];
						$month = $pieces[1] - 1;
						$day = $pieces[2];
						$pieces = explode(":", $part2);
						$hour = $pieces[0];
						$minute = $pieces[1];
						$second = $pieces[2];
						echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: " . $lumina . " },";
					}
					?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartUmiditate = new CanvasJS.Chart("chartContainerUmiditate", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: false,
			title: {
				text: "Umiditate"
			},
			subtitles: [{
				text: "Evolutia umiditatii in timp"
			}],
			axisX: {
				lineColor: "black",
				labelFontColor: "black"
			},
			axisY2: {
				gridThickness: 0,
				title: "%",
				suffix: "",
				titleFontColor: "black",
				labelFontColor: "black"
			},
			legend: {
				cursor: "pointer",
				itemmouseover: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
					e.chart.render();
				},
				itemmouseout: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
					e.chart.render();
				},
				itemclick: function(e) {
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			toolTip: {
				shared: true
			},
			data: [{
				type: "spline",
				name: "Umiditatea",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "#,##0.0\"%\"",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Umiditate"];
						$pieces = explode(" ", $string);
						$part1 = $pieces[0];
						$part2 = $pieces[1];
						$pieces = explode("-", $part1);
						$year = $pieces[0];
						$month = $pieces[1] - 1;
						$day = $pieces[2];
						$pieces = explode(":", $part2);
						$hour = $pieces[0];
						$minute = $pieces[1];
						$second = $pieces[2];
						echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: " . $lumina . " },";
					}
					?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartProximitate = new CanvasJS.Chart("chartContainerProximitate", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: false,
			title: {
				text: "Proximitate"
			},
			subtitles: [{
				text: "Evolutia proximitatii"
			}],
			axisX: {
				lineColor: "black",
				labelFontColor: "black"
			},
			axisY2: {
				gridThickness: 0,
				title: "Da sau nu",
				suffix: "",
				titleFontColor: "black",
				labelFontColor: "black"
			},
			legend: {
				cursor: "pointer",
				itemmouseover: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
					e.chart.render();
				},
				itemmouseout: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
					e.chart.render();
				},
				itemclick: function(e) {
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			toolTip: {
				shared: true
			},
			data: [{
				type: "spline",
				name: "Proximitatea",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "#0",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Proximitate"];
						$pieces = explode(" ", $string);
						$part1 = $pieces[0];
						$part2 = $pieces[1];
						$pieces = explode("-", $part1);
						$year = $pieces[0];
						$month = $pieces[1] - 1;
						$day = $pieces[2];
						$pieces = explode(":", $part2);
						$hour = $pieces[0];
						$minute = $pieces[1];
						$second = $pieces[2];
						echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: " . $lumina . " },";
					}
					?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartGaz = new CanvasJS.Chart("chartContainerGaz", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: false,
			title: {
				text: "Gaz"
			},
			subtitles: [{
				text: "Evolutia nivelului de gaz in timp"
			}],
			axisX: {
				lineColor: "black",
				labelFontColor: "black"
			},
			axisY2: {
				gridThickness: 0,
				title: "Da sau nu",
				suffix: "",
				titleFontColor: "black",
				labelFontColor: "black"
			},
			legend: {
				cursor: "pointer",
				itemmouseover: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness * 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize + 2;
					e.chart.render();
				},
				itemmouseout: function(e) {
					e.dataSeries.lineThickness = e.chart.data[e.dataSeriesIndex].lineThickness / 2;
					e.dataSeries.markerSize = e.chart.data[e.dataSeriesIndex].markerSize - 2;
					e.chart.render();
				},
				itemclick: function(e) {
					if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
						e.dataSeries.visible = false;
					} else {
						e.dataSeries.visible = true;
					}
					e.chart.render();
				}
			},
			toolTip: {
				shared: true
			},
			data: [{
				type: "spline",
				name: "Gaz",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "#0",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"]; // id nush ce
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Gaz"];
						$pieces = explode(" ", $string);
						$part1 = $pieces[0];
						$part2 = $pieces[1];
						$pieces = explode("-", $part1);
						$year = $pieces[0];
						$month = $pieces[1] - 1;
						$day = $pieces[2];
						$pieces = explode(":", $part2);
						$hour = $pieces[0];
						$minute = $pieces[1];
						$second = $pieces[2];
						echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: " . $lumina . " },";
					}
					?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		chartTemperatura.render();
		chartPuls.render();
		chartUmiditate.render();
		chartProximitate.render();
		chartGaz.render();
	}
</script>

<!DOCTYPE html>
<html>

<head>
	<title>Administrator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./clickable.js">
</head>

<body>
	<?php
	include './NavBar.php';
	?>
	<div class="limiter">
			<div id="chartContainerTemperatura" style="height: 370px; width: 100%;"></div>
			<div id="chartContainerPuls" style="height: 370px; width: 100%;"></div>
			<div id="chartContainerUmiditate" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<div id="chartContainerProximitate" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<div id="chartContainerGaz" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	</div>
</body>
</html>