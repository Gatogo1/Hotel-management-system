<?php require_once('check_login.php');?>
<?php
include 'connect.php';


$delete_status=1;
$sql="UPDATE `tbl_role` SET `delete_status`='$delete_status' WHERE `id`='".$_GET['id']."'";
$res = $conn->query($sql) ;
 $_SESSION['success']=' Record Successfully Deleted';
?>
<script>
//alert("Delete Successfully");
window.location = "view_roles.php";
</script>

