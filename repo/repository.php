<?php

require_once 'db.php'; // Include your database initialization code
function addRating($rating) {
    // SightID, TravelerID, RatingValue
    $sights = getSight();
    $sightID = null;
    foreach ($sights as $v) {
        $sightID = $v['SightID'];
    }
    $travelers = getTraveler();
    $travelerID = null;
    foreach ($travelers as $v) {
        $travelerID = $v['TravelerID'];
    }
    $db = new PDO('your_database_connection_string_here');
    $stmt = $db->prepare("INSERT INTO Rating (SightID, TravelerID, RatingValue) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $sightID);
    $stmt->bindParam(2, $travelerID);
    $stmt->bindParam(3, $rating);
    if ($stmt->execute()) {
        echo "Rows inserted successfully\n";
    } else {
        echo "Can't insert data into the database\n";
        print_r($stmt->errorInfo());
    }
}
function addCity() {
    $city = new stdClass();
    // Initialize the city properties, e.g., $city->Name = "New City";
    $city->Name = "New City";
    try {
        // Replace with your database credentials
        $pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare("INSERT INTO City (Name) VALUES (:name)");
        $stmt->bindParam(':name', $city->Name, PDO::PARAM_STR);
        $stmt->execute();
        $rowsAffected = $stmt->rowCount();
        echo "Rows inserted: " . $rowsAffected . PHP_EOL;
    } catch (PDOException $e) {
        echo "Can't insert data to the database" . PHP_EOL;
        die($e->getMessage());
    }
}

function addSightInCity() {
    $sight = new stdClass();
    // Initialize the sight properties, e.g., $sight->SightID = 123;
    $sight->SightID = 123;  // Replace with the actual SightID value
    // Get the list of cities, you should implement the GetCity function accordingly
    $cities = getCity();
    try {
        // Replace with your database credentials
        $pdo = new PDO("mysql:host=localhost;dbname=your_database_name", "your_username", "your_password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($cities as $city) {
            echo $city->CityID . PHP_EOL;
            $stmt = $pdo->prepare("INSERT INTO Sight (CityID) VALUES (:cityID)");
            $stmt->bindParam(':cityID', $city->CityID, PDO::PARAM_INT);
            $stmt->execute();
            $rowsAffected = $stmt->rowCount();
            echo "Rows inserted: " . $rowsAffected . PHP_EOL;
        }
    } catch (PDOException $e) {
        echo "Can't insert data to the database" . PHP_EOL;
        die($e->getMessage());
    }
}

function getCity()
{
    global $Db;
    try {
        $stmt = $Db()->query('SELECT CityID, Name FROM City');
        $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cities;
    } catch (PDOException $e) {
        echo 'Error querying database: ' . $e->getMessage();
    }
    return false;
}

function getTraveler()
{
    global $Db;
    try {
        $stmt = $Db()->query('SELECT TravelerID, Name FROM Traveler');
        $travelers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $travelers;
    } catch (PDOException $e) {
        echo 'Error querying database: ' . $e->getMessage();
    }
    return false;
}

function getSight()
{
    global $Db;
    try {
        $stmt = $Db()->query('SELECT SightID, Title, Distance FROM Sight LEFT JOIN City ON City.CityID = Sight.CityID');
        $sights = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $sights;
    } catch (PDOException $e) {
        echo 'Error querying database: ' . $e->getMessage();
    }
    return false;
}

