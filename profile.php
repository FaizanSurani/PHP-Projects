<?php
include("db_config.php");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['username'];
    $email = $row['email'];
    $dob = $row['dob'];
} else {
    echo "Error: User not found.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <h1>Welcome, <span class="name"><?php echo $username; ?></span>!</h1>
    <div class="profile-info">
        <p>Your Profile Information:</p>
        <label for="name">Name:</label>
        <input type="text" id="name" class="name" value="<?php echo $username; ?>" placeholder="Enter your name"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" class="email" value="<?php echo $email; ?>" placeholder="Enter your email"><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" class="age" value="<?php echo $dob; ?>" placeholder="Enter your age"><br>
    </div>
    <div class="logout-link">
        <input type="submit" class="submit-button" value="Save Changes">
        <p><a href="logout.php">Logout</a></p>
    </div>
</div>
</body>
</html>