<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
 if(isset($useroles)){  if(!in_array("edit_booking",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
 date_default_timezone_set('Africa/Accra');
 $current_date = date('Y-m-d h:ia');

if(isset($_POST["submit"]))
{
/*echo "<pre>"; */
extract($_POST);
$roomname=explode(',',$_POST['roomname']);
$tax=explode(',',$_POST['tax']);
?>

<?php $earlier = new DateTime($_POST['fromdate']);
$later = new DateTime($_POST['todate']);

$diff = $later->diff($earlier)->format("%a");

    
    $totalamount = 0.0;
$totalamountperday = $_POST['kidno'] * $roomname[2] + $_POST['adultno'] * $roomname[1]   ;echo "<br>"; 
$totalamount = $totalamountperday * ($diff+1);
/*echo $totalamount; */
   $taxamount = 0.0;
   $num = $totalamount * $tax[1];
   $deno = 100;
   $total1 = $num / $deno;
   $taxamount = $totalamount + $total1;

$paid=0;
$q1="UPDATE `tbl_booking` SET `name`='$name',`roomname`='$roomname[0]',`kidno`='$kidno',`adultno`='$adultno',`fromdate`='$fromdate',`todate`='$todate',`taxamount`='$taxamount',`totalamount`='$totalamount', `paid`='$paid', `modeofpay`='$mude'`tax_id`='$tax[0]' WHERE `id`='".$_GET['id']."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) { 
        $booking_id = $_GET['id'];
        $sql = "DELETE FROM `tbl_booking_dates` WHERE booking_id='".$booking_id."'";
        $conn->query($sql);
  $res_date = getDatesFromRange($_POST['fromdate'],$_POST['todate']); 
  foreach ($res_date as $value) {
   $sql = "INSERT INTO `tbl_booking_dates`(`booking_id`, `booking_date`, `roomname`) VALUES ('$booking_id', '$value','$roomname[0]')";
   $conn->query($sql);
  }

      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
} else {
      $_SESSION['success']=' Record Successfully Updated';
?>
<script type="text/javascript">
window.location="view_booking.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_booking` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    extract($row);
}

function getDatesFromRange($start, $end, $format = 'Y-m-d') { 

        // Declare an empty array 
        $array = array(); 

        // Variable that store the date interval 
        // of period 1 day 
        $interval = new DateInterval('P1D'); 

        $realEnd = new DateTime($end); 
        $realEnd->add($interval); 

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 

        // Use loop to store date into array 
        foreach($period as $date) {                  
        $array[] = $date->format($format);  
        } 

        // Return the array elements 
        return $array; 
        }
?>         <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Room Booking</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Edit Room Booking</li>
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
                              
                                <div class="form-validation">
                                    
                                    <form class="form-valide"  method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                 <select class="form-control" id="val-skill" name="name" required="">
                                                    <option value="">--Select Customer--</option>
                                                   <?php  
                                                $c1 = "SELECT * FROM `tbl_customer`";
                                                $result = $conn->query($c1);

                                                if ($result->num_rows > 0) {
                                                    while ($row = mysqli_fetch_array($result)) {?>
                                                        <option value="<?php echo $row["id"];?>" <?php if($row["id"]==$name){ echo "selected"; }?>>
                                                            <?php echo $row['name'];?>
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
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room Name : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="roomname" name="roomname" required="">
                                                    <option value="">--Select Room--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['peradultprice'].','.$row['perkidprice'];?>" <?php if($row["id"]==$roomname){ echo "selected"; }?>>
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
                                                <input type="text" class="form-control" id="val-digits" name="adultno" value="<?php echo $adultno; ?>" placeholder="No of Adults"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">No of Kid:<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="kidno" value="<?php echo $kidno; ?>" placeholder="No of Kid"  required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">From Date :<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-digits" name="fromdate" value="<?php echo $fromdate; ?>" placeholder="From Date" required="" onchange="calculate();" onkeyup="calculate();">
                                            </div>
                                        </div>

                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">To Date : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" id="val-digits" name="todate" value="<?php echo $todate; ?>" placeholder="To Date" required="" onchange="CompareDate();" onkeyup="CompareDate();">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Tax Name : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tax" required=""  onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">--Select tax--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_tax`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['taxname'];?>" <?php if($row["id"]==$tax_id){ echo "selected"; }?>>
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
                                            <label class="col-lg-4 col-form-label" for="val-digits">Total Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="totalamount" value="<?php echo $totalamount; ?>" placeholder="Total Amount"  required="" onchange="calculate();" onkeyup="calculate();" readonly>
                                            </div>
                                        </div>


                                         <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Payable Amount<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="taxamount" value="<?php echo $taxamount; ?>" placeholder="Payable Amount"  required="" onchange="calculate();" onkeyup="calculate();" readonly>
                                            </div>
                                        </div>
                                        
                                       
                                    <!--   <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Mode of payment : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="tax" required=""  onchange="calculate();" onkeyup="calculate();">
                                                    <option value="">Select mode of payment</option>
                                                   <?php   
                                                            $c1 = "SELECT * FROM `tbl_tax`";
                                                            $result = $conn->query($c1);

                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {?>
                                                                    <option value="<?php echo $row["id"].','.$row['percentage'].','.$row['taxname'];?>" <?php if($row["id"]==$tax_id){ echo "selected"; }?>>
                                                                        <?php echo $row['taxname'];?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                            } else {
                                                            echo "0 results";
                                                                }
                                                            ?>
                                                </select>

                                              
                                            </div> -->



                                        </div>

                                         <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-primary" id="btnValidate">Submit</button>
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
 
<link href="popup_style.css" rel="stylesheet">                                    
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