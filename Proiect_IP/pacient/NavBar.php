<?php
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
$id = $_GET["id_click"];
$sql = "SELECT id_supraveghetor FROM supraveghetor_pacient WHERE id_pacient=$id";
$result = $con->query($sql);
$res = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
    $id_supraveghetor = $row["id_supraveghetor"];
}

$sql = "SELECT id_medic FROM medic_pacient WHERE id_pacient=$id";
$result = $con->query($sql);
$res = mysqli_query($con, $sql);
while ($row = $result->fetch_assoc()) {
    $id_medic = $row["id_medic"];
}
?>
<section>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/Proiect_IP/pacient/homeadmin.php?id_click=<?php echo $_GET["id_click"] ?>">Istoric date senzori</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<div>
						<a class="nav-link" href="/Proiect_IP/pacient/tiparire.php?id_click=<?php echo $_GET["id_click"] ?>">Vizualizare fisa medicala<span class="sr-only">(current)</span></a>
					</div>
				</li>
				<li class="nav-item active">
					<div>
						<a class="nav-link" href="/Proiect_IP/pacient/vizualizareScheme.php?id_click=<?php echo $_GET["id_click"] ?>">Scheme de medicatie<span class="sr-only">(current)</span></a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Mesaje
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="/Proiect_IP/pacient/chat_medic_pacient.php?id_click=<?php echo $_GET["id_click"] ?>&id_medic=<?php echo $id_medic?>">Medic</a>
						<a class="dropdown-item" href="/Proiect_IP/pacient/chat_supraveghetor_pacient.php?id_click=<?php echo $_GET["id_click"] ?>&id_supraveghetor=<?php echo $id_supraveghetor?>">Supraveghetor</a>
					</div>
				</li>
				<li class="nav-item active">
					<div>
						<a class="nav-link" href="/Proiect_IP/login.php">Delogare<span class="sr-only">(current)</span></a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</section>