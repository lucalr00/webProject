<?php
require_once "session.php";
require_once "connection.php";

if ($_SESSION['connected'] == true) {
    header('location:dashboard.php');
    exit;
}

$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "login.html");

$userID = "";
$userPW = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userID'])) {
        $userID = htmlspecialchars(strip_tags($_POST['userID']));
    }
    if (isset($_POST['userPW'])) {
        $userPW = htmlspecialchars(strip_tags($_POST['userPW']));
    }

    $conn = new connection();
    $mes = '<div id="loginError"><ul>';

    if ($conn->isConnected()) {

        // CONTROLLI UTENTE E PASSWORD

        $query = "SELECT userID FROM users WHERE userID=\"$userID\" AND Password=\"$userPW\"";
        $queryResult = mysqli_query($conn->getConnection(), $query);

        if (mysqli_affected_rows($conn->getConnection()) == 1) {
            $_SESSION['connected'] = true;
            $_SESSION['userID'] = $userID;

            $conn->closeConnection();

            header('location:dashboard.php');
            exit();
        } else {
            $mes .= '<li class="error">Wrong Username or Password</li>';
        }
    } else {
        $mes .= '<li class="error">Error, can\'t connect to the database</li>';
    }
    $mes .= '</ul></div>';

    $fileHTML = str_replace('<mes />', $mes, $fileHTML);
}
echo $fileHTML;

?>

