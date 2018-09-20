<?php
class Office{
 
    // Connection instance
    private $connection;

    // database name and table name
    private $table_name = "offices";

    // object properties
    public $label;
    public $value;
 
    // constructor with $db as database connection
    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){}
    //R
    public function read(){
        $query = "SELECT * FROM " . $this->table_name;

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}