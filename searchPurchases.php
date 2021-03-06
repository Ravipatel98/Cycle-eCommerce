<?php



// include all file/ constants needed
include_once 'purchases.php';

// check search purchase query
if (isset($_POST["searchQuery"])) {
    if (empty($_POST["searchQuery"])) {
        $searchQuery = null;
    } else {
        $searchQuery = $_POST["searchQuery"];
    }
    // create purchases object to load data for purchases by customer logged in
    $purchases = new purchases($searchQuery);
    global $showPrint, $showColor, $div_color;
    // create table columns and their headers
    echo '<table id="t01">
        <tr>
            <th>Delete</th>
            <th>Product Code</th>
            <th>Comments</th>
            <th>Price</th>
        </tr>';
    
    // itterate over purchases array to show purchases data
    foreach ($purchases->items as $data) {
        // check for command equal to color and set the div value
        if ($showColor) {
            if ($data->getPurchaseProductPrice() < 100) {
                $div_color = 'color-red';
            } else if ($data->getPurchaseProductPrice() >= 100 && $data->getPurchaseProductPrice() < 999.99) {
                $div_color = 'color-orange';
            } else {
                $div_color = 'color-green';
            }
        }
        
        //display each row
        echo '  <tr id="' . $data->getPurchaseUUID() . '" value="' . $data->getPurchaseUUID() . '">';
        //display delete button
        echo '<th><button class="w3-button w3-black" id="' . $data->getPurchaseUUID() . '" onclick="deletePurchases()">DELETE</button> </th>';
        // display purchases details
        echo "<th>" . $data->getProductCode() . "</th>
                <th>" . $data->getPurchaseComment() . "</th>
                <th>$" . $data->getPurchaseProductPrice() . "</th>
            </tr>";
    }
    echo '</table>';
}
?>