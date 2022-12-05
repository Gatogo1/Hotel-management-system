<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<link rel="stylesheet" href="popup_style.css">
<?php include('sidebar.php');

if(isset($_GET['id']))
{ ?>
<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_user.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_user.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"> View User</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View User</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">User Details</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                       <thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>Phone</th>
<th>Email</th>
<th>Role</th>
<th>Created at</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
  
    $sql = "SELECT * FROM `admin` where delete_status=0";
    $result = $conn->query($sql);
    $i=1;
      while($row = $result->fetch_assoc()) { 
            $sql1 = "SELECT * FROM  tbl_role where id  ='".$row['role_id']."' and delete_status = 0";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();                    
      ?>
        <tr>
          <td><?php echo $row['id'];?></td>
            <td><?php echo $row['fname']." ".$row['lname']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row1['role_name']; ?></td>
            <td><?php echo $row['created_on']; ?></td>
            <td>
                
                 <?php if($row['id']!=1){ if(isset($useroles)){  if(in_array("edit_user",$useroles)){ ?> 
                <a title="Edit" href="edit_user.php?id=<?=$row['id'];?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                 <?php } } ?>

                 <?php if(isset($useroles)){  if(in_array("delete_user",$useroles)){ ?> 
                <a title="Delete" href="view_user.php?id=<?=$row['id'];?>"  class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                <?php } } } ?>
            </td>
        </tr>
    <?php  $i++;} 
?>

</tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
               
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>


<?php if(!empty($_SESSION['success'])) {  ?>
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p><?php echo $_SESSION['success']; ?></p>
    <p>
      <button class="button button--success" data-for="js_success-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["success"]);  
} ?>
<?php if(!empty($_SESSION['error'])) {  ?>
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p><?php echo $_SESSION['error']; ?></p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php unset($_SESSION["error"]);  } ?>
    <script>
      var addButtonTrigger = function addButtonTrigger(el) {
  el.addEventListener('click', function () {
    var popupEl = document.querySelector('.' + el.dataset.for);
    popupEl.classList.toggle('popup--visible');
  });
};

Array.from(document.querySelectorAll('button[data-for]')).
forEach(addButtonTrigger);
    </script>