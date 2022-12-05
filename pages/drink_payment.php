<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');

extract($_POST);
//echo '<pre>'; print_r($_POST); exit;
   $sql = "INSERT INTO `drinks_invoice`(`room_id`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_address`, `total_amount`,`added_date`) VALUES('$room_id', '$cust_id', '$cust_name', '$cust_email', '$cust_contact', '$cust_address', '$total_amount','".date('Y-m-d')."')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
      $drinks_invoice_id = $conn->insert_id;
  for ($i=0; $i <count($drink_id) ; $i++) { 
  	$sql = "INSERT INTO `drinks_invoice_items`(`drinks_invoice_id`, `drink_id`, `price`, `qty`, `subtotal`) VALUES ('$drinks_invoice_id', '$drink_id[$i]','$price[$i]','$qty[$i]','$subtotal[$i]')";
   $conn->query($sql);
  }
     ?>
<script type="text/javascript">
window.location="../view_drink_payment.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_drink_payment.php";
</script>
<?php } ?>