<?php
require_once "session.php";
require_once "connection.php";
require_once "inputCheck.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit;
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

    $mes = '';

    $conn = new connection();
    if ($conn->isConnected()) {
        $mysqli = $conn->getConnection();
        if (isset($_POST['submitDel'])) {
            $query = "DELETE FROM socialNews WHERE Id=?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
            if ($stmt->affected_rows == 1) {
                $conn->closeConnection();
                $mes .= '<div class="success">Post successfully deleted</div>';
            } else {
                $mes .= '<div class="error">Error, can\'t delete the post</div>';
            }
            $_SESSION['respStatus'] = $mes;
            header('location:redirect.php');
            exit;
        } else {
            $querable = true;
            $mes .= '<ul id="wrongInput">';

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
                $mes .= '<li class="error">Error, title and description must have a length of 5 characters</li>';
            }
            if (! inputCheck::maxLengthTitle($title)) {
                $querable = false;
                $mes .= '<li class="error">Error, title length is greater than 75 characters</li>';
            }
            if (! inputCheck::maxLengthDspt($description)) {
                $querable = false;
                $mes .= '<li class="error">Error, description length is greater than 500 characters</li>';
            }
            if (! inputCheck::iconName($icon)) {
                $querable = false;
                $mes .= '<li class="error">Error, icon not valid</li>';
            }
            if (! inputCheck::link($link)) {
                $querable = false;
                $mes .= '<li class="error">Error, link not valid</li>';
            }

            $mes .= '</ul>';
            if ($querable) {
                $query = "UPDATE socialNews SET Date=?,Title=?,Description=?,Icon=?, Link=? WHERE Id=?";
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param('sssssi', $date, $title, $description, $icon, $link, $id);
                $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    $conn->closeConnection();
                    $mes .= '<div class="success">Post successfully edited</div>';
                } else {
                    $mes .= '<div class="error">Error, edit at least one field</div>';
                }
                $_SESSION['respStatus'] = $mes;
                header('location:redirect.php');
                exit;
            } else {
                $_SESSION['inputFault'] = true;
                $_SESSION['respStatus'] = $mes;
                header('location:redirect.php');
                exit;
            }
        }
    } else {
        $_SESSION['respStatus'] = $mes;
        header('location:redirect.php');
        exit;
    }
} else {
    header('location:socialRoom.php');
    exit;
}

?>