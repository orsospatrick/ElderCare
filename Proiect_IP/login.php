<?php 
session_start();

$con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
if(isset($_POST["login"]))
{
	$username = mysqli_real_escape_string($con, $_POST["username"]);
	$password = mysqli_real_escape_string($con, md5($_POST["password"]));

	$sql = "SELECT *FROM utilizator";
	$query = mysqli_query($con, $sql);
	while($row = mysqli_fetch_row($query))
	{
		if($row[1] == $username && ($row[2] == $password)&& ($row[3]=="administrator"))
		{
			header("location:administrator/homeadmin.php");
		}
		if($row[1] == $username && ($row[2] == $password)&& ($row[3]=="medic"))
		{
			header("location:medic/homeadmin.php?id_medic=" . $row[0]);
		}
		if($row[1] == $username && ($row[2] == $password)&& ($row[3]=="supraveghetor"))
		{
			header("location:supraveghetor/homeadmin.php?id_supraveghetor=" . $row[0]);
		}
		if($row[1] == $username && ($row[2] == $password)&& ($row[3]=="ingrijitor"))
		{
			header("location:ingrijitor/homeadmin.php?id_ingrijitor=" . $row[0]);
		}
		if($row[1] == $username && ($row[2] == $password)&& ($row[3]=="pacient"))
		{
			header("location:pacient/homeadmin.php?id_click=" . $row[0]);
		}
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="admin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="administrator/admin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="administrator/admin/css/util.css">
	<link rel="stylesheet" type="text/css" href="administrator/admin/css/main.css">
</head>
<body style="background-color: #666666;">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post">
				<img src="administrator/admin/images/ic_launcher-web.png" class="img-circle" style="height:10%; margin-left:40%; margin-right:70%;">
					<span class="login100-form-title p-b-43">
						<br>Conecteaza-te pentru a continua
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" autocomplete="off" placeholder="Username">
						<span class="focus-input100"></span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
					</div>			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login">
							Conecteaza-te
						</button>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('administrator/admin/images/bg-02.jpg');">
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
</html>