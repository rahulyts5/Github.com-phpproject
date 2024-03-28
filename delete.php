<?php
include("dbconn.php");


    $id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM `pro` WHERE product_id = $id") ;
    header('location:index.php');

?>