<?php
require "../../app.php";
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// Basic Aut Eklenecek
$_method = $_SERVER["REQUEST_METHOD"];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
$response = [];
if ($uri[1] == "api"){
    if ($_method == "GET"){
        // GET
        $response["message"] = "GET Method";
    } else if ($_method == "POST"){
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $response[] = $input;
       // POST     
    }
} else {
    $response["error"] = "404";
    $response["message"] = "Page Not Found";
}


// Make Controller
echo json_encode($response);
