<?php
include 'db.php';
$result = pg_query($conn, "SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon Retail PLC - SmartInventory System</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">SmartInventory System</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="#inventory">Inventory</a></li>
            <li><a href="add_product.php">Add Product</a></li>
        </ul>
    </div>
</nav>

<header class="hero">
    <div class="hero-content">
        <h1>Welcome to Horizon Retail PLC</h1>
        <p>A leading distributor of consumer electronics in Sri Lanka</p>
        <p>For the past 8 years, we have operated our "SmartInventory" system on a single physical server located in our Colombo head office.</p>
    </div>
</header>

<section id="about" class="section">
    <div class="container">
        <h2>About Horizon Retail PLC</h2>
        <p>Horizon Retail PLC is committed to providing high-quality consumer electronics to customers across Sri Lanka. Our SmartInventory system ensures efficient management of our product catalog, enabling us to serve our customers better.</p>
        <div class="stats">
            <div class="stat">
                <h3>8+ Years</h3>
                <p>Operating Experience</p>
            </div>
            <div class="stat">
                <h3>Colombo HQ</h3>
                <p>Head Office Location</p>
            </div>
            <div class="stat">
                <h3>SmartInventory</h3>
                <p>Advanced System</p>
            </div>
        </div>
    </div>
</section>

<section id="inventory" class="section">
    <div class="container">
        <div class="card">
            <h2>Product Inventory Dashboard</h2>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price (Rs)</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = pg_fetch_assoc($result)) { ?>
                    <tr>
                        <td>
                            <?php if($row['image']) { ?>
                                <img src="uploads/<?php echo $row['image']; ?>" class="product-img" alt="<?php echo $row['name']; ?>">
                            <?php } else { ?>
                                <span>No Image</span>
                            <?php } ?>
                        </td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['description']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td>
                            <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
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