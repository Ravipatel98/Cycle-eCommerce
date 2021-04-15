<?php



require_once 'customer.php';

//set error handlers
error_reporting(0);
set_error_handler("errorMsg");
set_exception_handler("ExceptionMsg");

//on logout click this page will load and destroy the session
$customer = new customer();
$customer->logout();
?>