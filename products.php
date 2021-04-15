<?php



require_once 'database-connection.php';
require_once 'Collection.php';
require_once 'product.php';
class products extends collection {

    function __construct() {
        #when this code will be called
        #when we create object of the class then cunstructor is called

        #global Database Connection
        global $pdo;
        
        #sql Stored procedure call
        $sqlQuery = "CALL select_products()";
        try{
            if ($stmt = $pdo->prepare($sqlQuery)) {
                // Attempt to execute the prepared statement
                $stmt->execute();
                //fetch the results
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //add it to product object
                    $product = new product($row[COLUMN_PRODUCT_UUID], $row[COLUMN_PRODUCT_CODE], $row[COLUMN_PRODUCT_DESCRIPTION], $row[COLUMN_PRODUCT_SELLING_PRICE], $row[COLUMN_PRODUCT_COST_PRICE], $row["product_image"]);
                    //add product object to the array list
                    $this->add($row[COLUMN_PRODUCT_UUID], $product);
                }
                // close statement
                unset($stmt);
            }            
        } catch (PDOException $e){
            echo "Oops! Something went wrong. Please try again later.";
            databaseErrorMessage($e);
        }

        // close connection
        unset($pdo);
    }

}

?>