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
</head>
<body>
	<?php
	include './NavBar.php';
	?>
	<div class="limiter">
		<table class="table table-striped table-responsive-sm">
			<thead>
				<tr>
					<th scope="col">Nume</th>
					<th scope="col">Prenume</th>
					<th scope="col">Cnp</th>
					<th scope="col">Varsta</th>
					<th scope="col">Sex</th>
					<th scope="col">Adresa</th>
					<th scope="col">Telefon</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
				$sql = "SELECT id, tip, nume, prenume, cnp, data_nasterii, sex, adresa, telefon FROM utilizator";
				$result = $con->query($sql);
				while ($row = $result->fetch_assoc()) {
					$tip = $row["tip"];
					if($tip=="pacient")
					{
						$id_click = $row["id"];
						$row["data_nasterii"] = varsta($row["data_nasterii"]);
						?>
						<tr onclick="window.location='./homeadmin.php?id_click=<?php echo $id_click ?>';">
							<?php
							unset($row["id"]);
							unset($row["tip"]);
							foreach ($row as  $index => $field) {
								{
									echo "<td>";
									echo $field;
									echo "</td>";
								}
							}
							?>
						</tr>
						<?php
					}
				}
			?>
			</tbody>
		</table>
	</div>
</body>

<?php
function varsta($data_nasterii)
{
	$differenceFormat = "%y";
	$datetime1 = date_create($data_nasterii);
	$today = date("Y-m-d H:i:s");
	$today=date_create($today);
	$interval = date_diff($today, $datetime1);

	return $interval->format($differenceFormat);
}
?>

<div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Optiuni</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
				<div class="modal-body">
				<button onclick="window.location.href='./charts.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Grafice</button>
				<button onclick="window.location.href='./supraveghere.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Supraveghere</button>
				<button onclick="window.location.href='./rezolvarealarma.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Rezolvare alarme</button>
				<button onclick="window.location.href='./setaresenzori.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Setare valori senzori</button>
				<button onclick="window.location.href='./schemaMedicatie.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Adaugare schema medicatie</button>
				<button onclick="window.location.href='./vizualizareScheme.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Vizualizare scheme medicatie</button>
				<button onclick="window.location.href='./adaugaredatefiziologice.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Adaugare date fiziologice</button>
				<button onclick="window.location.href='./vizualizaredatefiziologice.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Vizualizare date fiziologice</button>
				<button onclick="window.location.href='./modificarePacient.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Modificare date pacient</button>
				<button onclick="window.location.href='./alergie.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Adaugare alergie</button>
				<button onclick="window.location.href='./relationaremedic.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Relationare medic</button>
				<button onclick="window.location.href='./relationaresupraveghetor.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Relationare supraveghetor</button>
				<button onclick="window.location.href='./relationareingrijitor.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Relationare ingrijitor</button>
				<button onclick="window.location.href='./tiparire.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Tiparire fisa medicala</button>
				<button onclick="window.location.href='./stergerepacient.php?id_click=<?php echo $_GET['id_click']; ?>'" type="button" class="btn btn-light btn-block">Stergere pacient</button>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</html>

<script type="text/javascript">
	var id = "<?php Print($_GET['id_click']); ?>";
    $(window).on('load',function(){
        $('#orderModal').modal('show');
    });
</script>


