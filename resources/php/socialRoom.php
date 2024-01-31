<?php
require_once "connection.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit();
}

if ($_SESSION['userRole'] != "Social Media Manager") {
    $roleError = 'Does not have the role of social manager.';
    $_SESSION['respStatus'] = $roleError;
    $_SESSION['notGranted'] = true;
    header('location:redirect.php');
    exit();
}

$conn = new connection();
$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "socialRoom.html");

if ($conn->isConnected()) {

    $getNews = $conn->getSocialNews();
    if ($getNews != null) {
        $ulNews = '<ul>';
        foreach ($getNews as $news) {
            $ulNews .= '<li><form class="book" action="editPost.php" method="post" aria-label="Post editing form"><fieldset>
                    <legend>Edit Social Room News</legend>
					<div class="newsInDb">
                        <p>News Id number: ' . $news['Id'] . '<p>
                        <input type="hidden" name="Id" value="' . $news['Id'] . '"/>
                        <p>Author: ' . $news['Author'] . '<p>
                    </div>
                    <div class=news-d-t-d>
                        <div class="newsDate">
                            <label>Date:
                            <input type="datetime-local" class="publicationDate" name="Date" min="2000-01-01T00:00" max="2025-01-01T00:00" aria-required="true" aria-label="edit the publication date" value="' . $news['Date'] . '" required >
					        </label>
                        </div>
                        <div class="titleArea">
					       <label>Title:
					       <input type="text" name="Title" class="title" aria-required="true" minlength="5" maxlength="75" placeholder="min 5 and max 75 characters" value="' . $news['Title'] . '" aria-label="edit the title" title="Enter the title" required >
                           </label>
                        </div>
					    <div class="descriptionArea">
					       <label>Description:
					           <textarea name="Description" class="description" minlength="5" maxlength="500" rows="5" placeholder="min 5 and max 500 characters" aria-required="true" aria-label="edit the description" title="Enter the description" required>' . $news['Description'] . '</textarea>
                           </label>
                        </div>
                   </div>
                <div class="socialReference">
                    <div class="social-icon">
					<label>Current icon:</label>
					<img class="socialIcon" src="../images/socialIcon/' . $news['Icon'] . '.png" title="' . $news['Icon'] . '" alt=" ' . $news['aText'] . '">
                    </div>
                    <div class="socialIconEd">
                        <label>Social icon:
							<select name="Icon" class="selSocialIcon">
                                <option value="' . $news['Icon'] . '">&minus; keep current &minus;</option>
								<option value="noicon">No icon</option>
								<option value="facebook">Facebook</option>
								<option value="instagram">Instagram</option>
								<option value="xtwitter">X (Twitter)</option>
							</select>
                        </label>
                    </div>
                    
                    <div class="socialLinkArea">
                        <label>Link:
					    <input type="url" name="Link" class="socialLink" aria-required="false" placeholder="http:// https:// or left blank" value="' . $news['Link'] . '" aria-label="edit or remove the social link of the current news">
                        </label>
                    </div>
                    
                </div>
					
                <div class="submitControl">
                    <button type="submit" class="submitEdt" name="submitEdt" title="Edit the news" aria-label="edit the news">Edit<span class="material-symbols-outlined">edit</span></button>
					<button type="submit" class="submitDel" onclick="return confirm(\'Are you sure you want to delete?\')" name="submitDel" title="Delete the news" aria-label="delete the news">Delete<span class="material-symbols-outlined">delete</span></button>	
                </div>
</fieldset></form></li>';
        }

        $ulNews .= '</ul>
                    <p id="fetchResult">&minus; &minus; No more news to display &minus; &minus;</p>';
        echo str_replace("<socialRoomNews />", $ulNews, $fileHTML);
    } else {
        echo str_replace("<socialRoomNews />", "No news found in the database", $fileHTML);
    }
} else {
    die("Connection error");
}

$conn->closeConnection();

?>
