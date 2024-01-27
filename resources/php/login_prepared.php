<?php
require_once "session.php";
require_once "connection.php";

if ($_SESSION['connected'] == true) {
    header('location:dashboard.php');
    exit();
}

$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "login.html");

$userID = "";
$userPW = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userID'])) {
        //$userID = $_POST['userID'];
        
        $userID = htmlspecialchars(strip_tags($_POST['userID']));
        echo $userID;
    }
    if (isset($_POST['userPW'])) {
        $userPW = $_POST['userPW'];
        //$userPW = htmlspecialchars(strip_tags($_POST['userPW']));
    }

    $conn = new connection();
    $mes = '<div id="loginError"><ul>';

    if ($conn->isConnected()) {
        $mysqli = $conn->getConnection();
        $stmt = $mysqli->prepare("SELECT Username FROM users WHERE userID=? AND  Password=? LIMIT 1");
        $stmt->bind_param('ss', $userID, $userPW);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        if ($stmt->num_rows == 1)
        {
            while ($stmt->fetch())
            {
                $_SESSION['connected'] = true;
                $_SESSION['username'] = $username;
                echo 'Success!';
                exit();
            }
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

