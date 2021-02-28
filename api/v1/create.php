<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization,X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/Company.php';
// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

$company = new Company($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));
$SessionID = (htmlspecialchars(strip_tags($data->SessionID)));

//Company checks, creation and responses
if (!$company->checkSessionID($SessionID)) {
    if ($company->checkValues($data)) {
        if ($data = $company->create()) {
            echo json_encode($data);
        } else {
            http_response_code(500);
            echo json_encode(['Error' => 'Company Not Created']);
        }
    }
} else {
    http_response_code(400);
    echo json_encode(['Error' => 'SessionID: ' . $SessionID . ' already exist']);
}


