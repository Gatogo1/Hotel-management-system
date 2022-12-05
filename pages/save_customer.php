
<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');
//echo "<pre>";print_r($_POST); exit;
extract($_POST);
/*  echo */ $sql = "INSERT INTO `tbl_customer`(`name`, `email`, `gender`, `birthdate`, `contact`, `address`, `job`, `telephone`, `birth_place`, `civil_status`, `joint_name`, `nationality`, `nature_card`, `number_card`, `contact_person`, `created_date`) VALUES ('$name', '$email', '$gender', '$birthdate', '$contact', '$address', '$job', '$telephone', '$birth_place', '$civil_status', '$joint_name', '$nationality', '$nature_card', '$number_card', '$contact_person', CURDATE())";
//echo "<pre>";print_r($sql); exit;
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_customer.php";
</script>
<?php } ?>