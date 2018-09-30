<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Database.php';
include_once 'entity.php';
include_once '../../DbConfigs/home_db_config.php';

// instantiate database and product object
$database = new Database();
$homeDbConfig = new HomeDbConfig();
$db = $database->getConnection($homeDbConfig->db_name);

// initialize object,
$navbarPages = new NavbarPages($db);

// query products
$stmt = $navbarPages->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $navbarPages_arr=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $navbarPages_item=array(
            "path" => $path,
            "name" => $name,
        );
 
        array_push($navbarPages_arr, $navbarPages_item);
    }
 
    echo json_encode($navbarPages_arr);
}
 
else{
    echo json_encode(
        array("message" => "No navbar-pages found.")
    );
}