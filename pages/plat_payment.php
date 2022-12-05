<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');

extract($_POST);
//echo '<pre>'; print_r($_POST); exit;
   $sql = "INSERT INTO `plats_invoice`(`room_id`, `cust_id`, `cust_name`, `cust_email`, `cust_contact`, `cust_address`, `total_amount`,`added_date`) VALUES('$room_id', '$cust_id', '$cust_name', '$cust_email', '$cust_contact', '$cust_address', '$total_amount','".date('Y-m-d')."')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
      $plats_invoice_id = $conn->insert_id;
  for ($i=0; $i <count($plats_id) ; $i++) { 
  	$sql = "INSERT INTO `plats_invoice_items`(`plats_invoice_id`, `plats_id`, `price`, `qty`, `subtotal`) VALUES ('$plats_invoice_id', '$plats_id[$i]','$price[$i]','$qty[$i]','$subtotal[$i]')";
   $conn->query($sql);
  }
     ?>
<script type="text/javascript">
window.location="../view_plat_payment.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_plat_payment.php";
</script>
<?php } ?>