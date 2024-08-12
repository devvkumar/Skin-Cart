<?php
include '_db.php';
include 'function.php';

session_start();

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$cat_res = mysqli_query($conn, "SELECT * FROM categories WHERE status = 1 ORDER BY category DESC");
$cat_arr = array();

while ($row = mysqli_fetch_assoc($cat_res)) {
    $cat_arr[] = $row; // Collect all rows in an array
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php include 'backend/link.php'; ?>
</head>

<body>
    
    <?php include 'header.php'?>
    <!-- Rest of your HTML content -->

    <!-- Image slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/1.webp" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/2.webp" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/3.webp" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- End image slider -->

    <!-- Top Brands -->
    <div class="scrolling-wrapper">
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/apple.png" alt="Apple">
                <h2>Apple</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/Asus.png" alt="Asus">
                <h2>Asus</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/nothing.png" alt="Nothing">
                <h2>Nothing</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/oneplus.png" alt="One Plus">
                <h2>One Plus</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/poco.png" alt="Poco">
                <h2>Poco</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/Realme_logo.png" alt="Realme">
                <h2>Realme</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/Samsung.png" alt="Samsung">
                <h2>Samsung</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/Vivo.png" alt="Vivo">
                <h2>Vivo</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/Tecno.png" alt="Techno">
                <h2>Techno</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/google.png" alt="Google">
                <h2>Google</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/iqoo.png" alt="Iqoo">
                <h2>Iqoo</h2>
            </a>
        </div>
        <div class="card">
            <a href="https://google.com">
                <img src="assets/logo/xiaomi.png" alt="Xiaomi">
                <h2>Xiaomi</h2>
            </a>
        </div>
    </div>

    <!-- Best Selling Mobile Skins -->

    <div class="card-container">

<?php
// Assuming get_product is a function defined in function.php
$get_product = get_product($conn, 'latest', 2);
foreach ($get_product as $list) {
?>
    <a href="product.php?id=<?php echo $list['id']; ?>">
        <div class="shop-card">
            <div class="shop-image-card">
                <img class="ts_image" src="media/product/<?php echo $list['image']; ?>" alt="<?php echo $list['name']; ?>">
            </div>
            <div class="name-shop-card"><?php echo $list['name']; ?></div>
            <div class="price-tag-card">
                <div class="mrp-shop-card"><?php echo $list['mrp']; ?></div>
                <div class="price-shop-card"><?php echo $list['price']; ?></div>
            </div>
        </div>
    </a>
<?php 
}
?>

</div>
    <!-- Image slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="assets/4.webp" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/5.webp" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="assets/6.webp" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- End image slider -->

    <?php include 'footer.php'?>


    <script src="js/script.js"></script>
</body>

</html>
