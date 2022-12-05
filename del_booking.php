<?php require_once('check_login.php');?>
<?php
include 'connect.php';
session_start();

$sql = "DELETE FROM `tbl_booking` WHERE id='".$_GET["id"]."'";
$res = $conn->query($sql) ;
$sql = "DELETE FROM `tbl_booking_dates` WHERE booking_id='".$_GET["id"]."'";
        $conn->query($sql);
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>
//alert("Delete Successfully");
window.location = "view_booking.php";
</script>

