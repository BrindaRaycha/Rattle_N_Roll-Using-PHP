<?php
$itemNo            = $_REQUEST['item_number'];
$itemTransaction   = $_REQUEST['tx']; // Paypal transaction ID
$itemPrice         = $_REQUEST['amt']; // Paypal received amount
$itemCurrency      = $_REQUEST['cc']; // Paypal received currency type
 
$price = $_REQUEST['amount'];
$currency=$_REQUEST['currency_code'];
 
if($itemPrice==$price && $itemCurrency==$currency)
{
    echo "Payment Successful";
	header('location:payment.php');
}
else
{
    echo "Payment Failed";
}
?>