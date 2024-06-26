<?php
require_once "php/connection.php";

$conn = new connection();
$fileHTML = file_get_contents("html" . DIRECTORY_SEPARATOR . "home.html");

if ($conn->isConnected()) {

    $getNews = $conn->getSocialNews();
    if ($getNews != null) {

        $divNews = '<div id="scrollableContent">';

        foreach ($getNews as $news) {

            if ($news['Author'] == "") {
                $news['Author'] = "&minus; author not found! &minus;";
            }

            $divNews .= '<article class="content" aria-label="article">
					<header>
						<div class="socialInfo">
							<time datetime="' . $news['Date'] . '"><span aria-hidden="true" class="material-symbols-outlined socialSpan">calendar_today</span>' . $news['Date'] . '</time>
							<img aria-hidden="true" class="socialIcon" src="images/socialIcon/' . $news['Icon'] . '.png" title="' . $news['Icon'] . '" alt=" ' . $news['aText'] . '">
						</div>
                        <h3>' . $news['Title'] . '</h3>
                    </header>
                        <div class="mainContent">
					      <p>' . $news['Description'] . '</p>
					    </div>   
                        <footer>
                            <div class="author">
                                <p>By <strong>' . $news['Author'] . '</strong>
                            </div>
						  <a href="' . $news['Link'] . '" target="_blank" aria-label="Read more about the article (opens in a new window)" class="refLink">Read more...</a>
					    </footer>
				</article>';
        }

        $divNews .= '</div>';
        echo str_replace("<socialRoomNews />", $divNews, $fileHTML);
    } else {
        echo str_replace("<socialRoomNews />", '<p class="socialMsg">No news to load</p>', $fileHTML);
    }
} else {
    die("Error, can't connect to DB");
}

$conn->closeConnection();

?>
