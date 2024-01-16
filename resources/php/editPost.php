<?php
require_once "session.php";
require_once "connection.php";
require_once "input_check.php";

if ($_SESSION['connesso'] != true) {
    header('location:login.php');
    exit();
}

// $paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "socialRoom.html");

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

    $mes = '';

    $connessione = new connection();
    if ($connessione->isConnected()) {

        if (isset($_POST['submitDel'])) {
            $query = "DELETE FROM socialNews WHERE Id=\"$id\"";
            $queryResult = mysqli_query($connessione->getConnection(), $query);
            if (mysqli_affected_rows($connessione->getConnection()) >= 1) {
                $connessione->closeConnection();
                $mes .= '<div class="success">Post successfully deleted</div>';
            } else {
                $mes .= '<div class="error">Error, can\'t delete the post</div>';
            }
            $_SESSION['respStatus'] = $mes;
            header('location:redirect.php');
            exit();
        } else {
            $querable = true;
            $mes = '<ul id=wrongInput>';

            if (ctype_space($title)) {
                $querable = false;
                $mes .= '<li class="error">Error, title consists of whitespace characters only</li>';
            }
            if (ctype_space($description)) {
                $querable = false;
                $mes .= '<li class="error">Error, description consists of whitespace characters only</li>';
            }
            if (! inputCheck::minLength($title, $description)) {
                $querable = false;
                $mes .= '<li class="error">Error, title and description must have a length of 4 characters</li>';
            }
            if (! inputCheck::maxLengthTitle($title)) {
                $querable = false;
                $mes .= '<li class="error">Error, title length is greater than 30 characters</li>';
            }
            if (! inputCheck::maxLengthDspt($description)) {
                $querable = false;
                $mes .= '<li class="error">Error, description length is greater than 100 characters</li>';
            }

            $mes .= '</ul>';
            if ($querable) {
                $query = "UPDATE socialNews SET Date=\"$date\",Title=\"$title\",Description=\"$description\",Icon=\"$icon\",Link=\"$link\" WHERE Id=\"$id\"";
                $queryResult = mysqli_query($connessione->getConnection(), $query);
                if (mysqli_affected_rows($connessione->getConnection()) >= 1) {
                    $connessione->closeConnection();
                    $mes .= '<div class="success">Post successfully edited</div>';
                } else {
                    $mes .= '<div class="error">Error, edit at least one field</div>';
                }
                $_SESSION['respStatus'] = $mes;
                header('location:redirect.php');
                exit();
            } else {
                $_SESSION['inputFault'] = true;
                $_SESSION['respStatus'] = $mes;
                header('location:redirect.php');
                exit();
            }
        }
    } else {
        $_SESSION['respStatus'] = $mes;
        header('location:redirect.php');
        exit();
    }
} else {
    header('location:socialRoom.php');
    exit();
}

?>