<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');

 if(isset($useroles)){  if(!in_array("edit_customer",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}

 date_default_timezone_set('Africa/Accra');
 $current_date = date('Y-m-d');

if(isset($_POST["submit"]))
{
    extract($_POST);
    $image = $_FILES['image']['name'];
  $target = "uploadImage/Profile/".basename($image);

 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  @unlink("uploadImage/Profile/".$_POST['old_image']);
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
   
      $q1="UPDATE `tbl_customer` SET `name`='$name',`email`='$email',`gender`='$gender',`birthdate`='$birthdate',`contact`='$contact',`address`='$address',`job`='$job',`telephone`='$telephone',`birth_place`='$birth_place',`civil_status`='$civil_status',`joint_name`='$joint_name',`nationality`='$nationality',`nature_card`='$nature_card',`number_card`='$number_card',`contact_person`='$contact_person' WHERE `id`='".$_GET['id']."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_customer.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_customer.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_customer` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$name = $row['name'];
$email = $row['email'];
$gender = $row['gender'];
$birthdate = $row['birthdate'];
$contact = $row['contact'];
$address = $row['address'];
}

?> 
<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Customer Management </h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Customer Management</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
             <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide row"  method="post" enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                        <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $current_date;?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Customer name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="name" required="" value="<?php echo $name; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  value="<?php echo $email; ?>" required="">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Gender<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="gender" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Male"<?php if($gender=='Male'){ echo "Selected";}?>>Male</option>
                                                    <option value="Female"<?php if($gender=='Female'){ echo "Selected";}?>>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Birth Place<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Birth Place" value="<?php echo $birth_place; ?>" required="">`
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Birthdate<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-currency" name="birthdate" placeholder="birthdate" value="<?php echo $birthdate; ?>" required="">`
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Contact<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-phoneus" name="contact" value="<?php echo $contact; ?>" minlength="10" maxlength="10" pattern="^[0][0-9]\d{9}$|^[0-9]\d{9}$" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Address<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="address" value="<?php echo $address;?>" required="">
                                            </div>
                                        </div>
                                       
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Job <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" value="<?php echo $job; ?>" name="job" placeholder="Enter a Job.." required="">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Telephone<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="telephone" value="<?php echo $telephone; ?>" name="telephone" placeholder="212-999-0000" minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Civil Status <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="civil_status" name="civil_status" placeholder="Civil Status" required>
                                                    <option value="">Select One</option>
                                                    <option value="Single" <?php if($civil_status=='Single'){ echo 'selected';} ?>>Single</option>
                                                    <option value="Married" <?php if($civil_status=='Married'){ echo 'selected';} ?>>Married</option>
                                                    <option value="Divorce" <?php if($civil_status=='Divorce'){ echo 'selected';} ?>>Divorce</option>
                                                </select>
                                                <!--<input type="text" class="form-control" id="civil_status" value="<?php echo $civil_status; ?>" name="civil_status" placeholder="Civil Status" required="">-->
                                            </div>
                                        </div>
                                       
                                       <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Joint Name<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="joint_name" value="<?php echo $joint_name; ?>" name="joint_name" placeholder="Joint Name" required="">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Nationality<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nationality" value="<?php echo $nationality; ?>" name="nationality" placeholder="nationality" required="">`
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">National ID<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nature_card" value="<?php echo $nature_card; ?>" name="nature_card" placeholder="" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Contact Person<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="contact_person" value="<?php echo $contact_person; ?>" name="contact_person" placeholder="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Contact Person Number<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="number_card" value="<?php echo $number_card; ?>" name="number_card" placeholder="" required="">
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>

         
            </div>
           
                               

    

<?php include('footer.php');?>

