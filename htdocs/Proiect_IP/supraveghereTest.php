<?php
    $errorTemperatura = "success"; //succes->adica totul este ok altfel mesaj corespunzator
    $errorPuls = "success";
    $errorGaz = "success";
    $errorUmiditate = "success";
    $errorProximitate = "success";
	$id = $_GET["id_click"];
    $page = $_SERVER['PHP_SELF']; 
    $page = $page . "?id_click=" . $id . "&errorTemperatura=" . $errorTemperatura . "&errorPuls=" . $errorPuls . "&errorGaz=" . $errorGaz . "&errorGaz=" . $errorGaz . "&errorProximitate=" . $errorProximitate;
	$sec = "2";
	$push_sec="10000";
	$push_temp=0;
	$push_umiditate=0;
	$push_puls=0;
	$push_proximitate=0;
	$click_temp=0;
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
				yValueFormatString: "#,##°C",
				showInLegend: true,
				dataPoints: [
					<?php
            $id = $_GET["id_click"];
            $con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
            $sql = "SELECT *FROM dateesp WHERE id=$id";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $string = $row["DataTimp"];
                $lumina = $row["Temperatura"];
                if ($lumina>2) {
					$errorTemperatura = "Temperatura este prea mare!";
                }
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
                echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: ". $lumina ." },";
            }
            ?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartPuls = new CanvasJS.Chart("chartContainerPuls", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: true,
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
				name: "Lumina",
				markerSize: 10,
				axisYType: "secondary",
				xValueFormatString: "YYYY-MM-DD HH:mm:ss", //2019-04-29 16:41:12
				yValueFormatString: "#,## BPM",
				showInLegend: true,
				dataPoints: [
					<?php
            $id = $_GET["id_click"];
            $con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
            $sql = "SELECT *FROM dateesp WHERE id=$id";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $string = $row["DataTimp"];
                $lumina = $row["Puls"];
                if ($lumina>2) {
                    $errorPuls = "Pulsul este prea mare!";
                }
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
                echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: ". $lumina ." },";
            }
            ?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartUmiditate = new CanvasJS.Chart("chartContainerUmiditate", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: true,
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
            $con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
            $sql = "SELECT *FROM dateesp WHERE id=$id";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $string = $row["DataTimp"];
                $lumina = $row["Umiditate"];
                if ($lumina>2) {
                    $errorUmiditate = "Umiditatea este prea mare!";
                }
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
                echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: ". $lumina ." },";
            }
            ?>
					//{ x: new Date(2000 , 02, 02), y: 26.8 },
				]
			}]
		});
		var chartProximitate = new CanvasJS.Chart("chartContainerProximitate", {
			//theme: "light2", // "light1", "light2", "dark1", "dark2"
			animationEnabled: true,
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
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: [
					<?php
            $id = $_GET["id_click"];
            $con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
            $sql = "SELECT *FROM dateesp WHERE id=$id";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $string = $row["DataTimp"];
                $lumina = $row["Proximitate"];
                if ($lumina=="0") {
                    $errorProximitate = "Pacientul este absent!";
                }
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
                echo "{ x: new Date(" . $year . ", " . $month . ", " . $day . ", " . $hour . ", " . $minute . ", " . $second . "), y: ". $lumina ." },";
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
	}
</script>


<!--Aici bootstrap si html-->
<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./clickable.js">
	<!-- Aici apelez refresh-ul la pagina -->	
		<meta http-equiv="refresh"
		content="<?php 
	
			echo $sec;
		?>;
		URL='<?php echo $page?>'">
		<?php
$id = $_GET["id_click"];
$con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
$sql = "SELECT telefon FROM utilizator WHERE id=$id";
$res = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$telefon = $row["telefon"];
	}
	?>
</head>
<body>
	<a href="tel: '<?php echo $_GET['telefon'];?>' "> Apeleaza pacientul: <?= $telefon ?></a>
	
	<?php
    include './NavBar_supraveghetor.php';
	?>
<form method="post">
	<div class="limiter">
		<?php
        if (isset($_GET["id_click"])) :
            ?>
		<?php
            $id = $_GET["id_click"];
            $con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
            $sql = "SELECT *FROM dateesp WHERE id=$id";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {
                $id_click2 = $row["DataTimp"];
                echo $id_click2;
            }
            
            if ($errorTemperatura!="success") {
                echo "<div class='alert alert-danger' role='alert'>";
				echo "<center  data-toggle='modal' data-target='#exampleModalTemperatura'>" . $errorTemperatura . "</center>";
				echo "</div>";
            }
            if ($errorPuls!="success") {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalPuls'>" . $errorPuls . "</center>";
                echo "</div>";
            }
            if ($errorUmiditate!="success") {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalUmiditate'>" . $errorUmiditate . "</center>";
                echo "</div>";
            }
            if ($errorProximitate!="success") {
                echo "<div class='alert alert-danger' role='alert'>";
                echo "<center data-toggle='modal' data-target='#exampleModalProximitate'>" . $errorProximitate . "</center>";
                echo "</div>";
			}
			?>
			
		<div id="chartContainerTemperatura" style="height: 370px; width: 100%;margin-top:100px"></div>
		<div id="chartContainerPuls" style="height: 370px; width: 100%;"></div>
		<div id="chartContainerUmiditate" style="height: 370px; width: 100%; margin-top:50px;"></div>
		<div id="chartContainerProximitate" style="height: 370px; width: 100%; margin-top:50px;"></div>
		<div id="chartContainerGaz" style="height: 370px; width: 100%; margin-top:50px;"></div>
		<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		<?php endif; ?>

<!--Modal alerta temperatura  -->
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
						<input style="margin-left:10px" type="text" id="detalii_temperatura">
						</div>
					</div>
					<div class="modal-footer">
						<button onclick="location.href='<?php $page ?>'" type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
						 <button onclick=" 'location.href='<?php $page ?> ' "   type="button" class="btn btn-primary" data-dismiss="modal" name="submit_temp" id="submit_temp" value="post_temp">Confirm</button>
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
						<label for="male">Mesaj catre medic:</label>
						<input style="margin-left:10px" type="text" id="detalii_puls">
						</div>
					</div>
					<div class="modal-footer">

						<button onclick="location.href='<?php $page ?>'" type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
						<button onclick="location.href='<?php $page ?>'" type="button" class="btn btn-primary" data-dismiss="modal" name="submit_puls" id="submit_puls">Confirm</button>
				
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
						<input style="margin-left:10px" type="text" id="detalii_umiditate">
						</div>
					</div>
					<div class="modal-footer">
						<button onclick="location.href='<?php $page ?>'" type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
						<button onclick="location.href='<?php $page ?>'" type="submit" class="btn btn-primary" data-dismiss="modal" name="submit_umiditate" id="submit_umiditate">Confirm</button>
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
						<input style="margin-left:10px" type="text" id="detalii_proximitate">
						</div>
					</div>
					<div class="modal-footer">
						<button onclick="location.href='<?php $page ?>'" type="button" class="btn btn-secondary" data-dismiss="modal">Inchide</button>
						<button onclick="location.href='<?php $page ?>'" type="submit" class="btn btn-primary" data-dismiss="modal" name="submit_temp" id="submit_proximitate">Confirm</button>
					</div>
				</div>
			</div>
		</div>
		<body>
</div>
</form >

<!-- javascript(jquery si ajax)  -->

		<script type="text/javascript">
		$('#exampleModalTemperatura').on('shown.bs.modal', function (e) {
				
		});
		$('#exampleModalTemperatura').on('click','#submit_temp', function () {
			var id_pacient = "<?php echo $id ?>"; 
			var detalii_temperatura=$("#detalii_temperatura").val();
                $.ajax({
                    url:'insert_alarme.php',
                    method:'POST',
                    data:{
                      detalii_temperatura:detalii_temperatura,
					  					id_pacient:id_pacient,
                    },
                });
			});

		$('#exampleModalPuls').on('shown.bs.modal', function (e) {
			window.stop();
		});
	
		$('#exampleModalPuls').on('click','#submit_puls', function () {
			var detalii_puls=$("#detalii_puls").val();
			var id_pacient = "<?php echo $id ?>"; 
                $.ajax({
                    url:'insert_alarme.php',
                    method:'POST',
                    data:{
                      detalii_puls:detalii_puls,
					  					id_pacient:id_pacient,
                    },
                   
                });
			});

		$('#exampleModalUmiditate').on('shown.bs.modal', function (e) {
			window.stop();
		});
		$('#exampleModalUmiditate').on('click','#submit_umiditate', function () {
			var detalii_umiditate=$("#detalii_umiditate").val();
			var id_pacient = "<?php echo $id ?>"; 
                $.ajax({
                    url:'insert_alarme.php',
                    method:'POST',
                    data:{
                      detalii_umiditate:detalii_umiditate,
					  id_pacinet:id_pacient,
                    },
                   
                });
			});
		
		$('#exampleModalProximitate').on('shown.bs.modal', function (e) {
			window.stop();
		});
		$('#exampleModalProximitate').on('click','#submit_proximitate', function () {
			var detalii_proximitate=$("#detalii_proximitate").val();
			var id_pacient = "<?php echo $id ?>"; 
                $.ajax({
                    url:'insert_alarme.php',
                    method:'POST',
                    data:{
                      detalii_temperatura:detalii_proximitate,
					  id_pacient:id_pacient,
                    },
                   
                });
			});
		</script>


<!-- COD POP-UP CHAT-->
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<body>
<button class="open-button" onclick="openForm()">Trimite mesaj pacientului</button>

<div class="chat-popup" id="myForm">
  <form class="form-container">
    <h1>Chat</h1>
    <label for="msg"><b>Mesaj</b></label>
		<textarea placeholder="Scrie..." name="msg" id="message_supraveghetor"  required ></textarea>
		

    <button onclick="closeForm()" type="button" class="btn" id="send_message" >Trimite mesajul</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Inchide</button>
  </form>
</div>

<script type="text/javascript">

        $(document).ready(function(){
            $("#send_message").click(function(){
				var message_supraveghetor=$("#message_supraveghetor").val();
				var id_pacient = "<?php echo $id ?>"; 
                $.ajax({
                    url:'insert_alarme.php',
                    method:'POST',
                    data:{
											message_supraveghetor: message_supraveghetor,
											id_pacient:id_pacient,
										},
										success:function(data){
                       alert(data);
                   }
                });
            });
        });
    </script>
</body>
</html>
