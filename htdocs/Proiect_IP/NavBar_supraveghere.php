
<?php
$id = $_GET["id_click"];
$con = mysqli_connect("localhost", "root", "", "proiectip-2") or die("conectare esuata");
$sql = "SELECT telefon FROM utilizator WHERE id=$id";
$res = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$telefon = $row["telefon"];
	}
?>
<section>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="/Proiect_IP/homesupraveghetor.php">Pacienti</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
                    <div style="margin-top:10px; display: flex;
                     flex-direction: row;" >
                    <a class="nav-link" onclick="window.location.href='./Chat_supraveghetor_pacient.php?id_click=<?php echo $_GET['id_click']?>&id_supraveghetor=<?php echo $_GET['id_supraveghetor'];?> '">Chat<span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/Proiect_IP/login.php">Delogare<span class="sr-only">(current)</span></a>
                    </div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li> -->
				<li class="nav-item">
                    <div style="margin-top:10px; margin-left:830px; display:flex; flex-direction:column;">
                    <a href="tel: '<?php echo $_GET['telefon'];?>' "> Apeleaza pacientul: <?= $telefon ?></a>
					<a href="tel:112">Apeleaza la urgente: 112</a> 
				</div>
				</li>
			</ul>
		</div>
	</nav>
</section>