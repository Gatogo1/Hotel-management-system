<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php
 if (isset($_POST['btn_add'])) {
  extract($_POST);
   $sql = "INSERT INTO `pool_invoice_payments`( `pool_invoice_id`,`amount`,`type`,`note`,`added_date`) VALUES ('$pool_invoice_id','$amount','$type','$note','".date('Y-m-d')."')";

 if ($conn->query($sql) === TRUE) {
      $_SESSION['success']=' Record Successfully Added';
     ?>
<script type="text/javascript">
window.location="pool_payments.php?id=<?php echo $_GET['id']; ?>";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="pool_payments.php?id=<?php echo $_GET['id']; ?>";
</script>
<?php }
 }

$que="SELECT * FROM `pool_invoice` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
  extract($row);
}

$que="SELECT SUM(amount) as paid FROM `pool_invoice_payments` WHERE pool_invoice_id='".$_GET["id"]."'";
$query=$conn->query($que);
while($payment=mysqli_fetch_array($query))
{
  extract($payment);
}
$pending=$total_amount-$paid;

?>
<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">pool Payments</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">pool Payments</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <form class="form-horizontal" method="POST" name="bookingreportform" enctype="multipart/form-data">
                  <input type="hidden" name="pool_invoice_id" value="<?php echo $id; ?>">
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Amount  :</label>
                    <div class="col-sm-3">
                        <input type="number" min="0" max="<?php echo $pending; ?>" name="amount" class="form-control" placeholder="Amount" required="">
                    </div>
                    <label class="col-sm-2 control-label">Type  :</label>
                    <div class="col-sm-3">
                        <input type="text" name="type" class="form-control" placeholder="Credit,debit etc.." required="">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-2 control-label">Pending Amount  :</label>
                    <div class="col-sm-3">
                        <input type="number" min="0" value="<?php echo $pending; ?>" name="fromDate" class="form-control" placeholder="Pending Amount" required="" readonly>
                    </div>
                    <label class="col-sm-2 control-label">Note  :</label>
                    <div class="col-sm-3">
                        <input type="text" name="note" class="form-control" placeholder="Note.." required="">
                    </div>
                  </div>

                  
                  <div class="form-group">
                      <div class="offset-2 col-sm-3">
                        <input type="submit" class="btn btn-primary" name="btn_add" value="Save">
                      </div>
                  </div>

                  
                </form>
                <!-- /# row -->
              <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Payment History</h4>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Amount</th>
                                                <th>type</th>
                                                <th>Note</th>
                                                <th>Added Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Amount</th>
                                                <th>type</th>
                                                <th>Note</th>
                                                <th>Added Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                      $sql = "SELECT * FROM `pool_invoice_payments` WHERE pool_invoice_id='".$_GET["id"]."'";
                                      $result = $conn->query($sql);
                                     $i=1;
                                     while($row = $result->fetch_assoc()) { 

                                      ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo $row['amount']; ?></td>
                                                <td><?php echo $row['type']; ?></td>
                                                <td><?php echo $row['note']; ?></td>
                                                <td><?php echo $row['added_date']; ?></td>
                                            </tr>
                                          <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
       
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>

<link rel="stylesheet" href="popup_style.css">
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