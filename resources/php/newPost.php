<?php
require_once "connection.php";
require_once "news.php";
require_once "input_check.php";
require_once "session.php";

$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "socialRoom.html");

if ($_SESSION['avRfr']=='') {

    if (isset($_POST['submitNew'])) {
        $_SESSION['avRfr']=1;
        $news = new news($_POST['date'], $_POST['title'], $_POST['description'], $_POST['icon'], $_POST['socialLink']);

        if ($news->isCorrect()) {
            $mes = '<div id="postStatus">
                        <h3>Server response status:</h3>';
            $connessione = new connection();
            if ($connessione->isConnected()) {
                $result_prenotazione = $news->newPost($connessione);
                if ($result_prenotazione) {
                    $mes .= '<div class="conferma"><p>Successfully published</p></div>';
                } else
                    $mes .= '<div class="errori"><p>Error, can\'t record the new post in the database</p></div>';
            } else
                $mes .= '<div class="errori"><p>Error, can\'t connect to the database</p></div>';
        }
        
        $mes .= '<div id="refresh"><p>Reloading the page in 3 seconds...</p></div>';
        header('refresh:3;url=socialRoom.php');
        echo $paginaHTML = str_replace('<mes/>', $mes, $paginaHTML);
        
    } else {
        $messaggioPerForm = '<div class="errori" ><ul>';

        $messaggioPerForm .= '</ul></div>';

        $paginaHTML = str_replace('<mes/>', $messaggioPerForm, $paginaHTML);
    }
}else{
    header('location:socialRoom.php');
}
?>