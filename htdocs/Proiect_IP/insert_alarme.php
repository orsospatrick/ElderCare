

<!-- Aici iau datele pentru a adauga alarmele si detalile lor in tabela alarme  -->
<?php
$con = mysqli_connect("localhost", "root", "", "proiectip-2");
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
header("location:supraveghere.php?id_click=" . $id_pacient);
?>

