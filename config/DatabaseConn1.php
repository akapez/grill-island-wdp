<?php
//user auth connection
class Database
{

    private  $dbname = 'grill_island';
    private  $host = 'localhost';
    private  $user = 'root';
    private  $password = '';

    public $dbh = null;

    public function connect()
    {
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        // echo "connect";

        try {
            $this->dbh = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        return $this->dbh;
    }
}

//    $db = new Database();
//    $db->connect();   

?>


<?php
//profile update
$db_server = "localhost";
$db_user   = "root";
$db_password = "";
$db_database = "grill_island";

$connection = mysqli_connect($db_server, $db_user, $db_password, $db_database);

?>


