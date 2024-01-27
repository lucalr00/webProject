<?php
require_once "connection.php";
require_once "news.php";
require_once "inputCheck.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit;
}

if (isset($_POST['submitNew'])) {
    $news = new news($_POST['date'], $_POST['title'], $_POST['description'], $_POST['icon'], $_POST['socialLink']);
    $mes = '';
    $querable = true;
    
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
        $mes .= '<li class="error">Error, title and description must have a length of 4 characters</li>';
    }
    if (! inputCheck::maxLengthTitle($news->getTitle())) {
        $querable = false;
        $mes .= '<li class="error">Error, title length is greater than 30 characters</li>';
    }
    if (! inputCheck::maxLengthDspt($news->getDescription())) {
        $querable = false;
        $mes .= '<li class="error">Error, description length is greater than 100 characters</li>';
    }
    if (! inputCheck::iconName($news->getIcon())) {
        $querable = false;
        $mes .= '<li class="error">Error, icon not valid</li>';
    }
    
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
        exit();
    }

    $_SESSION['respStatus'] = $mes;
    header('location:redirect.php');
}else{
    header('location:socialRoom.php');
}

?>