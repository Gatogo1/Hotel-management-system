<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');?>

<?php 
    if(isset($_POST["btn_submit"]))
                            {
                              extract($_POST);
                              $slug = strtolower($role_name);

                              $sql="insert into tbl_role(role_name,slug)values('$role_name','$slug')";
                              $query=$conn->query($sql);
                            $last_id =  mysqli_insert_id($conn);
                            $id=$last_id;
                            $checkItem = $_POST["checkItem"];
                            //print_r($_POST);
                             $a = count($checkItem);  
                            for($i=0;$i<$a;$i++){

                              $sql="insert into tbl_permission_role(permission_id,role_id)values('$checkItem[$i]','$id')";
                             

                              if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="view_roles.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_roles.php";
</script>
<?php } 
                           
                                   }
                            }
?> 

<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Role</h3> </div>
                <div class="col-md-10 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Role</li>
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
                                <h4>Role Details</h4>
                                <div class="form-validation">
                                    <form id="main" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="role_name" id="name" placeholder="Enter Role name...." required="">
<span class="messages"></span>
</div>
</div> 
<div class="form-group row">
<label class="col-sm-2 col-form-label"><u>Permissions</u></label>
<div class="col-sm-10">
<h6  style="color:red;">( While selecting any sub roles like add,edit,delete you must require to select Main roles named with Manage Name. )</h6>  
<span class="messages"></span>
</div>
</div>

 
               
    <?php 
    $q ="SELECT * FROM  tbl_permission ";
    $result =$conn->query($q);
    $roles=array();
    while($row = mysqli_fetch_assoc($result)){
    $roles[]=$row;  
     } //echo "<pre>"; print_r($roles); ?>
         <div class="form-group row"> 
            <div class="col-md-4">
               <h2> 1. Customer</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[17]['id']; ?>"> <b><?php echo $roles[17]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[18]['id']; ?>"> <b><?php echo $roles[18]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[6]['id']; ?>"> <b><?php echo $roles[6]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[19]['id']; ?>"> <b><?php echo $roles[19]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
               <h2> 4. Tax</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[10]['id']; ?>"> <b><?php echo $roles[10]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
              <h2> 7. Reports</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[11]['id']; ?>"> <b><?php echo $roles[11]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[12]['id']; ?>"> <b><?php echo $roles[12]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[13]['id']; ?>"> <b><?php echo $roles[13]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[14]['id']; ?>"> <b><?php echo $roles[14]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[15]['id']; ?>"> <b><?php echo $roles[15]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[16]['id']; ?>"> <b><?php echo $roles[16]['display_name']; ?></b><br>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-4">
              <h2> 2. Room Details</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[20]['id']; ?>"> <b><?php echo $roles[20]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[21]['id']; ?>"> <b><?php echo $roles[21]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[7]['id']; ?>"> <b><?php echo $roles[7]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[22]['id']; ?>"> <b><?php echo $roles[22]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
             <h2> 5. User Management</h2>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[1]['id']; ?>"> <b><?php echo $roles[1]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[2]['id']; ?>"> <b><?php echo $roles[2]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[0]['id']; ?>"> <b><?php echo $roles[0]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[3]['id']; ?>"> <b><?php echo $roles[3]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[4]['id']; ?>"> <b><?php echo $roles[4]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
               <h2> 8. Setting</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[5]['id']; ?>"> <b><?php echo $roles[5]['display_name']; ?></b><br>
              <h2> 9. Currency</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[8]['id']; ?>"> <b><?php echo $roles[8]['display_name']; ?></b><br>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-4">
              <h2> 3. Room Booking Details</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[23]['id']; ?>"> <b><?php echo $roles[23]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[24]['id']; ?>"> <b><?php echo $roles[24]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[9]['id']; ?>"> <b><?php echo $roles[9]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[25]['id']; ?>"> <b><?php echo $roles[25]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[26]['id']; ?>"> <b><?php echo $roles[26]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[27]['id']; ?>"> <b><?php echo $roles[27]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
             <h2> 6. Drink Details</h2>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[28]['id']; ?>"> <b><?php echo $roles[28]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[29]['id']; ?>"> <b><?php echo $roles[29]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[30]['id']; ?>"> <b><?php echo $roles[30]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[31]['id']; ?>"> <b><?php echo $roles[31]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[38]['id']; ?>"> <b><?php echo $roles[38]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[34]['id']; ?>"> <b><?php echo $roles[34]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[39]['id']; ?>"> <b><?php echo $roles[39]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[40]['id']; ?>"> <b><?php echo $roles[40]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[41]['id']; ?>"> <b><?php echo $roles[41]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
              <h2> 10. Food</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[32]['id']; ?>"> <b><?php echo $roles[32]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[33]['id']; ?>"> <b><?php echo $roles[33]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[36]['id']; ?>"> <b><?php echo $roles[36]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[37]['id']; ?>"> <b><?php echo $roles[37]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[42]['id']; ?>"> <b><?php echo $roles[42]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[35]['id']; ?>"> <b><?php echo $roles[35]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[43]['id']; ?>"> <b><?php echo $roles[43]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[44]['id']; ?>"> <b><?php echo $roles[44]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[45]['id']; ?>"> <b><?php echo $roles[45]['display_name']; ?></b><br>
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