<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<link rel="stylesheet" href="popup_style.css">
<?php include('sidebar.php');
if(isset($useroles)){  if(!in_array("pool_payment_invoice",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
if(isset($_GET['id']))
{ ?>
<?php
date_default_timezone_set("Africa/Tunis
");
echo "The time is ";
?>

<div class="popup popup--icon -question js_question-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sure
    </h1>
    <p>Are You Sure To Delete This Record?</p>
    <p>
      <a href="del_pool_payment.php?id=<?php echo $_GET['id']; ?>" class="button button--success" data-for="js_success-popup">Yes</a>
      <a href="view_pool_payment.php" class="button button--error" data-for="js_success-popup">No</a>
    </p>
  </div>
</div>
<?php } ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View Pool Invoice</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View Pool Invoice</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                
                <!-- /# row -->
                 <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Pool Invoice Details</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Tax 18%</th>
                                                <th>Amount</th>
                                                <th>Subtotal</th>
                                                <th>Added Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Sr.No.</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Tax 18%</th>
                                                <th>Amount</th>
                                                <th>Subtotal</th>
                                                <th>Added Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    $sql = "SELECT * FROM `pool_invoice` WHERE delete_status=0";
                                     $result = $conn->query($sql);
                                  $i=1;
                                   while($row = $result->fetch_assoc()) { 
                               $que="SELECT SUM(amount) as paid FROM `pool_invoice_payments` WHERE pool_invoice_id='".$row["id"]."'";
                                $query=$conn->query($que);
                                $payment=mysqli_fetch_array($query);
                                      ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['cust_name']; ?></td>
                                                <td><?php echo $row['cust_contact']; ?></td>
                                                <td><?php echo $row['cust_email']; ?></td>
                                                <td><?php echo $row['total_amount']*0.18; ?></td>
                                                <td><?php echo $row['total_amount']; ?></td>
                                                <td><?php echo $row['total_amount']*0.18+$row['total_amount']; ?></td>
                                                <td><?php echo $row['added_date'] ; ?></td>
                                                <td>
                                                  <?php if($payment['paid']<$row['total_amount']){ ?>
                                                  <a title="Payment" href="pool_payments.php?id=<?=$row['id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-rupee"></i></a>
                                                  <?php } ?>
                                                  <a target="_blank" title="Thermal Printer" href="pool_invoice1.php?id=<?=$row['id'];?>" class="btn btn-xs btn-warning"><i class="fa fa-print"></i></a>
                                                  <a title="Invoice" href="pool_invoice.php?id=<?=$row['id'];?>" class="btn btn-xs btn-dark"><i class="fa fa-print"></i></a>
                                                  <?php if(isset($useroles)){  if(in_array("edit_pool_payment",$useroles)){ ?>
                                                  <a title="Edit" href="edit_pool_payment.php?id=<?=$row['id'];?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
                                                  <?php } } ?>
                                                  <?php if(isset($useroles)){  if(in_array("delete_pool_payment",$useroles)){ ?> 
                                                  <a title="Delete" href="view_pool_payment.php?id=<?=$row['id'];?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                                                  <?php } } ?>
                                                </td>
                                            </tr>
                                          <?php  $i++;} 
                                          ?>

                                        </tbody>
                                    </table>
                                  </form>
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