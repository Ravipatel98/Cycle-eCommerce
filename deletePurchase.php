<?php


// include all file/ constants needed
include_once 'purchase.php';

    $purchase = new purchase();
    // check delete purchase query
    if(isset($_POST["deleteQuery"])){
        $purchase_id = $_POST["deleteQuery"];
        // if delete query not empty call delete function
        if(!empty($_POST["deleteQuery"])){
            // set query value in the variable
            $purchase_id = $_POST["deleteQuery"];
            $purchase->delete($purchase_id);
        }
    }