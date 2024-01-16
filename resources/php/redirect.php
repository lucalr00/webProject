<?php
require_once "session.php";
$response = $_SESSION['respStatus'];
unset($_SESSION['respStatus']);

$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "redirect.html");

if ($_SESSION['inputFault']) {
    unset($_SESSION['inputFault']);
    $response .= '<div id="refresh">
                    <p>Automatic redirection disabled</p>
                    <p>Back to <a href="socialRoom.php">Manage Social Room</a>';
} else {
    $response .= '<div id="refresh"><p>Redirecting in 3 seconds...</p></div>';
    header('refresh:3;url=socialRoom.php');
}

echo $paginaHTML = str_replace('<mes />', $response, $paginaHTML);

?>