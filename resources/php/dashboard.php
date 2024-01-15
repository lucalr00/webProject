<?php
require_once "connection.php";
require_once "session.php";

if ($_SESSION['connesso'] != true) {
    header('location:login.php');
    exit();
}

$connessione = new connection();
$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "adminArea.html");

if ($connessione->isConnected()) {

    $getInfo = $connessione->getUserInfo();
    if ($getInfo != null) {

        $divInfo = '<div id="welcomeInfo">';

        foreach ($getInfo as $info) {
            $divInfo .= '<h2>Welcome back <span id="userName">' . $info['Username'] . '</span></h2>
                       <h3>Your role: <span id="userRole">' . $info['Role'] . '</span></h3>
                       </div>';
        }

        echo str_replace("<adminLoginInfo />", $divInfo, $paginaHTML);
    } else {
        echo str_replace("<adminLoginInfo />", "User info: Info not present", $paginaHTML);
    }
} else {
    die("Connection error");
}

$connessione->closeConnection();

?>