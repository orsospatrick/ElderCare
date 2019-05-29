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
                        <a class="nav-link" href="/Proiect_IP/medic/inregistrari/pacient.php?id_medic=<?php echo $_GET["id_medic"]?>">Creare cont pacient<span class="sr-only">(current)</span></a>
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