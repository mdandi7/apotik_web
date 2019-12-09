<?php

    ob_start();
    $error=""; // Variable To Store Error Message
    $connection = mysqli_connect("localhost", "root", "", "apotik");
    
    $query_ind = $_POST['query_ind'];
    $html = "test";

    //Query
    if($query_ind = "daily"){
        echo $html;
    }
?>