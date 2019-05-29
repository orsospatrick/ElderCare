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
                    <th scope="col">Schema medicatie</th>
                    <th scope="col">Tratament</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_GET["id_click"];
                $con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
                $sql = "SELECT schemaMedicatie, tratament, datainregistrarii FROM schememedicatie WHERE id_pacient='$id'";
                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <?php
                        foreach ($row as $field) {
                            echo "<td>";
                            echo $field;
                            echo "</td>";
                        }
                        ?>
                    </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</body>