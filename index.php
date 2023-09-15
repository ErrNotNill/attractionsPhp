<?php

// Include the necessary PHP files for your application
require_once 'db.php'; // Include your database initialization code
require_once 'router.php'; // Include your router code
try {
    $conn = new PDO("mysqld:mysql@tcp(45.141.79.120:3306)/Onviz");
    echo "Connected to db successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database :" . $pe->getMessage());
}
// Initialize the database - replace with your database initialization code
initDB("mysqld:mysql@tcp(45.141.79.120:3306)/Onviz");

// Initialize the router - replace with your router initialization code
$router = initRouter();

// Start the PHP built-in web server on port 8080
$host = 'localhost';
$port = 8080;
echo "Server is running at http://$host:$port" . PHP_EOL;
exec("php -S $host:$port -t .");
