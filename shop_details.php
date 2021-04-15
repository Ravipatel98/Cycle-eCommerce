<?php
//include 'PHPFunctions/PHPFunctions.php';
include_once 'purchase.php';
define('SCRIPT_FILE', FOLDER_JAVASCRIPT . 'AJAX.js');
require 'product.php';

//set error handlers
//error_reporting(0);
//set_error_handler("errorMsg");
//set_exception_handler("ExceptionMsg");
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
//check session and if not logged in then redirect to index page
if (!readSession()) {
    header("location: login.php");
}

if(isset($_POST)){

}

createPageHeader('Shop Details', " ");
if(isset($_GET['ID'])){
    $product_id = $_GET['ID'];
}
//set all the variables for input field



if(isset($_POST['submitProduct'])){
    $comment = $_POST['comment'];
    $product_id = $_GET['ID'];
    $product_price = $_POST['sellingPrice'];
    $purchase = new purchase();

    $purchase->save($product_id, $comment, $product_price);
}
?>
<div class="wrapper">
    <!--display page title-->
    <h2>Shop Details</h2>
    <!--form for purchase product-->
        <?php
        $product = new product();
        $product->load($product_id);
        ?>

</div>
<main class="container">

<!-- Left Column / Headphones Image -->

<div class="left-column">

<div class="comment-form">   
<form  method="post">
  <img style="height:300px; width:400px;" src=<?php print(FOLDER_IMAGES . $product->getProductImage()); ?>>
   

  <h1>Comment</h1>
  <textarea name="comment" rows="5"></textarea>
</div>
</div>


<!-- Right Column -->
<div class="right-column">

  <!-- Product Description -->
  <div class="product-description">
    <span>Cycle</span>
    <h1><?php echo $product->getProductCode(); ?></h1>
    <p><?php echo $product->getProductDescription(); ?></p>
  </div>

  <!-- Product Configuration -->
  <div class="product-configuration">

    <!-- Product Color -->
    <div class="product-color">
      <span>Color</span>

      <div class="color-choose">
        <div>
          <input data-image="black" type="radio" id="black" name="color" value="black">
          <label for="black"><span></span></label>
        </div>
      </div>

    </div>
  </div>

  <!-- Product Pricing -->
  <div class="product-price">
    <span><?php echo $product->getProductSellingPrice(); ?>$</span>
    <input type="hidden" value="<?php echo $product->getProductSellingPrice(); ?>" name="sellingPrice" />
        <button class="cart-btn" type="submit" name="submitProduct">
            <i class="fa fa-paper-plane"></i> Add to Favourites
        </button>
    </form>
  </div>
</div>
</main>
<?php
// create footer using common function
createPageFooter('footer');
?>