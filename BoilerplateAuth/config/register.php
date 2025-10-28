<?php
session_start();
require "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: index.php?registered=1");
        exit;
    } else {
        $error = "Username already exists.";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>

    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter username" required><br><br>
        <input type="password" name="password" placeholder="Enter password" required><br><br>
        <button type="submit">Register</button>
    </form>

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <a href="index.php">Already have an account? Login</a>

</body>

</html>