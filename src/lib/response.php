<?php
require 'status.php';
function response($data=null,$code=404){
    $type = gettype($data);
    if ($data) {
        $code = 200;
    }
    if ($type !== "array") {
        $code = 404;
    }
    http_response_code($code);
    if ($code === 404) {
        $response['message'] = "Not Found";
    }
    if ($code === 200) {
        $response = $data;
    }
	$json_response = json_encode($response);
	echo $json_response;
}