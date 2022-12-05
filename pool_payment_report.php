<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php'); ?>
  <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">View pool Payments Report</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">View pool Payments Report</li>
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
                          <form class="form-horizontal" method="POST" name="bookingreportform" enctype="multipart/form-data">

                  <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                  <div class="form-group">
                      <div class="row">
                         <label class="col-sm-3 control-label">From Date  :</label>
                            <div class="col-sm-3">
                                <input type="date" name="from_date" class="form-control" placeholder="fromDate">
                            </div>
                         <label class="col-sm-3 control-label">To Date  :</label>
                            <div class="col-sm-3">
                                <input type="date" name="to_date" class="form-control" placeholder="toDate">
                            </div>
                      </div>
                  </div>

                  
                  <div class="form-group">
                      <div class="offset-3 col-sm-3">
                         <input type="submit" name="show" class="btn btn-primary" value="Show"> 
                      </div>
                  </div>

                  
                </form>
                            <div class="card-body">                               
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Added Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                               <th>Sr.No.</th>
                                                <th>Customer Name</th>
                                                <th>Mobile No</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Amount</th>
                                                <th>Added Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    if(isset($_POST['show']))
                                    {
                                      extract($_POST);
                                      $sql = "SELECT * FROM `pool_invoice` WHERE delete_status=0 and added_date>='".$from_date."' and added_date<='".$to_date."'";
                                    }
                                    else
                                    {
                                      $sql = "SELECT * FROM `pool_invoice` WHERE delete_status=0";
                                    }
                                    
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
                                                <td><?php echo $row['cust_address']; ?></td>
                                                <td><?php echo $row['total_amount']; ?></td>
                                                <td><?php echo $row['added_date']; ?></td>
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