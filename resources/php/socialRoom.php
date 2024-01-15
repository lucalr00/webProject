<?php
require_once "connection.php";
require_once "session.php";

$_SESSION['avRfr'] = '';

if ($_SESSION['connesso'] != true) {
    header('location:login.php');
    exit();
}

$connessione = new connection();
$paginaHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "socialRoom.html");

if ($connessione->isConnected()) {

    $getNews = $connessione->getSocialNews();
    if ($getNews != null) {

        $ulNews = '<ul class="admin" id="prenotazione">';

        foreach ($getNews as $news) {
            $ulNews .= '<li><form class="book" action="editPost.php" method="post" aria-label="Form per gestire le prenotazioni"> <fieldset class="display_admin" >
                    <legend>Edit Social Room News</legend>
					<div id="newsIdDb">
                    <label for="idNumber">News Id number: ' . $news['Id'] . '</label>
                    <input type="hidden" name="Id" value="' . $news['Id'] . '"/>
                    </div>
                    <section id=news-d-t-d>
                    <div id="newsDate">
                    <label for="publicationDate"> Date:</label>
                    <input type="datetime-local" id="publicationDate" name="Date" value="' . $news['Date'] . '"/>
					</div>
                    <div id="titleArea" class="campo_chk">
					<label for="title">Title:</label>
					<input type="text" name="Title" id="title" aria-required="true" value="' . $news['Title'] . '" aria-label="Add or Edit the title" title="Enter the title" required />
</div>
					<div id="descriptionArea" class="campo_chk">
					<label for="description">Description:</label>
					<textarea name="Description" id="description" aria-required="true" aria-label="Add or edit the description" title="Enter the description" required>' . $news['Description'] . '</textarea>
</div>
                   </section>
 <section id="socialReference" class="campo_chk">
                    <div class="social-icon">
					<label for="socialIcon">Current icon:</label>
					<img id="socialIcon" src="../images/socialIcon/' . $news['Icon'] . '.png" title="' . $news['Icon'] . '" alt=" ' . $news['aText'] . '">
                    </div>
                    <div id="socialIconEd">
                        <label for="editSocialIcon">Social icon:</label>
							<select name="Icon" id="editSocialIcon">
                                <option value="' . $news['Icon'] . '">&minus; keep current &minus;</option>
								<option value="noicon">No icon</option>
								<option value="facebook">Facebook</option>
								<option value="instagram">Instagram</option>
								<option value="xtwitter">X (Twitter)</option>
							</select>
                    </div>
                    
                    <div id="socialLinkArea">
                    <label for="socialLink">Link:</label>
					<input type="link" name="Link" id="socialLink" aria-required="true" value="' . $news['Link'] . '" aria-label="Add or edit the social link of the current news"/>
                    </div>
                    
</section>  
					
<div id="submitControl">
                    <button type="submit" id="submitMod" name="submitEdt" title="Edit the news" aria-label="Button to edit the news">Edit</button>
					<button type="submit" id="submitDel" name="submitDel" title="Delete the news" aria-label="Button to delete the news">Delete</button>	
</div>					
</fieldset></form></li>';
        }

        $ulNews .= '</ul>';
        echo str_replace("<socialRoomNews/>", $ulNews, $paginaHTML);
    } else {
        echo str_replace("<socialRoomNews/>", "No news found in the database", $paginaHTML);
    }
} else {
    die("Connection error");
}

$connessione->closeConnection();

?>
