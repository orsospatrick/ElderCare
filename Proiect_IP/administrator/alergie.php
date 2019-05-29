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
    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="./admin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="./admin/css/main.css">
	<link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    <?php
    include './NavBar.php';
    ?>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form" method="post">
				<?php 
					$errors = "success";
					$id_pacient=$_GET["id_click"];
					$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
					
					if(isset($_POST["adaugareSchema"]))
					{
						$tipAlergie = mysqli_real_escape_string($con, $_POST["tipAlergie"]);
                        $simptome = mysqli_real_escape_string($con, $_POST["simptome"]);
						if(empty($tipAlergie)||empty($simptome))
						{
							echo "<div class='alert alert-danger' role='alert'>";
							echo $errors="Completati toate campurile!"; 
							echo "</div>";
						}
						if($errors=="success")
						{
							$sql = "INSERT INTO alergii(id_pacient, tipAlergie, simptome) VALUES('$id_pacient', '$tipAlergie', '$simptome')";
							$query = mysqli_query($con, $sql);
							echo "<div class='alert alert-success' role='alert'>";
							echo $errors="Ati introdus cu success!"; 
							echo "</div>";
						}
					}
				?>
				<span class="login100-form-title p-b-43">
					Introduceti datele schemei de medicatie
				</span>
				
				<div class="wrap-input100 validate-input" data-validate = "Introduceti prenumele">
					<input class="input100" type="text" name="tipAlergie" autocomplete="off" placeholder="Tip alergie">
					<span class="focus-input100"></span>
                </div>
                
                <div class="wrap-input100 validate-input" data-validate = "Introduceti prenumele">
					<input class="input100" type="text" name="simptome" autocomplete="off" placeholder="Simptome">
					<span class="focus-input100"></span>
				</div>
				<div class="container-login100-form-btn" id="adaugareSchemaBtn" >
					<button class="login100-form-btn" name="adaugareSchema">
						Adaugare alergie
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
</body>