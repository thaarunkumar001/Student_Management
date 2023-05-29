<?php
// Database connection details

$host = 'localhost';
$dbname = 'student_attandance';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle the GET request
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retrieve rollno and data from the query parameters
    $rollno = $_GET['rollno'];
    $newData = $_GET['data'];

    // Update the data in the database
    $query = "UPDATE sdata SET attendance = :newData WHERE rollNo = :rollno";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':newData', $newData);
    $stmt->bindParam(':rollno', $rollno);
    $stmt->execute();

    // Return a response (e.g., success or error message)
    if ($stmt->rowCount() > 0) {
        echo "Data updated successfully.";
    } else {
        echo "Failed to update data.";
    }
}

