<?php
require 'function.php';
require '_db.php';
require 'add_to_cart.php';

$cart = new addToCart();

if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/cart.css">
    <?php include 'backend/link.php'; ?>
</head>

<body>

    <?php include 'header.php'; ?>

    <h1>Shopping Cart</h1>

    <div class="shopping-cart">

        <div class="column-labels">
            <label class="product-image">Image</label>
            <label class="product-details">Product</label>
            <label class="product-price">Price</label>
            <label class="product-quantity">Quantity</label>
            <label class="product-removal">Remove</label>
            <label class="product-line-price">Total</label>
        </div>

        <?php
        foreach ($_SESSION['cart'] as $pid => $details) {
            // Fetch product details from the database
            $product = get_product($conn, '', '', '', $pid);
            if (count($product) > 0) {
                $product = $product[0];
                ?>
                <div class="product">
                    <div class="product-image">
                    <img src="media/product/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    </div>
                    <div class="product-details">
                        <div class="product-title"><?php echo $product['name']; ?></div>
                        <p class="product-description"><?php echo $product['desc']; ?></p>
                    </div>
                    <div class="product-price"><?php echo $product['price']; ?></div>
                    <div class="product-quantity">
                        <input type="number" value="<?php echo $details['qty']; ?>" min="1">
                    </div>
                    <div class="product-removal">
                        <button class="remove-product">Remove</button>
                    </div>
                    <div class="product-line-price"><?php echo $product['price'] * $details['qty']; ?></div>
                </div>
                <?php
            }
        }
        ?>

        <div class="totals">
            <div class="totals-item">
                <label>Subtotal</label>
                <div class="totals-value" id="cart-subtotal">71.97</div>
            </div>
            <div class="totals-item">
                <label>Tax (5%)</label>
                <div class="totals-value" id="cart-tax">3.60</div>
            </div>
            <div class="totals-item">
                <label>Shipping</label>
                <div class="totals-value" id="cart-shipping">15.00</div>
            </div>
            <div class="totals-item totals-item-total">
                <label>Grand Total</label>
                <div class="totals-value" id="cart-total">90.57</div>
            </div>
        </div>

        <button class="checkout">Checkout</button>

    </div>

    <?php include 'footer.php'; ?>

    <script src="js/script.js"></script>
</body>

</html>

<?php
} else {
    echo "Your cart is empty.";
}
?>
