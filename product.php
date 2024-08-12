<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'function.php';
require '_db.php';
require 'add_to_cart.php';

$cart = new addToCart();

if (isset($_POST['add_to_cart'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
    $quantity = (int)mysqli_real_escape_string($conn, $_POST['quantity']);
    
    $cart->addProduct($product_id, $quantity);
    header('Location: cart.php'); // Redirect to cart page
    exit();
}

$product_id = mysqli_real_escape_string($conn, $_GET['id']);
$query = "SELECT * FROM product WHERE id = '$product_id' AND status = 1";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

$product = mysqli_fetch_assoc($result);

if (!$product) {
    die("Product not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <?php include 'backend/link.php'; ?>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php include 'header.php';?>
    
    <div class="product-s-card">
        <div class="s-card">
            <div class="product-imgs">
                <div class="img-display">
                    <div class="img-showcase">
                        <img src="media/product/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                    </div>
                </div>
            </div>

            <div class="product-s-content">
                <h2 class="product-s-title"><?php echo htmlspecialchars($product['name']); ?></h2>
                <a href="#" class="product-s-link">Visit Store</a>
                <div class="product-s-price">
                    <p class="last-s-price">Old Price: <span><?php echo htmlspecialchars($product['mrp']); ?></span></p>
                    <p class="new-s-price">New Price: <span><?php echo htmlspecialchars($product['price']); ?></span></p>
                </div>
                <div class="product-s-detail">
                    <h2>About this item:</h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                </div>
                <form method="post" action="product.php?id=<?php echo $product_id; ?>">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="number" min="1" value="1" name="quantity">
                    <button type="submit" name="add_to_cart" class="s-btn">
                        Add to Cart <i class="fas fa-shopping-cart"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <?php include 'footer.php';?>
</body>
</html>
