<?php
require('config\config.php');

// Function to sanitize user input
function sanitizeInput($input) {
    // Implement your sanitization logic here
    // Example: return mysqli_real_escape_string($conn, $input);
    return $input;
}

// Retrieve and sanitize soil parameters data
session_start();
$username = $_SESSION['username'];

$getUserIDQuery = "SELECT userID FROM users WHERE username = '$username'";
$result = $conn->query($getUserIDQuery);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $receivedUserID = $row['userID'];
} else {
    // Handle the case when user ID is not found
    die("User ID not found");
}

$receivedNitrogen = sanitizeInput($_POST['nitrogen']);
$receivedPhosphorus = sanitizeInput($_POST['phosphorus']);
$receivedPotassium = sanitizeInput($_POST['potassium']);
$receivedHumidity = sanitizeInput($_POST['humidity']);
$receivedTemperature = sanitizeInput($_POST['temperature']);
$receivedRainfall = sanitizeInput($_POST['rainfall']);
$receivedPH = sanitizeInput($_POST['pH']);
$receivedLatitude = sanitizeInput($_POST['latitude']);
$receivedLongitude = sanitizeInput($_POST['longitude']);

// Insert the data into the "inputs" table
$sql = "INSERT INTO inputs (userID, nitrogen, phosphorus, potassium, humidity, temperature, rainfall, pH, location, dateTime, predictedResult, certaintyLevel, season)
        VALUES ('$receivedUserID', '$receivedNitrogen', '$receivedPhosphorus', '$receivedPotassium', '$receivedHumidity', '$receivedTemperature', '$receivedRainfall', '$receivedPH', POINT('$receivedLatitude', '$receivedLongitude'), now(), 'Kangkongchips', '3.0', 'Bagsakan')";

if ($conn->query($sql) === TRUE) {
    echo "Record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
