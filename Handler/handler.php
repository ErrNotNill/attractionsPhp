<?php

// Include the necessary PHP files for your application
require_once 'db.php'; // Include your database initialization code
require_once 'repo.php'; // Include your repository code

// Define functions to handle different routes

function getCity() {
    $cities = repoGetCity();
    return $cities;
}

function getTravelers() {
    $travelers = repoGetTraveler();
    return $travelers;
}

function getSight() {
    $sights = repoGetSight();
    return $sights;
}

function addSightByTraveler() {
    $sights = repoGetSight();
    return $sights;
}

// Determine the requested route and method
$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

// Handle the route and method

switch ($requestUri) {
    case '/':
        if ($requestMethod === 'GET') {
            // Handle GET request for the root route
            echo "Handle GET request for the root route";
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    case '/get_city':
        if ($requestMethod === 'GET') {
            // Handle GET request for '/get_city' route
            $cities = getCity();
            header('Content-Type: application/json');
            echo json_encode($cities);
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    case '/get_travelers':
        if ($requestMethod === 'GET') {
            // Handle GET request for '/get_travelers' route
            $travelers = getTravelers();
            header('Content-Type: application/json');
            echo json_encode($travelers);
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    case '/get_sight':
        if ($requestMethod === 'GET') {
            // Handle GET request for '/get_sight' route
            $sights = getSight();
            header('Content-Type: application/json');
            echo json_encode($sights);
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    case '/add_sight':
        if ($requestMethod === 'POST') {
            // Handle POST request for '/add_sight' route
            $sights = addSightByTraveler();
            header('Content-Type: application/json');
            echo json_encode($sights);
        } else {
            http_response_code(405); // Method Not Allowed
            echo "Method Not Allowed";
        }
        break;
    default:
        http_response_code(404); // Not Found
        echo "Not Found";
        break;
}
