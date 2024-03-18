<?php
include("db_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $place = $_POST['place'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO submissions (place, name, email, message) VALUES ('$place', '$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
} else {
    echo "Invalid request method";
}
?>
