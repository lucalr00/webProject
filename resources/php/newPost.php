<?php
require_once "connection.php";
require_once "news.php";
require_once "input_check.php";
require_once "session.php";

if (isset($_POST['submitNew'])) {
    $news = new news($_POST['date'], $_POST['title'], $_POST['description'], $_POST['icon'], $_POST['socialLink']);

    if ($news->isCorrect()) {
        $mes = '';
        $connessione = new connection();
        if ($connessione->isConnected()) {
            $result_prenotazione = $news->newPost($connessione);
            if ($result_prenotazione) {
                $mes .= '<div class="success"><p>Post successfully published</p></div>';
            } else
                $mes .= '<div class="error"><p>Error, can\'t record the new post in the database</p></div>';
        } else
            $mes .= '<div class="error"><p>Error, can\'t connect to the database</p></div>';
    }

    $_SESSION['respStatus'] = $mes;
    header('location:redirect.php');
} else {
    $messaggioPerForm = '<div class="errori" ><ul>';

    $messaggioPerForm .= '</ul></div>';

    $paginaHTML = str_replace('<mes />', $messaggioPerForm, $paginaHTML);
}

?>