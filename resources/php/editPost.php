<?php
require_once "session.php";
require_once "connection.php";
require_once "input_check.php";

if ($_SESSION['connesso'] != true) {
    header('location:login.php');
    exit();
}

$id = "";
$date = "";
$title = "";
$description = "";
$icon = "";
$link = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['Id'])) {
        $id = $_POST['Id'];
    }
    if (isset($_POST['Date'])) {
        $date = $_POST['Date'];
    }
    if (isset($_POST['Title'])) {
        $title = $_POST['Title'];
    }
    if (isset($_POST['Description'])) {
        $description = $_POST['Description'];
    }
    if (isset($_POST['Icon'])) {
        $icon = $_POST['Icon'];
    }
    if (isset($_POST['Link'])) {
        $link = $_POST['Link'];
    }

    $connessione = new connection();
    if ($connessione->isConnected()) {

        if (isset($_POST['submitDel'])) {
            $query = "DELETE FROM socialNews WHERE Id=\"$id\"";
            $queryResult = mysqli_query($connessione->getConnection(), $query);
            if (mysqli_affected_rows($connessione->getConnection()) >= 1) {
                $connessione->closeConnection();
                echo "<div class='mess'>Prenotazione eliminata con successo, reindirizzamento in corso</div>";
                header("refresh:5;url=socialRoom.php");
                exit();
            } else {
                echo "<div class='err'>Errore nella rimozione della prenotazione </div>";
                header("refresh:5;url=socialRoom.php");
                exit();
            }
        } else {
            $querable = true;
            $errorino = "<div class='err'><ul>";

            if ($querable) {
                $query = "UPDATE socialNews SET Date=\"$date\",Title=\"$title\",Description=\"$description\",Icon=\"$icon\",Link=\"$link\" WHERE Id=\"$id\"";
                $queryResult = mysqli_query($connessione->getConnection(), $query);
                if (mysqli_affected_rows($connessione->getConnection()) >= 1) {
                    $connessione->closeConnection();
                    echo "<div class='mess'>Prenotazione aggiornata con successo, reindirizzamento in corso</div>";
                    header("refresh:5;url=socialRoom.php");
                    exit();
                } else {
                    echo "<div class='err'>Errore nell'aggiornamento della prenotazione </div>";
                    header("refresh:5;url=socialRoom.php");
                    exit();
                }
            } else {
                echo $errorino . "</ul></div>";
                header("refresh:5;url=socialRoom.php");
                exit();
            }
        }
    } else {
        echo "<div class='mess'> Errore nell'instaurazione della connessione</div>";
        header("refresh:5;url=socialRoom.php");
        exit();
    }
} else {
    header('location:socialRoom.php');
    exit();
}

?>