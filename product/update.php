<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST ["id"];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products SET name='$name', description='$description', price='$price', quantity='$quantity', updated_at=NOW() WHERE id=$id";    
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
    <h1>Edit Product</h1>
    <link rel="stylesheet" href="">
</head>
<body>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $product['name'] ?>"><br>

        <label for="description">Description:</label>
        <input type="text" id="description" name="description" value="<?= $product['description'] ?>"><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="<?= $product['price'] ?>"><br>

        <label for="quantity">Quantity:</label>
        <input type="text" id="quantity" name="quantity" value="<?= $product['quantity'] ?>"><br><br>

        <input type="submit" value="Update">
    </formaction>
</body>
</html>