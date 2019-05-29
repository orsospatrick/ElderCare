<?php
$con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
$id_pacient=$_GET['id_pacient'];
if(isset($_GET['detalii_temperatura']))
{
    $detalii_temperatura=$_GET['detalii_temperatura'];
    echo $detalii_temperatura;
}

if(isset($detalii_temperatura))
{
    $detalii_alarma=$detalii_temperatura;
    $sql="INSERT INTO alarma_detalii(id_pacient,detalii_alarma) 
VALUES ('$id_pacient','$detalii_alarma')";

    if ($con->query($sql) === true) {
        echo "Am adaugat in alarme";
    } else {
        echo "failed";
    }
}
header("location:homeadmin.php");
?>