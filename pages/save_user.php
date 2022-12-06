<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');
$pass =  $_POST['password'];
//$passw = hash('sha256',$p);
//echo $passw;exit;

$image = $_FILES['image']['name'];
$target = "../uploadImage/Profile/".basename($image);

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 // @unlink("uploadImage/Profile/".$_POST['old_image']);
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }

extract($_POST);//"INSERT INTO admin (username, email,password, fname, lname, gender,  dob,contact,    addr,notes,created_on,image,role_id)VALUES ('user', '$email','$pass', '$fname', '$lname', '$gender', '$dob', '$contact', '$addr','$notes',CURDATE(),'$image','$role_id')";
/*  echo */ $sql ="INSERT INTO admin (username, email,password, fname, lname, gender,contact,address,created_on,image,role_id)VALUES ('user', '$email','$pass', '$fname', '$lname', '$gender', '$contact', '$addr',CURDATE(),'$image','$role_id')";
//echo "<pre>";print_r($sql); exit;
 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="../view_user.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_user.php";
</script>
<?php } ?>


