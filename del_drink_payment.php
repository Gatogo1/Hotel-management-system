<?php require_once('check_login.php');?>
<?php
include 'connect.php';
$sql = "UPDATE `drinks_invoice` SET `delete_status`=1 WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>
//alert("Delete Successfully");
window.location = "view_drink_payment.php";
</script>

