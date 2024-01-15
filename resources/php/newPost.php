<?php
require_once "connection.php";
require_once "prenotazione.php";
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
                $result_prenotazione = $news->inserisciPrenotazione($connessione);
                if ($result_prenotazione) {
                    $mes .= '<div class="conferma"><p>Successfully published</p></div>';
                } else
                    $mes .= '<div class="errori"><p>Errore nell\' inserimento della prenotazione. Riprovare</p></div>';
            } else
                $mes .= '<div class="errori"><p>Connection to DB failed</p></div>';
        }
        
        $mes .= '<div id="refresh"><p>Reloading the page in 5 seconds...</p></div>';
        header('refresh:5;url=socialRoom.php');
        echo $paginaHTML = str_replace('<mes/>', $mes, $paginaHTML);
        
    } else {
        $messaggioPerForm = '<div class="errori" ><ul>';

        if ($news->getCheckin()) {
            $messaggioPerForm .= '<li>La data di check in non può essere dopo la data di check out</li>';
        }

        $messaggioPerForm .= '</ul></div>';

        $paginaHTML = str_replace('<mes/>', $messaggioPerForm, $paginaHTML);
    }
}else{
    header('location:socialRoom.php');
}
?>