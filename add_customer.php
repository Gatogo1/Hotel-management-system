<?php require_once('check_login.php');?>
<?php include('head.php');?>
<link rel="stylesheet" href="popup_style.css">
<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');
 if(isset($useroles)){  if(!in_array("add_customer",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
    ?>



<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Customer</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Customer</li>
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
                                    <form class="form-valide row"  method="post" action="pages/save_customer.php" enctype="multipart/form-data">
                                        <div class="col-lg-6">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Customer name <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="name" placeholder="Enter a username.." required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Your valid email.." required="">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Gender<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="gender" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Birth Place<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="Birth Place" required="">`
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Birthdate<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-currency" name="birthdate" placeholder="birthdate" required="">`
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Contact<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-phoneus" name="contact" placeholder="054-094-8579" minlength="10" maxlength="10" pattern="^[0][0-9]\d{9}$|^[0-9]\d{9}$" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Address<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="address" placeholder="" required="">
                                            </div>
                                        </div>

                                      
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Job <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="job" placeholder="Enter a Job.." required="">
                                            </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Telephone<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="telephone" name="telephone" placeholder="054-094-8579" minlength="10" maxlength="10" pattern="^[0][0-9]\d{9}$|^[0-9]\d{9}$" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Civil Status <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="civil_status" name="civil_status" placeholder="Civil Status" required>
                                                    <option value="">Select One</option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Divorce">Divorce</option>
                                                </select>
                                                <!--<input type="text" class="form-control" id="civil_status" name="civil_status" placeholder="Civil Status" required="">-->
                                            </div>
                                        </div>
                                       
                                        <!-- <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Joint Name<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="joint_name" name="joint_name" placeholder="Joint Name" required="">
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-currency">Nationality<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="nationality" required="">`
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">National Id<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nature_card" name="nature_card" placeholder="" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Contact Person<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Contact Person Number<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="number_card" name="number_card" placeholder="" required="">
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
         
</body>

</html>
<?php include('footer.php');?>