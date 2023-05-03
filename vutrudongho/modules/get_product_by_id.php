<?php
    function get_product_by_id ($productID){

        $product = mysqli_query(connectDatabase(), "select * from product where ProductID ='$productID'");

        $product = mysqli_fetch_array($product);

        return $product;
    }





?>