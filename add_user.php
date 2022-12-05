<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');?>

        <!-- Page wrapper  -->


<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->     
                                
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="card-body">
                                <h4>User Details</h4>
                                <div class="form-validation">
                                    <form id="main" method="post" action="pages/save_user.php" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label">First Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter firstname...." required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Last Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter lastname...." required="">
<span class="messages"></span>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Gender</label>
<div class="col-sm-4">
<select type="text" class="form-control" id="gender" name="gender" required="">
<option value="">--Select Gender--</option>
<option value="Male">Male</option>
<option value="Female"<?php //if($comission_en=='Yes'){ echo "Selected";}?>>Female</option>
</select>
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Phone</label>
<div class="col-sm-4">
<input type="tel" class="form-control" id="contact" name="contact" placeholder="Enter valid phone number..." minlength="10" maxlength="10" pattern="^[0][1-9]\d{9}$|^[1-9]\d{9}$" required="">
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Email</label>
<div class="col-sm-4">
<input type="email" class="form-control" id="email" name="email" placeholder="Enter valid e-mail address..." pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required="">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Role</label>
<div class="col-sm-4">
<select class="form-control" id="role_id" name="role_id" required="">
    <option value="">--Select Role--</option>
        <?php  
            $c1 = "SELECT * FROM `tbl_role` where id!=1  and delete_status = 0";
            $result = $conn->query($c1);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_array($result)) {?>
                <option value="<?php echo $row["id"];?>">
                    <?php echo $row['role_name'];?>
                </option>
                <?php
                }
            } else {
                    echo "0 results";
            }
        ?>
</select>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-4">
<input type="password" class="form-control" id="password" name="password" placeholder="Password input">
<span class="messages"></span>
</div>
<label class="col-sm-2 col-form-label">Repeat Password</label>
<div class="col-sm-4">
<input type="password" class="form-control" id="repeat-password" name="repeat-password" placeholder="Repeat Password">
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Address</label>
<div class="col-sm-10">
    <textarea name="addr" class="form-control"></textarea>
<span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2 col-form-label">Image</label>
<div class="col-sm-4">
<input type="file" class="form-control" name="image"><span class="messages"></span>
</div>
</div>


<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_submit" class="btn btn-primary m-b-0">Submit</button>
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

                                        
                <!-- /# row -->


                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->


      
</body>

</html>
<?php include('footer.php');?>