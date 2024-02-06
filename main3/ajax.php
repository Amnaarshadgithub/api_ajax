<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "health_tracker";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle saving user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Perform database insertion/update
    $sql = "INSERT INTO user_details (age, height, weight) VALUES ($age, $height, $weight)";

    if ($conn->query($sql) === TRUE) {
        $response['message'] = "User details saved successfully";
    } else {
        $response['message'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}

$conn->close();
?>
