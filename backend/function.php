<?php

    include '_db.php';
    
    function pr($arr){
        
    }

    function prx($arr){

    }

    function get_safe_value($conn, $str){
        return mysqli_real_escape_string($conn, $str);
    }
?>