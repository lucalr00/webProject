<?php
require_once "connection.php";
require_once "inputCheck.php";

class news
{

    private $date;

    private $title;

    private $description;

    private $icon;

    private $link;

    public function __construct($dt, $ttl, $dpt, $ic, $lnk)
    {
        $this->date = $dt;
        $this->title = $ttl;
        $this->description = $dpt;
        $this->icon = $ic;
        $this->link = $lnk;
    }

    public function newPost(connection $db)
    {
        $query = "INSERT INTO socialNews(Date,Title,Description,Icon,Link)
            VALUES (?, ?, ?, ?, ?)";

        $mysqli = $db->getConnection();
        $stmt = $mysqli->prepare($query);

        $stmt->bind_param('sssss', $this->date, $this->title, $this->description, $this->icon, $this->link);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getIcon()
    {
        return $this->icon;
    }

    public function getLink()
    {
        return $this->link;
    }
}

?>