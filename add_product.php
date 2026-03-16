<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $imageName = "";

    if (!empty($_FILES["image"]["name"])) {
        $imageName = time() . "_" . $_FILES["image"]["name"];
        move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $imageName);
    }

    $query = "INSERT INTO products (name, description, price, quantity, image)
              VALUES ('$name', '$description', '$price', '$quantity', '$imageName')";

    pg_query($conn, $query);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Retail PLC - Add Product</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    
<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">SmartInventory System</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#inventory">Inventory</a></li>
            <li><a href="add_product.php" class="active">Add Product</a></li>
        </ul>
    </div>
</nav>

<header class="hero">
    <div class="hero-content">
        <h1>Add New Product</h1>
        <p>Expand your inventory with Horizon Retail PLC's SmartInventory System</p>
    </div>
</header>


<section class="section">
    <div class="container">
        <div class="card">
            <h2>Add New Product to Inventory</h2>
            <form method="post" enctype="multipart/form-data" class="product-form">
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter product name">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Enter product description"></textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Price (Rs)</label>
                        <input type="number" id="price" step="0.01" name="price" required placeholder="0.00">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" id="quantity" name="quantity" required placeholder="0">
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" id="image" name="image" accept="image/*">
                    <small>Upload a product image (optional)</small>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <p>&copy; 2026 Horizon Retail PLC. All rights reserved.</p>
    </div>
</footer>

</body>
</html>