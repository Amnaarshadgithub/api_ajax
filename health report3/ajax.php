<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch health report data
$sql = "SELECT AVG(quantity) AS waterIntake, 
               SEC_TO_TIME(AVG(TIME_TO_SEC(duration))) AS sleep, 
               SUM(duration) AS exercise,
               SUM(calories_burned) AS caloriesBurned,
               SUM(calories_gained) AS caloriesGained
        FROM water_intake, sleep, exercise";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['waterIntake'] = $row['waterIntake'];
    $response['sleep'] = $row['sleep'];
    $response['exercise'] = $row['exercise'];
    $response['caloriesBurned'] = $row['caloriesBurned'];
    $response['caloriesGained'] = $row['caloriesGained'];
} else {
    $response['error'] = "No data found";
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);

$conn->close();
?>
