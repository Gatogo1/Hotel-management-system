<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php
 include('connect.php');
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["btn_update"]))
{
extract($_POST);
  $sql = "delete  from tbl_permission_role where role_id='".$_GET['id']."'";
  $query=$conn->query($sql);

  $slug = strtolower($role_name);

  $sql_update = "UPDATE tbl_role set role_name='$role_name',slug='$slug' where id='".$_GET['id']."'";
  $query_update=$conn->query($sql_update); 
                           
  $checkItem = $_POST["checkItem"];
                            //print_r($_POST);
  $a = count($checkItem);  
  for($i=0;$i<$a;$i++){
      $id = $_GET['id'];
                           
      $sql="insert into tbl_permission_role(permission_id,role_id)values('$checkItem[$i]','$id')";
      $qq = $conn->query($sql);
  }
  ?>
  <script>
      window.location="view_roles.php";
  </script>
<?php
}
?>
<!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Edit Role</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                                    <?php 
  $q1 ="SELECT * FROM  tbl_role where id = '".$_GET['id']."'";
  $result1 =$conn->query($q1);
  while($row1 = mysqli_fetch_array($result1)){  
      $role_name =  $row1['role_name'];
      $slug =  $row1['slug'];
      // $id = $row["id"]; 
} ?>
<form id="main" method="post" enctype="multipart/form-data">
<div class="form-group row">
<label class="col-sm-2 col-form-label">Role Name</label>
<div class="col-sm-4">
<input type="text" class="form-control" name="role_name" id="role_name" value="<?php echo $role_name; ?>" placeholder="Enter role_name...." required="" >
<span class="messages"></span>
</div>
</div>


<!-- <div class="form-group row"> 
    <?php 
      $q ="SELECT * FROM  tbl_permission ";
      $result =$conn->query($q);
      while($row = mysqli_fetch_array($result))
      {  
        $id = $row["id"]; 
    ?>
    <div class="checkbox col-md-3">
    <label>
    <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $id; ?>" 
    <?php 
      $s = "select * from tbl_permission_role where role_id='".$_GET['id']."' AND permission_id='$id'" ;
      $r =$conn->query($s);
      $row1 = mysqli_fetch_array($r);
      if($id == $row1['permission_id'])
      {
        echo "checked";
      } ?>>
      <b><?php echo $row["display_name"]; ?></b></label>
    </div>
      <?php } ?>
</div> -->
<?php 
    $q ="SELECT * FROM  tbl_permission ";
    $result =$conn->query($q);
    $roles=array();
    while($row = mysqli_fetch_assoc($result)){
      $id = $row["id"]; 
      $s = "select * from tbl_permission_role where role_id='".$_GET['id']."' AND permission_id='$id'" ;
      $r =$conn->query($s);
      $row1 = mysqli_fetch_array($r);
      if($id == $row1['permission_id'])
      {
        $row['status']='checked';
      }
      else
      {
        $row['status']='';
      }
    $roles[]=$row;  
     } //echo "<pre>"; print_r($roles); ?>
         <div class="form-group row"> 
            <div class="col-md-4">
               <h2> 1. Customer</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[17]['id']; ?>" <?php echo $roles[17]['status']; ?>> <b><?php echo $roles[17]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[18]['id']; ?>" <?php echo $roles[18]['status']; ?>> <b><?php echo $roles[18]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[6]['id']; ?>" <?php echo $roles[6]['status']; ?>> <b><?php echo $roles[6]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[19]['id']; ?>" <?php echo $roles[19]['status']; ?>> <b><?php echo $roles[19]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
               <h2> 4. Tax</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[10]['id']; ?>" <?php echo $roles[10]['status']; ?>> <b><?php echo $roles[10]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
              <h2> 7. Reports</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[11]['id']; ?>" <?php echo $roles[11]['status']; ?>> <b><?php echo $roles[11]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[12]['id']; ?>" <?php echo $roles[12]['status']; ?>> <b><?php echo $roles[12]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[13]['id']; ?>" <?php echo $roles[13]['status']; ?>> <b><?php echo $roles[13]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[14]['id']; ?>" <?php echo $roles[14]['status']; ?>> <b><?php echo $roles[14]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[15]['id']; ?>" <?php echo $roles[15]['status']; ?>> <b><?php echo $roles[15]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[16]['id']; ?>" <?php echo $roles[16]['status']; ?>> <b><?php echo $roles[16]['display_name']; ?></b><br>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-4">
              <h2> 2. Room Details</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[20]['id']; ?>" <?php echo $roles[20]['status']; ?>> <b><?php echo $roles[20]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[21]['id']; ?>" <?php echo $roles[21]['status']; ?>> <b><?php echo $roles[21]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[7]['id']; ?>" <?php echo $roles[7]['status']; ?>> <b><?php echo $roles[7]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[22]['id']; ?>" <?php echo $roles[22]['status']; ?>> <b><?php echo $roles[22]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
             <h2> 5. User Management</h2>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[1]['id']; ?>" <?php echo $roles[1]['status']; ?>> <b><?php echo $roles[1]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[2]['id']; ?>" <?php echo $roles[2]['status']; ?>> <b><?php echo $roles[2]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[0]['id']; ?>" <?php echo $roles[0]['status']; ?>> <b><?php echo $roles[0]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[3]['id']; ?>" <?php echo $roles[3]['status']; ?>> <b><?php echo $roles[3]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[4]['id']; ?>" <?php echo $roles[4]['status']; ?>> <b><?php echo $roles[4]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
               <h2> 8. Setting</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[5]['id']; ?>" <?php echo $roles[5]['status']; ?>> <b><?php echo $roles[5]['display_name']; ?></b><br>
              <h2> 9. Currency</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[8]['id']; ?>" <?php echo $roles[8]['status']; ?>> <b><?php echo $roles[8]['display_name']; ?></b><br>
            </div>
        </div>
        <div class="form-group row"> 
            <div class="col-md-4">
              <h2> 3. Room Booking Details</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[23]['id']; ?>" <?php echo $roles[23]['status']; ?>> <b><?php echo $roles[23]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[24]['id']; ?>" <?php echo $roles[24]['status']; ?>> <b><?php echo $roles[24]['display_name']; ?></b><br>              
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[9]['id']; ?>" <?php echo $roles[9]['status']; ?>> <b><?php echo $roles[9]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[25]['id']; ?>" <?php echo $roles[25]['status']; ?>> <b><?php echo $roles[25]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[26]['id']; ?>" <?php echo $roles[26]['status']; ?>> <b><?php echo $roles[26]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[27]['id']; ?>" <?php echo $roles[27]['status']; ?>> <b><?php echo $roles[27]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
             <h2> 6. Drink Details</h2>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[28]['id']; ?>" <?php echo $roles[28]['status']; ?>> <b><?php echo $roles[28]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[29]['id']; ?>" <?php echo $roles[29]['status']; ?>> <b><?php echo $roles[29]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[30]['id']; ?>" <?php echo $roles[30]['status']; ?>> <b><?php echo $roles[30]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[31]['id']; ?>" <?php echo $roles[31]['status']; ?>> <b><?php echo $roles[31]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[38]['id']; ?>" <?php echo $roles[38]['status']; ?>> <b><?php echo $roles[38]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[34]['id']; ?>" <?php echo $roles[34]['status']; ?>> <b><?php echo $roles[34]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[39]['id']; ?>" <?php echo $roles[39]['status']; ?>> <b><?php echo $roles[39]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[40]['id']; ?>" <?php echo $roles[40]['status']; ?>> <b><?php echo $roles[40]['display_name']; ?></b><br>
             <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[41]['id']; ?>" <?php echo $roles[41]['status']; ?>> <b><?php echo $roles[41]['display_name']; ?></b><br>
            </div>
            <div class="col-md-4">
               <h2> 10. Food</h2>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[32]['id']; ?>" <?php echo $roles[32]['status']; ?>> <b><?php echo $roles[32]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[33]['id']; ?>" <?php echo $roles[33]['status']; ?>> <b><?php echo $roles[33]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[36]['id']; ?>" <?php echo $roles[36]['status']; ?>> <b><?php echo $roles[36]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[37]['id']; ?>" <?php echo $roles[37]['status']; ?>> <b><?php echo $roles[37]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[42]['id']; ?>" <?php echo $roles[42]['status']; ?>> <b><?php echo $roles[42]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[35]['id']; ?>" <?php echo $roles[35]['status']; ?>> <b><?php echo $roles[35]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[43]['id']; ?>" <?php echo $roles[43]['status']; ?>> <b><?php echo $roles[43]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[44]['id']; ?>" <?php echo $roles[44]['status']; ?>> <b><?php echo $roles[44]['display_name']; ?></b><br>
              <input type="checkbox" id="checkItem" name="checkItem[]" value="<?php echo $roles[45]['id']; ?>" <?php echo $roles[45]['status']; ?>> <b><?php echo $roles[45]['display_name']; ?></b><br>
            </div>
        </div>



<div class="form-group row">
<label class="col-sm-2"></label>
<div class="col-sm-10">
<button type="submit" name="btn_update" class="btn btn-primary m-b-0">Submit</button>
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

<?php include('footer.php');?>

