<?php require_once('check_login.php');?>
<?php include('head.php');?>
<?php include('header.php');?>
<?php include('sidebar.php');
if(isset($useroles)){  if(!in_array("report_rooms",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');
 ?>

<!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Rooms Reserved Report</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Rooms Reserved Report</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <form class="form-horizontal" method="POST" name="bookingreportform" enctype="multipart/form-data">

                  <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">

                  <div class="form-group">
                      <div class="row">
                         <label class="col-sm-3 control-label">From Date  :</label>
                            <div>
                                <input type="date" name="fromDate" class="form-control" placeholder="fromDate">
                            </div>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <div class="row">
                         <label class="col-sm-3 control-label">To Date  :</label>
                            <div>
                                <input type="date" name="toDate" class="form-control" placeholder="toDate">
                            </div>
                      </div>
                  </div>

                  
                  <div class="form-group">
                      <div class="row">
                         
                            <div> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              &nbsp;<input type="submit" name="Done" value="Done">  
                            </div>
                      </div>
                  </div>

                  
                </form>
                <!-- /# row -->
               <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Room name</th>
                                                  <th>Room No</th>
                                                  <th>Floor No</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Room name</th>
                                                  <th>Room No</th>
                                                  <th>Floor No</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                    <?php 
                                    include 'connect.php';
                                    if(isset($_POST['Done']))
                                    {
                                      $fromDate = $_POST['fromDate'];
                                      $toDate = $_POST['toDate'];
                                      $sql = "SELECT * FROM `tbl_booking_dates` WHERE booking_date BETWEEN '".$_POST['fromDate']."' AND '".$_POST['toDate']."' GROUP BY booking_id ";
                                    
                                     $result = $conn->query($sql);
                                     $i=1;
                                     while($row = $result->fetch_assoc()) { 
                                    $sql2 = "SELECT * FROM `tbl_rooms` WHERE id='".$row['roomname']."'";
                                    $result2=$conn->query($sql2);
                                    $room=$result2->fetch_assoc();

                                    $sql3 = "SELECT * FROM `tbl_booking` WHERE id='".$row['booking_id']."'";
                                    $result3=$conn->query($sql3);
                                    $booking=$result3->fetch_assoc();
                                      ?>
                                            <tr>
                                                
                                                <td><?php echo $room['roomname']; ?></td>
                                                <td><?php echo $room['room_no']; ?></td>
                                                <td><?php echo $room['floorno']; ?></td>
                                                <td><?php echo date('d/m/Y',strtotime($booking['fromdate'])).'-'.date('d/m/Y',strtotime($booking['todate'])); ?></td>
                                            </tr>
                                          <?php $i++; } ?>
                                        </tbody><?php  } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
        
                <!-- /# row -->

                <!-- End PAge Content -->
           

<?php include('footer.php');?>
