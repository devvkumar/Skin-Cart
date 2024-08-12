<?php
include 'function.php';

$sql = "SELECT * FROM categories ORDER BY id DESC";
$res = mysqli_query($conn, $sql);

if (!$res) {
    echo "Error: " . mysqli_error($conn);
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
        <?php include 'header1.php' ?>

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                <div class="row">
                    <div class="col-12">
                        <div class="page_title_box d-flex align-items-center justify-content-between">
                            <div class="page_title_left">
                                <h3 class="f_s_30 f_w_700 text_white">Dashboard</h3>
                                <ol class="breadcrumb page_bradcam mb-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Salessa </a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Sales</li>
                                </ol>
                            </div>
                            <div>
                                <a href="add-user.php" class="white_btn3">Create User</a>
                                <a href="edit-user.php" class="white_btn3">Edit User</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="white_card card_height_100  mb_20">
                        <div class="QA_table ">
                            <table class="table lms_table_active2 p-0">
                                <thead>
                                    <tr>
                                        <th scope="col">S no.</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($res)){ ?>
                                    <tr>
                                        <td class="f_s_14 f_w_400 color_text_2"><?php echo $i; ?></td>
                                        <td class="f_s_14 f_w_400 color_text_3"><?php echo $row['id']; ?></td>
                                        <td class="f_s_14 f_w_400 color_text_4"><?php echo $row['category']; ?></td>
                                        <td class="f_s_14 f_w_400 text-end"><a href="#" class="badge_btn_1"><?php echo $row['status']; ?></a></td>
                                        <td class="f_s_14 f_w_400 text-end"><a href="#" class="badge_btn_1">Delete</a></td>
                                    </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'footer.php' ?>
    </section>

    <?php include 'jsScript.php' ?>
</body>
</html>
