<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Admin</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
</head>
<body>
    <h1>Contact Admin</h1>
    <?php
    if(isset($_GET['name'])) {
        $place = htmlspecialchars($_GET['name']); // Sanitize the input
        echo "<p>You're interested in: $place</p>";
    } else {
        echo "<p>Error: Place not specified.</p>";
    }
    ?>
    <form action="submit_contact.php" method="post"> 
        <input type="hidden" name="place" value="<?php echo $place; ?>">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="5" cols="50" required></textarea>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
