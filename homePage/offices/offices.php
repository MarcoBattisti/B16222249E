<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Database.php';
include_once 'office_entity.php';
include_once '../../DbConfigs/home_db_config.php';

// instantiate database and product object
$database = new Database();
$homeDbConfig = new HomeDbConfig();
$db = $database->getConnection($homeDbConfig->db_name);

// initialize object,
$office = new Office($db);

// query products
$stmt = $office->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $offices_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $office_item=array(
            "id" => $id,
            "idItalianMunicipalities" => $id_italian_municipalities,
        );
 
        array_push($offices_arr, $office_item);
    }
 
    return json_encode($offices_arr);
}
 
else{
    return json_encode(
        array("message" => "No office found.")
    );
}