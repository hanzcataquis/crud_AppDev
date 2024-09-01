<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products (name, description, price, quantity) VALUES ('$name', '$description', '$price', '$quantity')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <h1>Create Product</h1>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="create.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name"><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description"><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price"><br>

        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>