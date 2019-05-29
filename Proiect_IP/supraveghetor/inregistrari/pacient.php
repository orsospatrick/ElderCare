<html>

<head>
	<title>Inregistrare pacient</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../admin/images2/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/fonts2/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/fonts2/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/vendor2/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../admin/css2/util.css">
	<link rel="stylesheet" type="text/css" href="../admin/css2/main.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body style="background-color: #666666">
	<?php
	include '../NavBar.php';
	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
					<?php

					$errors = "success";
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
					if (isset($_POST["inregistrare"])) {
						$utilizator = mysqli_real_escape_string($con, $_POST["utilizator"]);
						$parola = mysqli_real_escape_string($con, md5($_POST["parola"]));
						$nume = mysqli_real_escape_string($con, $_POST["nume"]);
						$prenume = mysqli_real_escape_string($con, $_POST["prenume"]);
						$cnp = mysqli_real_escape_string($con, $_POST["cnp"]);
						$gen = mysqli_real_escape_string($con, $_POST["gen"]);
						$data=mysqli_real_escape_string($con, $_POST["date"]);
						$email = mysqli_real_escape_string($con, $_POST["email"]);
						$telefon = mysqli_real_escape_string($con, $_POST["telefon"]);
						$tara = mysqli_real_escape_string($con, $_POST["tara"]);
						$judet = mysqli_real_escape_string($con, $_POST["judet"]);
						$oras = mysqli_real_escape_string($con, $_POST["oras"]);
						$stradaNumar = mysqli_real_escape_string($con, $_POST["stradaNumar"]);
						$profesie = mysqli_real_escape_string($con, $_POST["profesie"]);
						$loc_munca = mysqli_real_escape_string($con, $_POST["loc_munca"]);


						if ((empty($utilizator) && $utilizator!="0") || (empty($parola) && $parola!="0") || (empty($nume) && $nume!="0")
						 || (empty($prenume) && $prenume!="0") || (empty($cnp) && $cnp!="0") || (empty($gen) && $gen!="0")
						 || (empty($data) && $data!="0") || (empty($email) && $email!="0") || (empty($telefon) && $telefon!="0")
						 || (empty($tara) && $tara!="0") || (empty($judet) && $judet!="0") || (empty($oras) && $oras!="0")
						 || (empty($stradaNumar) && $stradaNumar!="0") || (empty($profesie) && $profesie!="0") || (empty($loc_munca) && $loc_munca!="0")) {
							echo "<div class='alert alert-danger' role='alert'>";
							echo $errors = "Completati toate campurile!";
							echo "</div>";
						}
						if ($errors == "success") {
							$tip = "pacient";
							$adresa = $tara . " " . $judet . " " . $oras . " " . " " . $stradaNumar;
							$sql = "INSERT INTO utilizator(utilizator,parola,tip,nume,prenume,cnp,data_nasterii,sex,adresa,telefon,email,profesie,loc_munca)
								 VALUES('$utilizator','$parola','$tip','$nume','$prenume','$cnp','$data','$gen','$adresa','$telefon','$email','$profesie','$loc_munca')";
							$query = mysqli_query($con, $sql);
							
							$sql = "SELECT id FROM utilizator WHERE tip='pacient' ORDER BY id DESC";
							$result = $con->query($sql);
							$row = $result->fetch_assoc();
							$id = $row["id"];

							$sql = "INSERT INTO pacient_valori_senzori(id_pacient) VALUE('$id')";
							$query = mysqli_query($con, $sql);
							
							$id_medic=$_GET["id_medic"];
							$sql = "INSERT INTO medic_pacient(id_medic, id_pacient) VALUE('$id_medic', '$id')";
							$query = mysqli_query($con, $sql);
							echo "<div class='alert alert-success' role='alert'>";
							echo $errors = "Ati introdus cu success!";
							echo "</div>";
						}
					}
					?>
					<span class="login100-form-title p-b-43">
						Introduceti datele pacientului
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="utilizator" autocomplete="off" placeholder="Utilizator">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="parola" autocomplete="off" placeholder="Parola">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="nume" autocomplete="off" placeholder="Nume">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduceti prenumele">
						<input class="input100" type="text" name="prenume" autocomplete="off" placeholder="Prenume">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti telefonul">
						<input class="input100" type="text" name="telefon" autocomplete="off" placeholder="Telefon">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti CNP-ul">
						<input class="input100" type="text" name="cnp" autocomplete="off" placeholder="CNP">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input">
							<div class="row" >
								<div class="col-md-6 col-sm-6 col-xs-12">
										<div class="form-group" style="width:450px;">
											<!-- Date input -->
											<input class="input100" id="date" style="margin-top:9px" name="date" placeholder="Data nasterii" type="text" />
											<span class="focus-input100"></span>
										</div>
								</div>
							</div>						
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti genul">
						<input class="input100" type="text" name="gen" autocomplete="off" placeholder="Gen">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduceti adresa de email">
						<input class="input100" type="text" name="email" autocomplete="off" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduceti tara">
						<input class="input100" type="text" name="tara" autocomplete="taraJudet" placeholder="Tara">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="judet" autocomplete="off" placeholder="Judet">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Introduceti tara si judetul">
						<input class="input100" type="text" name="oras" autocomplete="taraJudet" placeholder="Oras">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="stradaNumar" autocomplete="off" placeholder="Strada si numar">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti profesia">
						<input class="input100" type="text" name="profesie" autocomplete="off" placeholder="Profesie">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Introduceti locul de munca">
						<input class="input100" type="text" name="loc_munca" autocomplete="off" placeholder="Locul de munca">
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