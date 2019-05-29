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
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../admin/images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./admin/css/util.css">
    <link rel="stylesheet" type="text/css" href="./admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
    <?php
    include './NavBar.php';
    $errors = "success";
    $con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
    $id_pacient = $_GET["id_click"];
    $sql = "SELECT  nume, prenume, cnp, data_nasterii, sex, adresa, telefon, email, profesie, loc_munca FROM utilizator WHERE id='$id_pacient'";
    $sql_alergii = "SELECT  id, tipAlergie, simptome FROM alergii WHERE id_pacient='$id_pacient'";
    $sql_scheme = "SELECT  id, schemaMedicatie, tratament FROM schememedicatie WHERE id_pacient='$id_pacient'";
    $result = $con->query($sql);
    $result_alergii = $con->query($sql_alergii);
    $result_scheme = $con->query($sql_scheme);
    $row = $result->fetch_assoc();
    echo "<center><h1>FISA MEDICALA A PACIENTULUI CU NR." . $id_pacient . "</h1></center>";
    echo "<br><br><br>";
    echo "<h2>NUME: ".$row['nume'] . "</h2>";
    echo "<h2><br>PRENUME: ".$row['prenume'] . "</h2>";
    echo "<h2><br>CNP: ".$row['cnp'] . "</h2>";
    echo "<h2><br>DATA NASTERII: ".$row['data_nasterii'] . "</h2>";
    echo "<h2><br>SEX: ".$row['sex'] . "</h2>";
    echo "<h2><br>ADRESA: ".$row['adresa'] . "</h2>";
    echo "<h2><br>TELEFON: ".$row['telefon'] . "</h2>";
    echo "<h2><br>EMAIL: ".$row['email'] . "</h2>";
    echo "<h2><br>PROFESIA: ".$row['profesie'] . "</h2>";
    echo "<h2><br>LOCUL DE MUNCA: ".$row['loc_munca'] . "</h2>";
    while($row = $result_scheme->fetch_assoc())
    {
        echo "<h2><br><u>SCHEMA DE MEDICATIE CU NR.: ".$row['id'] . ":</h2></u>";
        echo "<h3><br>SCHEMA: ".$row['schemaMedicatie'] . ":</h3>";
        echo "<h3><br>TRATAMENTUL: ".$row['tratament'] . ":</h3>";
    }
    while($row = $result_alergii->fetch_assoc())
    {
        echo "<h2><br><u>ALERGIA CU NR.: ".$row['id'] . ":</h2></u>";
        echo "<h3><br>TIPUL ALERGIEI: ".$row['tipAlergie'] . ":</h3>";
        echo "<h3><br>SIMPTOMELE: ".$row['simptome'] . ":</h3>";
    }
    ?>
</body>