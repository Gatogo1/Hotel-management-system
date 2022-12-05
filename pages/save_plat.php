
<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia ');
include('../connect.php');

extract($_POST);
//echo '<pre>'; print_r($_POST); exit;
   $sql = "INSERT INTO `plats`( `category`, `item_name`, `price`, `description`, `status`) VALUES ('$category', '$item_name', '$price', '$description', '$status')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_plat.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_plat.php";
</script>
<?php } ?>