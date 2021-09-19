<?php 

   class Database{

    private  $dbname = 'grill_island';
    private  $host = '127.0.0.1:3307';
    private  $user = 'root';
    private  $password = '';
    // private  $charset = 'utf8mb4';

    public $dbh = null;

    public function connect(){
        $this-> dsn= "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
        // echo "connect";

        try {
            $this->dbh = new PDO($this->dsn, $this->user,$this->password);
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