<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Database.php';
include_once 'entity.php';
include_once '../db_config.php';  

// instantiate database and product object
$database = new Database();
$dbConfig = new DbConfig();
$db = $database->getConnection($dbConfig->db_name);

// initialize object,
$request = new Request($db);

// query products
$stmt = $request->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $requests_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $request_item=array(
            "label" => $label,
            "value" => $value,
        );
 
        array_push($requests_arr, $request_item);
    }
 
    echo json_encode($requests_arr);
}
 
else{
    echo json_encode(
        array("message" => "No request found.")
    );
}