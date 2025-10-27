<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handling</title>
</head>

<body>
    <main>
        <!-- Form that sends data using POST method to formHandling.php -->
        <form action="/formFolder/formHandling.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <!-- type= password makes the input field obscure the text entered by the user -->
            <input type="password" id="password" name="password" required>
            <br><br>
            <label for="favoritePet">Favorite Pet:</label>
            <select id="favoritePet" name="favoritePet">
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bird">Bird</option>
                <option value="fish">Fish</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
            <!-- when user clicks submit button, the form data is sent as HTTP POST REQUEST to the action URL which is "formHandling.php" for processing -->
            <!-- the html button has default function where it navigates to the action URL which is the formHandling.php -->
        </form>
    </main>
</body>

</html>