<?php
// use built-in html called htmlspecialchars to prevent XSS attacks
//xss attack is a type of security vulnerability
// it occurs when an attacker injects malicious scripts into web pages viewed by other users
// it converts special characters to HTML entities
// for example, < becomes &lt; and > becomes &gt;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $favoritePetInput = htmlspecialchars($_POST["favoritePet"]);

    // security at backend is better than frontend html required attribute
    if (empty($firstName) || empty($password)) {
        header("Location: /formFolder/form.php");
        exit();
    }

    echo "These are the data, you have submitted through the form:<br>";
    echo "Username: " . $firstName . "<br>";
    echo "Password: " . $password . "<br>";
    echo "Favorite Pet: " . $favoritePetInput . "<br>";
    header("Location: /formFolder/form.php"); // redirect to form.php after processing
    exit();
} else {
    header("Location: /formFolder/form.php");
}
