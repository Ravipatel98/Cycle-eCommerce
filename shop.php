<?php


//include and define require files and constants
require_once 'products.php';
require_once 'purchase.php';

// set error handler
error_reporting(0);
set_error_handler("errorMsg");
set_exception_handler("ExceptionMsg");

// check session. if session is not set redirect to login page
// create header and set the title of the page
createPageHeader('Shop', " ");

//set all the variables for input field
?>

<div class="wrapper">
    <!--display page title-->
    <h2>Shop</h2>
    <!--form for purchase product-->
    <div class="row">
        <?php
$products = new products();
// iterate over products array to reduce code and save my time so that i can play fifa xD
foreach ($products->items as $product) {
?>
        <div class="column">
            <div class="content">
                <img style="width=200px; height=400px;" alt="404"
                    src=<?php print(FOLDER_IMAGES . $product->getProductImage()); ?>>
                <h5><?php print_r($product->getProductCode()); ?></h5>
                <h3>$ <?php print_r($product->getProductSellingPrice()); ?></h3>
                <?php if (readSession()) {
               ?>
                <button class="w3-button w3-black" type="submit">
                    <i class="fa fa-paper-plane"></i> <a
                        href='shop_details.php?ID=<?php print_r($product->getProductUUID()); ?>'> VIEW DETAILS >> </a>
                </button>
                <?php
}
?>
            </div>
        </div>
        <?php
}
?>
    </div>
</div>

<?php
// create footer using common function
createPageFooter('footer');
?>