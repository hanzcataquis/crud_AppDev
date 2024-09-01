<?php
include 'db.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Product Management</title>
    <h1>Products List</h1>
    <a href="create.php">Create New Product</a>
</head>
<style>
    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
          </tr>
          <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['quantity'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $row['id'] ?>">Edit</a>  
                        <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No products found</td>
            </tr>
        <?php endif; ?>
          <tr></tr>
    </table>
</body>
</html>