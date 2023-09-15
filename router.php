<?php
require_once 'Handler/handler.php'; // Include your handler code


$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($requestUri) {
    case '/':
        if ($requestMethod === 'GET') {
            Handler::template();
        } else {
            http_response_code(405); // Method Not Allowed
        }
        break;
    case '/get_city':
        if ($requestMethod === 'GET') {
            Handler::getCities();
        } else {
            http_response_code(405); // Method Not Allowed
        }
        break;
    case '/get_travelers':
        if ($requestMethod === 'GET') {
            Handler::getTravelers();
        } else {
            http_response_code(405); // Method Not Allowed
        }
        break;
    case '/get_sight':
        if ($requestMethod === 'GET') {
            Handler::getSight();
        } else {
            http_response_code(405); // Method Not Allowed
        }
        break;
    case '/add_sight':
        if ($requestMethod === 'POST') {
            Handler::addSightByTraveler();
        } else {
            http_response_code(405); // Method Not Allowed
        }
        break;
    default:
        http_response_code(404); // Not Found
        echo "Not Found";
        break;
}
