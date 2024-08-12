<?php 
include 'function.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$msg = '';

if(isset($_POST["add-categories"])){
    // Sanitize and retrieve input values
    $categories = get_safe_value($conn, $_POST["cat-name"]);
    $status = get_safe_value($conn, $_POST["status"]);

    // Prepare the SQL query to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO categories (category, status) VALUES (?, ?)");
    $stmt->bind_param("ss", $categories, $status);

    // Execute the query and check for errors
    if($stmt->execute()){
        echo $msg = "Category added successfully.";
    } else {
        echo "Error adding category: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
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
            <?php include 'header1.php'?>
        </div>

        <div class="main_content_iner">
            <div class="container-fluid p-0 sm_padding_15px">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_card card_height_100 mb_30">
                            <div class="white_card_header">
                                <div class="box_header m-0">
                                    <div class="main-title">
                                        <h3 class="m-0">Fill all categories details</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="white_card_body">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label" for="cat-name">Category Name</label>
                                                <input type="text" name="cat-name" class="form-control" id="cat-name" placeholder="Category Name" required>
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
                                        <button type="submit" name="add-categories" class="btn btn-primary">Add Category</button>

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
