<?php
require_once "session.php";
require_once "connection.php";

if ($_SESSION['connesso'] == true) {
    header('location:dashboard.php');
    exit();
}

$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "login.html");

$utente = "";
$password = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userID'])) {
        $userID = $_POST['userID'];
    }
    if (isset($_POST['userPW'])) {
        $userPW = $_POST['userPW'];
    }

    $connessione = new connection();
    $error = '<div class="errors"><ul>';

    if ($connessione->isConnected()) {

        // CONTROLLI UTENTE E PASSWORD

        $query = "SELECT userID FROM admin WHERE userID=\"$userID\" AND Password=\"$userPW\"";
        $queryResult = mysqli_query($connessione->getConnection(), $query);

        if (mysqli_affected_rows($connessione->getConnection()) == 1) {
            $_SESSION['connesso'] = true;
            $_SESSION['userID'] = $userID;

            $connessione->closeConnection();

            header('location:dashboard.php');
            exit();
        } else {
            $error .= '<li>Wrong Username or Password</li>';
        }
    } else {
        $error .= '<li>Can\'t connect to the Database</li>';
    }
    $error .= '</ul></div>';

    $paginaHTML = str_replace('<errors />', $error, $paginaHTML);
}
echo $paginaHTML;

?>

