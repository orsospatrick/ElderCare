<!-- COD POP-UP CHAT-->
<!DOCTYPE html>
<html>

<head>
    <?php
    $emitator = "supraveghetor";
    if (isset($_POST["send_message"])) {
        $id_supraveghetor = $_GET['id_supraveghetor'];
        $con = mysqli_connect("35.238.19.69", "root", "", "proiectip");
        $mesaj_supraveghetor = mysqli_real_escape_string($con, $_POST["message_supraveghetor"]);
        $id_pacient = mysqli_real_escape_string($con, $_GET['id_click']);
        $sql = "INSERT INTO chat_supraveghetor_pacient(id_pacient,id_supraveghetor,mesaj,emitator) 
        VALUES ('$id_pacient', '$id_supraveghetor', '$mesaj_supraveghetor' ,'$emitator' )";
        $query = mysqli_query($con, $sql);
    }
    ?>
    <?php
    $text = "";
    include './NavBar.php';
    $id_pacient = $_GET['id_click'];

    $con = mysqli_connect("35.238.19.69", "root", "", "proiectip") or die("conectare esuata");
    $sql = "SELECT mesaj,emitator FROM chat_supraveghetor_pacient WHERE id_pacient='$id_pacient'";
    $result = $con->query($sql);
    while ($row = $result->fetch_assoc()) {
        if ($row["emitator"] == "supraveghetor") {
            $text = $text . "Supraveghetor: " . $row["mesaj"] . "&#13;&#10;";
        } else
                    if ($row["emitator"] == "pacient") {
            $text = $text . "Pacient: " . $row["mesaj"] . "&#13;&#10;";
        }
    }


    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Chat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./clickable.js">
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    body {
        background-image: url('admin/images/Chat_foto.jpg');
        background-size: cover;
        background-position: center center;
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
    }




    /* Button used to open the chat form - fixed at the bottom of the page */
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup chat - hidden by default */
    .chat-popup {
        display: none;
        position: fixed;
        bottom: 0;
        right: 15px;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width textarea */
    .form-container textarea {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
        resize: none;
        min-height: 50px;
    }

    /* When the textarea gets focus, do something */
    .form-container textarea:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/send button */
    .form-container .btn {
        background-color: #4CAF50;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>
</head>

<body>

    </div>
    <div>
        <form class="form-container" method="post">
            <h1>Chat</h1>
            <label for="msg"><b>Conversatie</b></label>
            <textarea rows="9" cols="4" id="message_chat" name="message_chat"><?php echo $text; ?></textarea>
            <textarea rows="1" cols="2" placeholder="Scrie..." id="message_supraveghetor" name="message_supraveghetor" required></textarea>
            <button type="submit" class="btn" id="send_message" name="send_message">Trimite mesajul</button>
            <button type="button" class="btn cancel">Inchide</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            var $textarea = $('#message_chat');
            $textarea.scrollTop($textarea[0].scrollHeight);
        });
    </script>

</body>

</html>