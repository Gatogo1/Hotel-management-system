
<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');

extract($_POST);
//echo '<pre>'; print_r($_POST); exit;
   $sql = "INSERT INTO `tbl_check1`(  `id`,  `timeout`) VALUES ('$id','$timeout')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php } ?>