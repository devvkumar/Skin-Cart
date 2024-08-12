<?php

use function PHPSTORM_META\type;

function pr($arr) {
    // Function implementation
}

function prx($arr) {
    // Function implementation
}

function get_safe_value($conn, $str){
    return mysqli_real_escape_string($conn, $str);
}

function get_product($conn, $type = '', $limit = '', $cat_id = '', $product_id = '') {
    $sql = "SELECT * FROM product WHERE 1"; // Using WHERE 1 as a base condition

    if ($cat_id != "") {
        $sql .= " AND category_id = '$cat_id'";
    }

    if ($product_id != "") {
        $sql .= " AND id = '$product_id'";
    }

    if ($type == 'latest') {
        $sql .= " ORDER BY id DESC";
    }

    if ($limit != '') {
        $sql .= " LIMIT $limit";
    }

    $res = mysqli_query($conn, $sql);

    $data = array();

    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }

    return $data;
}




// Call the function to test it


?>
