<?php

class addToCart{
    function addProduct($pid, $qty){
        if(isset($_SESSION['cart'][$pid])) {
            $_SESSION['cart'][$pid]['qty'] += $qty; // Increment quantity if product already in cart
        } else {
            $_SESSION['cart'][$pid]['qty'] = $qty; // Add new product to cart
        }
    }

    function updateCart($pid, $qty){
        if(isset($_SESSION['cart'][$pid])){
            $_SESSION['cart'][$pid]['qty'] = $qty; // Update quantity
        }
    }

    function removeProduct($pid){
        if(isset($_SESSION['cart'][$pid])){
            unset($_SESSION['cart'][$pid]); // Remove product from cart
        }
    }

    function getTotalItems(){
        return count($_SESSION['cart']); // Return total number of items in the cart
    }
}

?>
