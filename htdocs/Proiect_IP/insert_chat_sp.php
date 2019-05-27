<?php

$con = mysqli_connect("localhost", "root", "", "proiectip-2");
$id_pacient=$_POST['id_pacient'];
$mesaj=$_POST['message_supraveghetor'];
 $sql="INSERT INTO chat_supraveghetor_pacient(id_pacient,mesaj_supraveghetor) 
VALUES ('$id_pacient','$mesaj')";

    if ($con->query($sql) === true) {
        echo "Am adaugat in alarme";
    } else {
        echo "failed";
    }


?>

