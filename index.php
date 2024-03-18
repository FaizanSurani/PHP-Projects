<?php include("db_config.php");
session_start();
$sql = "SELECT * FROM places";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>        
            <?php endif; ?>
        </ul>
    </nav>
    <h1>Welcome to our Travel Website!</h1>
     <h2>Explore Our Featured Places</h2>
    <div class="place-list">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='place'>";
                echo "<h3>" . $row["name"] . "</h3>";
                echo "<p>" . $row["description"] . "</p>";
                echo '<a href="contact_form.php?name=' . urlencode($row['name']) . '">Contact Admin</a>';
                echo "</div>";
            }
        } else {
            echo "No places found.";
        }
        ?>
    </div>
</body>
</html>
