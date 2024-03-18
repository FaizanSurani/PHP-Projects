<?php
include("db_config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $age = intval($_POST['age']);

    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    $check_query = "SELECT * FROM users WHERE email='$email' OR 'name'='$name'";
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows > 0) {
        echo "Error: User already exists.";
        header("Location: login.php");
        exit;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $insert_query = "INSERT INTO users (name, email, age, password) 
                     VALUES ('$name', '$email', $age, '$password')";

    if ($conn->query($insert_query) === TRUE) {
        echo "Signup successful. You can now login.";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}

$conn->close();
?>
