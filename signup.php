<?php include("db_config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Signup</h1>
    <form action="signup_process.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br>
        
        <input type="submit" value="Signup">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
