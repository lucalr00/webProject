<?php
require_once "connection.php";
require_once "news.php";
require_once "inputCheck.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit();
}

$mes = '';

if (isset($_POST['submitNew'])) {
    $title = htmlspecialchars(strip_tags($_POST['title']));
    $description = htmlspecialchars(strip_tags($_POST['description']));
    $icon = $_POST['icon'];
    $link = filter_var($_POST['socialLink'], FILTER_SANITIZE_URL);
    $author = $_SESSION['author'];
    $news = new news($_POST['date'], $title, $description, $icon, $link, $author);

    $querable = true;

    $mes .= '<ul id="wrongInput">';

    if (ctype_space($news->getTitle())) {
        $querable = false;
        $mes .= '<li class="error">Error, title consists of whitespace characters only</li>';
    }
    if (ctype_space($news->getDescription())) {
        $querable = false;
        $mes .= '<li class="error">Error, description consists of whitespace characters only</li>';
    }
    if (! inputCheck::minLength($news->getTitle(), $news->getDescription())) {
        $querable = false;
        $mes .= '<li class="error">Error, title and description must have a length of 5 characters</li>';
    }
    if (! inputCheck::maxLengthTitle($news->getTitle())) {
        $querable = false;
        $mes .= '<li class="error">Error, title length is greater than 75 characters</li>';
    }
    if (! inputCheck::maxLengthDspt($news->getDescription())) {
        $querable = false;
        $mes .= '<li class="error">Error, description length is greater than 630 characters</li>';
    }
    if (! inputCheck::iconName($news->getIcon())) {
        $querable = false;
        $mes .= '<li class="error">Error, icon not valid</li>';
    }
    if (! inputCheck::link($news->getLink())) {
        $querable = false;
        $mes .= '<li class="error">Error, link not valid</li>';
    }

    $mes .= '</ul>';

    if ($querable) {
        $conn = new connection();
        if ($conn->isConnected()) {
            $resultConn = $news->newPost($conn);
            if ($resultConn) {
                $mes .= '<div class="success"><p>Post successfully published</p></div>';
            } else
                $mes .= '<div class="error"><p>Error, can\'t record the new post in the database</p></div>';
        } else
            $mes .= '<div class="error"><p>Error, can\'t connect to the database</p></div>';
    } else {
        $_SESSION['inputFault'] = true;
        $_SESSION['respStatus'] = $mes;
        header('location:redirect.php');
        exit;
    }

    $_SESSION['respStatus'] = $mes;
    header('location:redirect.php');
} else {
    $_SESSION['inputFault'] = true;
    $_SESSION['respStatus'] = '<div class="error"><p>Error, form not submitted</p></div>';
    header('location:redirect.php');
}

?>