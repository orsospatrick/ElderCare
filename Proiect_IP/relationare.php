<?php
$optiune = $_GET["opt"];
$id_pacient = $_GET["id_click"];
if(isset($_GET["id_medic"])) $id_medic = $_GET["id_medic"];
if(isset($_GET["id_supraveghetor"])) $id_supraveghetor = $_GET["id_supraveghetor"];
if(isset($_GET["id_ingrijitor"])) $id_ingrijitor = $_GET["id_ingrijitor"];
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
if(isset($id_medic)){
    if($optiune=="relationare")
        $sql = "INSERT INTO medic_pacient(id_medic, id_pacient) VALUES('$id_medic', '$id_pacient')";
    else
        $sql = "DELETE FROM medic_pacient WHERE id_pacient='$id_pacient' AND id_medic='$id_medic'";
}
if(isset($id_supraveghetor)){
    if($optiune=="relationare")
        $sql = "INSERT INTO supraveghetor_pacient(id_supraveghetor, id_pacient) VALUES('$id_supraveghetor', '$id_pacient')";
    else
        $sql = "DELETE FROM supraveghetor_pacient WHERE id_pacient='$id_pacient' AND id_supraveghetor='$id_supraveghetor'";
}
if(isset($id_ingrijitor)){
    if($optiune=="relationare")
        $sql = "INSERT INTO ingrijitor_pacient(id_ingrijitor, id_pacient) VALUES('$id_ingrijitor', '$id_pacient')";
    else
        $sql = "DELETE FROM ingrijitor_pacient WHERE id_pacient='$id_pacient' AND id_ingrijitor='$id_ingrijitor'";
}
$query = mysqli_query($con, $sql);
header("location:homeadmin.php");
?>