<?php
require_once "connection.php";

$connessione = new connection();
$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "home.html");

if ($connessione->isConnected()) {

    $getNews = $connessione->getSocialNews();
    if ($getNews != null) {

        $divNews = '<div id="scrollableContent">';

        foreach ($getNews as $news) {
            $divNews .= '<article class="content">
					<header>
						<div class="socialInfo">
							<time datetime="' . $news['Date'] . '" pubdate="pubdate">' . $news['Date'] . '</time>
							<img id="socialIcon" src="../images/socialIcon/' . $news['Icon'] . '.png" title="' . $news['Icon'] . '" alt=" ' . $news['aText'] . '">
						</div>
						<h2>' . $news['Title'] . '</h2>
					</header>
					<p>' . $news['Description'] . '</p>
					<footer>
						<a href="' . $news['Link'] . '" target="_blank" aria-label="See more" class="contentLink">Explore more</a>
					</footer>
				</article>';
        }

        $divNews .= '</div>';
        echo str_replace("<socialRoomNews/>", $divNews, $paginaHTML);
    } else {
        echo str_replace("<socialRoomNews/>", "No news to load", $paginaHTML);
    }
} else {
    die("Error, can't connect to DB");
}

$connessione->closeConnection();

?>
