<?php
// Define a global variable for the database connection
global $Db;

function initDB()
{
    global $Db;

    try {
        // Create a PDO connection - replace with your database credentials
        $dsn = "mysql:host=localhost;dbname=Onviz"; // Modify the host and dbname as needed
        $username = "mysqld"; // Replace with your MySQL username
        $password = "mysql"; // Replace with your MySQL password

        $Db = new PDO($dsn, $username, $password);
        $Db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Not connected" . PHP_EOL;
        die($e->getMessage());
    }
}

