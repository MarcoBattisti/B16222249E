<?php
class Database{
 
    // specify your own database credentia
    private $connectionType = "mysql";
    private $host = "localhost";
    private $username = "admin_001";
    private $password = "admin_001";
    public $conn;
 
    // get the database connection
    public function getConnection($db_name){
 
        $this->conn = null;
        try{
            $this->conn = new PDO($this->connectionType . ":host=" . $this->host . ";dbname=" . $db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>