<?php
require_once "connection.php";
require_once "input_check.php";

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

    public function isCorrect()
    { /*
       * if (input_check::date_check($this->date)) {
       * return true;
       * }
       * return false;
       */
        return true;
    }

    public function inserisciPrenotazione(connection $db)
    {
        $query = "INSERT INTO socialNews(Date,Title,Description,Icon,Link)
            VALUES (\"$this->date\",\"$this->title\",\"$this->description\",\"$this->icon\", \"$this->link\")";

        $queryResult = mysqli_query($db->getConnection(), $query);
        if (mysqli_affected_rows($db->getConnection()) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getCheckin()
    {
        return $this->date;
    }

    public function getCheckout()
    {
        return $this->check_out;
    }

    public function getDesc()
    {
        return $this->richieste;
    }
}
?>