<?php
include 'function.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$msg = '';

if (isset($_POST["add-product"])) {
    // Sanitize and retrieve input values
    $rating = get_safe_value($conn, $_POST["rating"]);
    $company = get_safe_value($conn, $_POST["company"]);
    $id = get_safe_value($conn, $_POST["id"]);
    $catId = get_safe_value($conn, $_POST["cat-id"]);
    $name = get_safe_value($conn, $_POST["name"]);
    $mrp = get_safe_value($conn, $_POST["mrp"]);
    $price = get_safe_value($conn, $_POST["price"]);
    $qty = get_safe_value($conn, $_POST["qty"]);
    $short_desc = get_safe_value($conn, $_POST["short_desc"]);
    $description = get_safe_value($conn, $_POST["description"]);
    $meta_title = get_safe_value($conn, $_POST["meta_title"]);
    $meta_desc = get_safe_value($conn, $_POST["meta_desc"]);
    $meta_keyword = get_safe_value($conn, $_POST["meta_keyword"]);
    $status = get_safe_value($conn, $_POST["status"]);

    // Check if an image file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageDestination = '../media/product/' . $image;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            // File successfully uploaded
        } else {
            // File upload failed
            $msg = "Failed to upload image.";
            $image = ''; // Set image to an empty string if upload fails
        }
    } else {
        // No image uploaded or there was an upload error
        $image = 'default_image.jpg'; // Use default image if no image uploaded
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            // Update product if ID is set
            $update_sql = "UPDATE product SET 
                category_id='$catId',
                name='$name',
                mrp='$mrp',
                price='$price',
                qty='$qty',
                short_desc='$short_desc',
                description='$description',
                meta_title='$meta_title',
                meta_desc='$meta_desc',
                meta_keyword='$meta_keyword',
                status='$status',
                image='$image'
                WHERE id='$id'";
            mysqli_query($conn, $update_sql);
        } else {
            // Insert new product
            $insert_sql = "INSERT INTO product (category_id, name, mrp, price, qty, Company, rating, short_desc, description, meta_title, meta_desc, meta_keyword, status, image) 
                VALUES ('$catId', '$name', '$mrp', '$price', '$qty', '$company', '$rating', '$short_desc', '$description', '$meta_title', '$meta_desc', '$meta_keyword', '$status', '$image')";
            mysqli_query($conn, $insert_sql);
        }
        header('Location: view-product.php');
        die();
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sales</title>
    <?php include 'link.php'; ?>
</head>

<body class="crm_body_bg">

    <?php include 'header.php' ?>
    <section class="main_content dashboard_part large_header_bg">
        <div class="container-fluid g-0">
            <?php include 'header1.php' ?>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid p-0 sm_padding_15px">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Fill all Product details</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="row mb-3">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="status">Category ID</label>
                                                <select id="status" name="cat-id" class="form-control" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">Mobile</option>
                                                    <option value="2">Laptop</option>
                                                </select>

                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label class="form-label" for="name">Product Name</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Product Name" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label" for="mrp">MRP</label>
                                                <input type="text" name="mrp" class="form-control" id="mrp" placeholder="Enter MRP" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label" for="price">Price</label>
                                                <input type="text" name="price" class="form-control" id="price" placeholder="Price" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label class="form-label" for="qty">Quantity</label>
                                                <input type="text" name="qty" class="form-control" id="qty" placeholder="Enter Qty" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="image">Image</label>
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label" for="status">Rating</label>
                                                <select id="status" name="rating" class="form-control" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label class="form-label" for="name">Company Name</label>
                                                <input type="text" name="name" class="form-control" id="company" placeholder="Company Name" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="short_desc">Short Description</label>
                                                <textarea style="height: 150px;" name="short_desc" class="form-control" id="short_desc" placeholder="Enter Short Description" required></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="description">Description</label>
                                                <textarea style="height: 150px;" name="description" class="form-control" id="description" placeholder="Enter Description" required></textarea>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="meta_title">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Enter Meta Title" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="meta_desc">Meta Description</label>
                                                <input type="text" name="meta_desc" class="form-control" id="meta_desc" placeholder="Enter Meta Description" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="meta_keyword">Meta Keyword</label>
                                                <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Enter Meta Keyword" required>
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label" for="status">Status</label>
                                                <select id="status" name="status" class="form-control" required>
                                                    <option selected disabled>Choose...</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" name="add-product" class="btn btn-primary">Add Product</button>

                                        <div><?php echo $msg; ?></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php' ?>
    </section>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <?php include 'jsScript.php'; ?>
</body>

</html>