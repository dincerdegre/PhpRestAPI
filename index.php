<?php
require './src/inc/bootstap.php';
require './src/lib/response.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode( '/', $uri );
$method = $_SERVER["REQUEST_METHOD"];

if ($uri[1] !== 'api' && $uri[1] !== "") {
    return response();
}

if ($uri[1] === "") {
    $data = array(
        'message' => 'Welcome to the Rest API',
    );
    return response($data);
}

if ($uri[1] == "api"){
    if ($method == "GET"){
        // GET
        $data = array(
            'message' => 'Get Method',
        );
        return response($data);
    } else if ($method == "POST"){
        $input = (array) json_decode(file_get_contents('php://input'), TRUE);
        $response[] = $input;
        $data = array(
            'message' => 'Post Method',
            ...$input
        );
        return response($data); 
    }
}