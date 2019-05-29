<?php
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
$id_pacient=$_GET["id_click"];
$sql = "DELETE FROM utilizator WHERE id='$id_pacient'";
$result = $con->query($sql);
header("location:homeadmin.php");
?>