<?php
$errorTemperatura = "success";
$errorPuls = "success";
$errorGaz = "success";
$errorUmiditate = "success";
$errorProximitate = "success";
$id = $_GET["id_click"];
if (isset($_GET["modal"]))
	$modal = $_GET["modal"];
$page = $_SERVER['PHP_SELF'];
$id_supraveghetor = $_GET["id_supraveghetor"];
$page = $page . "?id_click=" . $id . "&id_supraveghetor=" . $id_supraveghetor . "&errorTemperatura=" . $errorTemperatura . "&errorPuls=" . $errorPuls . "&errorGaz=" . $errorGaz . "&errorGaz=" . $errorGaz . "&errorProximitate=" . $errorProximitate;
if (isset($_GET["modal"]))
	$sec = "3000";
else
	$sec = "20";
?>
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
					
					$sql = "SELECT min_temperatura, max_temperatura FROM pacient_valori_senzori WHERE id_pacient=$id";
					$query = mysqli_query($con, $sql);
					$row_senzori = mysqli_fetch_array($query);	

					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id ORDER BY DataTimp DESC limit 20";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Temperatura"];
						$row_senzori["max_temperatura"] = $row_senzori["max_temperatura"] + 1;
						$row_senzori["min_temperatura"] = $row_senzori["min_temperatura"] - 1;
						if ($lumina >= $row_senzori["max_temperatura"] || $lumina <= $row_senzori["min_temperatura"])
							$errorTemperatura = "Temperatura se afla in afara parametrilor optimi!";
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
				yValueFormatString: "### BPM",
				showInLegend: true,
				dataPoints: [
					<?php
					$id = $_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					
					$sql = "SELECT min_puls, max_puls FROM pacient_valori_senzori WHERE id_pacient=$id";
					$query = mysqli_query($con, $sql);
					$row_senzori = mysqli_fetch_array($query);	

					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id ORDER BY DataTimp DESC limit 20";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Puls"];
						$row_senzori["max_puls"] = $row_senzori["max_puls"] + 1;
						$row_senzori["min_puls"] = $row_senzori["min_puls"] - 1;
						if ($lumina >= $row_senzori["max_puls"] || $lumina <= $row_senzori["min_puls"])
							$errorPuls = "Pulsul se afla in afara parametrilor optimi!";
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
					
					$sql = "SELECT min_umiditate, max_umiditate FROM pacient_valori_senzori WHERE id_pacient=$id";
					$query = mysqli_query($con, $sql);
					$row_senzori = mysqli_fetch_array($query);	

					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id ORDER BY DataTimp DESC limit 20";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Umiditate"];
						$row_senzori["max_umiditate"] = $row_senzori["max_umiditate"] + 1;
						$row_senzori["min_umiditate"] = $row_senzori["min_umiditate"] - 1;
						if ($lumina >= $row_senzori["max_umiditate"] || $lumina <= $row_senzori["min_umiditate"])
							$errorUmiditate = "Umiditatea se afla in afara parametrilor optimi!";
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
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id ORDER BY DataTimp DESC limit 20";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Proximitate"];
						if ($lumina == "0")
							$errorProximitate = "Pacientul este absent!";
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
					$sql = "SELECT *FROM dateesp WHERE id_pacient=$id ORDER BY DataTimp DESC limit 20";
					$res = mysqli_query($con, $sql);
					while ($row = mysqli_fetch_array($res)) {
						$string = $row["DataTimp"];
						$lumina = $row["Gaz"];
						if ($lumina > 2)
							$errorGaz = "Nivelul de gaz este prea ridicat!";
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
	<title>Medic</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./clickable.js">
	<meta http-equiv="refresh" content="<?php echo $sec ?>;URL='<?php echo $page ?>'">
</head>

<body>
	<?php
	include './NavBarSupraveghere.php';
	?>
	<div class="limiter">
		<?php
		if (isset($_GET["id_click"])) :
			?>
			<?php
            if($errorTemperatura!="success")
            {
                echo "<a href='$page&modal=1'><div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalTemperatura'>" . $errorTemperatura . "</center>";
                echo "</div></a>";
            }
            if($errorPuls!="success")
            {
                echo "<a href='$page&modal=2'><div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalPuls'>" . $errorPuls . "</center>";
                echo "</div></a>";
            }
            if($errorUmiditate!="success")
            {
                echo "<a href='$page&modal=3'><div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalUmiditate'>" . $errorUmiditate. "</center>";
                echo "</div></a>";
            }
            if($errorProximitate!="success")
            {
                echo "<a href='$page&modal=4'><div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalProximitate'>" . $errorProximitate . "</center>";
                echo "</div>";
            }
            if($errorGaz!="success")
            {
                echo "<a href='$page&modal=5'><div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalGaz'>" . $errorGaz . "</center>";
                echo "</div></a>";
            }
			?>
			<div id="chartContainerTemperatura" style="height: 370px; width: 100%;"></div>
			<div id="chartContainerPuls" style="height: 370px; width: 100%;"></div>
			<div id="chartContainerUmiditate" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<div id="chartContainerProximitate" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<div id="chartContainerGaz" style="height: 370px; width: 100%; margin-top:50px;"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		<?php endif; ?>
	</div>
</body>

</html>

<!--Modal alerta temperatura  -->
</a>		
<div class="modal fade" id="exampleModalTemperatura" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tratarea alarmelor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
								<input type="checkbox" name="checkbox_temperatura" value="checked_temperatura">Reglez temperatura din incapere	
						</div>
						<div style="margin-top:30px">
                        <label for="male">Detalii:</label>
                       
                        <form method="get" action="<?php echo '/Proiect_IP/medic/insert_alarme.php'?>">
                        <input type="textarea rows='4' cols='30'" name="detalii_temperatura" id="detalii_temperatura">
                        
                        <input type="hidden" name="id_pacient" value="<?php echo $_GET['id_click']?>">

                        </div>
                        <?php
                            if(isset($_GET['detalii_temperatura']))
                            {
                                $det_temperatura=$_GET['detalii_temperatura'];
                            }
                        ?>
					</div>
					<div class="modal-footer">
                        <a href="<?php echo $page;?>"><button type="button" class="btn btn-secondary">Inchide</button></a>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
<!-- Modal alerta puls-->
		<div class="modal fade" id="exampleModalPuls" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tratarea alarmelor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
								<input type="checkbox" name="checkbox_puls" value="checked_puls">Comunic medicului
								problema
								pulsului <br>
						</div>
                        <div style="margin-top:30px">
                        <label for="male">Detalii:</label>
                        <form method="get" action="<?php echo '/Proiect_IP/medic/insert_alarme.php'?>">
                        <input style="margin-left:10px" type="text" name="detalii_temperatura" id="detalii_temperatura">
                        
                        <input type="hidden" name="id_pacient" value="<?php echo $_GET['id_click']?>">

                        </div>
                        <?php
                            if(isset($_GET['detalii_temperatura']))
                            {
                                $det_temperatura=$_GET['detalii_temperatura'];
                            }
                        ?>
					</div>
					<div class="modal-footer">

                        <a href="<?php echo $page;?>"><button type="button" class="btn btn-secondary">Inchide</button></a>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
<!--Modal alerta umiditate-->

		<div class="modal fade" id="exampleModalUmiditate" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tratarea alarmelor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							
								<input type="checkbox" name="checkbox_umiditate" value="checked_umiditate">Reglez
								umiditatea din
								camera pornind dezumidificatorul<br>
						</div>
						<div style="margin-top:30px">
						<label for="male">Detalii:</label>
                        <form method="get" action="<?php echo '/Proiect_IP/medic/insert_alarme.php'?>">
                        <input style="margin-left:10px" type="text" name="detalii_temperatura" id="detalii_temperatura">
                        
                        <input type="hidden" name="id_pacient" value="<?php echo $_GET['id_click']?>">

                        </div>
                        <?php
                            if(isset($_GET['detalii_temperatura']))
                            {
                                $det_temperatura=$_GET['detalii_temperatura'];
                            }
                        ?>
					</div>
					<div class="modal-footer">

                        <a href="<?php echo $page;?>"><button type="button" class="btn btn-secondary">Inchide</button></a>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
<!--Modal alerta Proximitate-->
		<div class="modal fade" id="exampleModalProximitate" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tratarea alarmelor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
								<input type="checkbox" name="checkbox_umiditate" value="checked_umiditate">Comunic ingrijitorului faptul ca pacientul este absent<br>
					
						</div>
						<div style="margin-top:30px">
						<label for="male">Detalii:</label>
                        <form method="get" action="<?php echo '/Proiect_IP/medic/insert_alarme.php'?>">
                        <input style="margin-left:10px" type="text" name="detalii_temperatura" id="detalii_temperatura">
                        
                        <input type="hidden" name="id_pacient" value="<?php echo $_GET['id_click']?>">

                        </div>
                        <?php
                            if(isset($_GET['detalii_temperatura']))
                            {
                                $det_temperatura=$_GET['detalii_temperatura'];
                            }
                        ?>
					</div>
					<div class="modal-footer">
                        <a href="<?php echo $page;?>"><button type="button" class="btn btn-secondary">Inchide</button></a>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
					</div>
				</div>
			</div>
        </div>
        <!--Modal alerta Gaz-->
		<div class="modal fade" id="exampleModalGaz" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Tratarea alarmelor</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
								<input type="checkbox" name="checkbox_umiditate" value="checked_umiditate">Voi comunica pacientului,iar daca el nu raspunde sun la pompieri<br>
					
						</div>
						<div style="margin-top:30px">
						<label for="male">Detalii:</label>
                        <form method="get" action="<?php echo '/Proiect_IP/medic/insert_alarme.php'?>">
                        <input style="margin-left:10px" type="text" name="detalii_temperatura" id="detalii_temperatura">
                        
                        <input type="hidden" name="id_pacient" value="<?php echo $_GET['id_click']?>">

                        </div>
                        <?php
                            if(isset($_GET['detalii_temperatura']))
                            {
                                $det_temperatura=$_GET['detalii_temperatura'];
                            }
                        ?>
					</div>
					<div class="modal-footer">

                        <a href="<?php echo $page;?>"><button type="button" class="btn btn-secondary">Inchide</button></a>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                        </form>
					</div>
				</div>
			</div>
		</div>
		<body>
</div>
</form >
 
<script type="text/javascript">
    var id = "<?php Print($modal); ?>";
    if(id==1)
    {
        $(window).on('load',function(){
            $('#exampleModalTemperatura').modal('show');
        });
       
    }
    if(id==2)
    {
        $(window).on('load',function(){
            $('#exampleModalPuls').modal('show');
        });
    }
    if(id==3)
    {
        $(window).on('load',function(){
            $('#exampleModalUmiditate').modal('show');
        });
    }
    if(id==4)
    {
        $(window).on('load',function(){
            $('#exampleModalProximitate').modal('show');
        });
    }
    if(id==5)
    {
        $(window).on('load',function(){
            $('#exampleModalGaz').modal('show');
        });
    }
</script>