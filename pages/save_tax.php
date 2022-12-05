
<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');

extract($_POST);
   $sql = "INSERT INTO `tbl_tax`(`taxname`, `percentage`, `shortcode`) VALUES ('$taxname', '$percentage', '$shortcode')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_tax.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_tax.php";
</script>
<?php } ?>