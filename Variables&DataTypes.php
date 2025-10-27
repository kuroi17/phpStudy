<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <p>wow</p>

    <?php

    // Scalar Data Types in PHP
    $name = "John";
    $age = 30;
    $is_student = false;
    $float = 5.75;

    // Compound Data Types in PHP
    $fruits = array("Apple", "Banana", "Cherry");
    $fruits = ["Apple", "Banana", "Cherry"]; // Another way to create array


    // outputting variables
    //string concatenation is dot operator
    echo "Name: " . $name . "<br>";
    echo "Age: " . $age . "<br>";
    echo "Is Student: " . ($is_student ? "Yes" : "No") . "<br>";
    echo "Float: " . $float . "<br>";

    ?>
    <!-- Embedding PHP within HTML -->
    <p>Hi my name is <?php echo $name; ?></p>
</body>


</html>