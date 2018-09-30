<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Database.php';
include_once 'data_entity.php';
include_once '../../DbConfigs/common_db_config.php';

// instantiate database and product object
$database = new Database();
$commonDbConfig = new CommonDbConfig();
$commonDB = $database->getConnection($commonDbConfig->db_name);

$offices = include('../../homePage/offices/offices.php');

$ids = json_decode($offices, true);

$final_string = implode(",", array_column($ids, 'idItalianMunicipalities'));

// initialize object,
$data = new Data($commonDB);

// query products
$stmt = $data->read($final_string);
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){
 
    // products array
    $data_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $data_item=array(
            "id" => $id,
            "cap" => $cap,
            "cmCodice" => $cm_codice,
            "cmNome" => $cm_nome,
            "codice" => $codice,
            "codiceCatastale" => $codice_catastale,
            "nome" => $nome,
            "provinciaCodice" => $provincia_codice,
            "provinciaNome" => $provincia_nome,
            "regioneCodice" => $regione_codice,
            "regioneNome" => $regione_nome,
            "sigla" => $sigla,
            "zonaCodice" => $zona_codice,
            "zonaNome" => $zona_nome,
        );
 
        array_push($data_arr, $data_item);
    }
 
    echo json_encode($data_arr);
}
 
else{
    echo json_encode(
        array("message" => "No data found.")
    );
}