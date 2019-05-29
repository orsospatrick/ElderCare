<?php
$id_pacient = $_GET["id_click"];
$id_alarma = $_GET["id_alarma"];
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
$dataTimp = date('Y-m-d H:i:s');
$sql = "UPDATE alarma_detalii
        SET StatusAlarma='Rezolvat' ,dataRezolvare='$dataTimp'
        WHERE id='$id_alarma'";
$query = mysqli_query($con, $sql);
$newURL = "rezolvarealarma.php?id_click=" . $id_pacient . "&id_ingrijitor=" . $_GET["id_ingrijitor"];
header('Location: '.$newURL);
?>