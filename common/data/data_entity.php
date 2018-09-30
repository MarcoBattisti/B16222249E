<?php
class Data{
 
    // Connection instance
    private $connection;

    // database name and table name
    private $table_name = "data";

    // object properties
    public $id;
    public $cap;
    public $cm_codice;
    public $cm_nome;
    public $codice;
    public $codice_catastale;
    public $nome;
    public $provincia_codice; 
    public $provincia_nome;
    public $regione_codice;
    public $regione_nome;
    public $sigla;
    public $zona_codice;
    public $zona_nome;
 
    // constructor with $db as database connection
    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){}
    //R
    public function read($ids){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id in ($ids);";
        
        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}