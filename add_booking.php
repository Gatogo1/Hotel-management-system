<?php require_once('check_login.php');?>
<?php include('head.php');?>
<link href="popup_style.css" rel="stylesheet">
<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');
 if(isset($useroles)){  if(!in_array("add_booking",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
    ?>

        <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Booking</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Booking</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->     
                                
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4>Room Booking Details</h4>
                                <div class="form-validation">
                                    
                                    <form class="form-valide" action="pages/booking.php" method="post" enctype="multipart/form-data">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="name" required="">
                                                    <option value="">--Select Customer--</option>
                                                   <?php  
                                                            $c1 = "SELECT * FROM `tbl_customer`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"];?>">
                                                                        <?php echo $row['name'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room No:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="roomname" name="roomname" required=""  onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">--Select Room--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option data-id="<?php echo $row['id'];?>" value="<?php echo $row["id"].','.$row['peradultprice'].','.$row['perkidprice'];?>">
                                                                        <?php echo $row['room_no'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Adults<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="adultno" placeholder="No of Adults"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Kid:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6"
                                            >
                                                <input type="text" class="form-control" id="val-digits" name="kidno" placeholder="No of Kid"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" min="<?php echo date('l, jS F h:ia'); ?>" class="form-control" id="fromdate" name="fromdate" placeholder="From Date" required="" >
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" min="<?php echo date('l, jS F h:ia'); ?>" class="form-control" id="todate" name="todate" placeholder="To Date" required="" onchange="CompareDate();"   >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">tax Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tax" required=""  onchange="calculate(); " onkeyup="calculate();">
                                                    <option value="">--Select tax--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_tax`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['taxname'];?>">
                                                                        <?php echo $row['taxname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="button" id="btnValidate" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                        <div class="popup popup--icon -success js_success-popup success_form">
                                          <div class="popup__background"></div>
                                          <div class="popup__content">
                                            <h3 class="popup__content__title">
                                              Sure?
                                            </h3>
                                            <p>Submit this Data.</p>
                                            <p>
                                                <input type="submit" class="button button--success"  name="btn_save" value="Save">
                                              <button class="button button--error" data-for="js_success-popup">Close</button>
                                            </p>
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
            <!-- End Bread crumb -->
                                               
<div class="popup popup--icon -error js_error-popup error_dates">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sorry! 
    </h3>
    <p id="dates" class="text-danger">Requested Dates are already booked</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>

<?php include('footer.php');?>
 <script type="text/javascript">
    function CompareDate() {
        var Fromdate = document.getElementById("fromdate").value;
var ToDate = document.getElementById("todate").value;
    const date1 = new Date(Fromdate);
const date2 = new Date(ToDate);
const diffTime = date2.getTime() - date1.getTime();
const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
console.log(diffDays);

if(diffDays<0)
{
    alert("enter valid date");
    document.getElementById("todate").value = "";
}else{
    
} 
var fromdate=document.getElementById("fromdate").value;
    var todate=document.getElementById("todate").value;
    var room_id=$('#roomname option:selected').attr('data-id');
    var formData = $(".form-valide").serializeArray();
    $.ajax({
            type: 'POST',
            url: 'getStatus.php',
            data : {fromdate:fromdate,todate:todate,room_id:room_id},
            success: function (data) {
             if(data!=1)
             {
                $('.error_dates').addClass('popup--visible');
                $('#fromdate').val('');
                $('#todate').val('');
                return false;
             }
                  
            }
            });
}
$('#btnValidate').click(function(){     
    CompareDate();
    $('.success_form').addClass('popup--visible');
  });
</script>
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