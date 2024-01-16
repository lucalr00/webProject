<?php

class connection
{

    private const HOST = 'localhost';

    private const USERNAME = 'zero_carbon';

    private const PASSWORD = '';

    private const DATABASE = 'zero_carbon';

    private $connection;

    public function __construct()
    {
        $this->connection = mysqli_connect(connection::HOST, connection::USERNAME, connection::PASSWORD, connection::DATABASE);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }

    public function isConnected()
    {
        if ($this->connection->connect_errno) {
            return false;
        } else {
            return true;
        }
    }

    public function getSocialNews()
    {
        $querySelect = "SELECT DISTINCT Id,Date,Title,Description,socialNews.Icon,Link,altText FROM socialNews\n" . "LEFT JOIN icons\n" . "ON icons.icon WHERE socialNews.Icon=icons.Icon\n" . "ORDER BY Date DESC;";
        $queryResult = mysqli_query($this->connection, $querySelect);

        if (mysqli_num_rows($queryResult) != 0) {

            $listNews = array();
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $news = array(
                    "Id" => $row['Id'],
                    "Date" => $row['Date'],
                    "Title" => $row['Title'],
                    "Description" => $row['Description'],
                    "Icon" => $row['Icon'],
                    "Link" => $row['Link'],
                    "aText" => $row['altText']
                );

                array_push($listNews, $news);
            }

            return $listNews;
        } else {
            return null;
        }
    }

    public function getUserInfo()
    {
        $querySelect = "SELECT Username,Role FROM users WHERE userID='{$_SESSION['userID']}'";
        $queryResult = mysqli_query($this->connection, $querySelect);

        if (mysqli_num_rows($queryResult) != 0) {

            $adminInfo = array();
            while ($row = mysqli_fetch_assoc($queryResult)) {
                $info = array(
                    "Username" => $row['Username'],
                    "Role" => $row['Role']
                );

                array_push($adminInfo, $info);
            }

            return $adminInfo;
        } else {
            return null;
        }
    }
}

?>

