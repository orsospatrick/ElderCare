<?php
$id = $_GET["id_click"];
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
$sql = "SELECT telefon FROM utilizator WHERE id=$id";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($res)) {
    $telefon = $row["telefon"];
}

$sql = "SELECT id_supraveghetor FROM supraveghetor_pacient WHERE id_pacient=$id";
$res = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($res)) {
    $id_supraveghetor = $row["id_supraveghetor"];
}
?>
<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/Proiect_IP/medic/homeadmin.php?id_medic=<?php echo $_GET["id_medic"]?>">Pacienti</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <div>
                        <a class="nav-link" href="/Proiect_IP/medic/inregistrari/pacient.php?id_medic=<?php echo $_GET["id_medic"] ?>">Creare cont pacient<span class="sr-only">(current)</span></a>
                    </div>
                </li>
				<li class="nav-item active">
                    <div>
                        <a class="nav-link" href="/Proiect_IP/login.php">Delogare<span class="sr-only">(current)</span></a>
                    </div>
                </li>
                <!-- <li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li> -->
                <li class="nav-item">
                    <div style="margin-top:5px; margin-left:30px; display:flex; flex-direction:column;">
                        <a href="tel:<?php echo $telefon; ?> "> Apeleaza pacientul: <?= $telefon ?></a>
                    </div>
                </li>
                <li class="nav-item">
                    <div style="margin-top:5px; margin-left: 30px; display:flex; flex-direction:column;">
                        <a href="tel:112">Apeleaza la urgente: 112</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</section>