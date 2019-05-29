<html>

<head>
	<title>Setare senzori</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../admin/images2/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/fonts2/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/fonts2/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor2/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/css2/util.css">
	<link rel="stylesheet" type="text/css" href="./admin/css2/main.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body style="background-color: #666666">
	<?php
	include './NavBar.php';
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<?php

					$errors = "success";
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
					if (isset($_POST["inregistrare"])) {
						$minTemperatura = mysqli_real_escape_string($con, $_POST["minTemperatura"]);
						$maxTemperatura = mysqli_real_escape_string($con, $_POST["maxTemperatura"]);
						$minUmiditate = mysqli_real_escape_string($con, $_POST["minUmiditate"]);
						$maxUmiditate = mysqli_real_escape_string($con, $_POST["maxUmiditate"]);
						$minPuls = mysqli_real_escape_string($con, $_POST["minPuls"]);
						$maxPuls = mysqli_real_escape_string($con, $_POST["maxPuls"]);

                        if ((empty($minTemperatura) && $minTemperatura!="0") || (empty($maxTemperatura) && $maxTemperatura!="0") || (empty($minUmiditate) && $minUmiditate!="0")
                        || (empty($maxUmiditate) && $maxUmiditate!="0") || (empty($minPuls) && $minPuls!="0") || (empty($maxPuls) && $maxPuls!="0")) {
							echo "<div class='alert alert-danger' role='alert'>";
							echo $errors = "Completati toate campurile!";
							echo "</div>";
						}
						if ($errors == "success") {
							$id_pacient = $_GET["id_click"];
                            $sql = "UPDATE pacient_valori_senzori
                                    SET min_temperatura='$minTemperatura', max_temperatura='$maxTemperatura', min_umiditate='$minUmiditate', max_umiditate='$maxUmiditate', min_puls='$minPuls', max_puls='$maxPuls'
                                    WHERE id_pacient='$id_pacient'";
                            $query = mysqli_query($con, $sql);
                            
							echo "<div class='alert alert-success' role='alert'>";
							echo $errors = "Ati introdus cu success!";
							echo "</div>";
						}
					}
					?>
					<span class="login100-form-title p-b-43">
						Introduceti datele considerate normale pentru senzori
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="minTemperatura" autocomplete="off" placeholder="Minim pentru temperatura (°C)">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="maxTemperatura" autocomplete="off" placeholder="Maximul pentru temperatura (°C)">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="minUmiditate" autocomplete="off" placeholder="Minimul pentru umiditate (%)">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti prenumele">
						<input class="input100" type="text" name="maxUmiditate" autocomplete="off" placeholder="Maximul pentru umiditate (%)">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti telefonul">
						<input class="input100" type="text" name="minPuls" autocomplete="off" placeholder="Minimul pentru puls (BPM)">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti CNP-ul">
						<input class="input100" type="text" name="maxPuls" autocomplete="off" placeholder="Maximul pentru puls (BPM)">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn" id="inregistrareBtn">
						<button class="login100-form-btn" name="inregistrare">
							Inregistrare
						</button>
					</div>
				</form>


			</div>
		</div>
	</div>
	</div>





	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Include jQuery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

</body>

</html>

<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy/mm/dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>