<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    echo $_SERVER["DOCUMENT_ROOT"];
    echo "<br>";
    echo $_SERVER["PHP_SELF"];
    echo "<br>";
    echo $_SERVER["SERVER_NAME"];
    echo "<br>";
    echo $_SERVER["HTTP_HOST"];
    echo "<br>";
    echo $_SERVER["REQUEST_URI"];
    echo "<br>";
    echo $_SERVER["REQUEST_METHOD"];
    echo "<br>";


    // /builtIn.php?name=john&age=25 -> example URL that u can put in the end of url
    // GET METHOD works through URL
    // to access the data sent by GET method 
    // we use $_GET superglobal array
    // GET method is used to get data from the server
    // data is visible in the URL
    // POST method is used to send data to the server
    // data is not visible in the URL
    echo $_GET['name'];
    echo "<br>";
    echo $_GET['age'];

    echo "<br>";
    echo $_FILES[""]; //useful for getting data about uploaded files in te server
    echo "<br>"; // it shows information like file name, size, type, temporary name etc.
    echo $_COOKIE[""]; // useful for getting data stored in cookies
    // cookies are small files stored on the client's computer
    // used to remember user preferences, login information etc.
    echo "<br>";
    echo $_SESSION[""]; // useful for getting data stored in sessions
    // sessions are used to store data on the server for individual users
    echo "<br>";
    $_SESSION["username"] = "john_doe"; // setting a session variable
    echo $_SESSION["username"]; // accessing the session variable
    echo "<br>";
    echo $_ENV[""]; // useful for getting environment variables

    //superglobal arrays:
    $_SERVER[""];
    $_GET[""];
    $_POST[""];
    $_REQUEST[""];
    $_FILES[""];
    $_COOKIE[""];
    $_SESSION[""];
    $_ENV[""];
    ?>

</body>

</html>