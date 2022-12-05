<?php
session_start();
date_default_timezone_set('Africa/Tunis');
$current_date = date('Y-m-d h:ia');
include('../connect.php');
 $sql = "select * from admin where id = '".$_SESSION["id"]."'";
        $result=$conn->query($sql);
        $ro=mysqli_fetch_array($result);
       
            $q = "select * from tbl_permission_role where role_id='".$ro['role_id']."'";
            $ress=$conn->query($q);
            //$row=mysqli_fetch_all($ress);
             $name = array();
            while($row=mysqli_fetch_array($ress)){
          $sql = "select * from tbl_permission where id = '".$row['permission_id']."'";
        $result=$conn->query($sql);
        $row1=mysqli_fetch_array($result);
             array_push($name,$row1[1]);
             }
             $_SESSION['name']=$name;
             $useroles=$_SESSION['name'];
if(isset($_POST["btn_save"])){

/*echo "<pre>"; */
extract($_POST);
$roomname=explode(',',$_POST['roomname']);
/*print_r($roomname[1]); */
$tax=explode(',',$_POST['tax']);
/*print_r($tax[1]); */
?>

<?php 

$earlier = new DateTime($_POST['fromdate']);
$later = new DateTime($_POST['todate']);


$diff = $later->diff($earlier)->format("%a");
/*echo "$diff";echo "<br>";*/
/*
$sql = "SELECT * FROM `tbl_booking`";
$result=$conn->query($sql);
    while($row=$result->fetch_assoc()){
  $sql2 = "SELECT * FROM `tbl_rooms`WHERE id='".$row['roomname']."'";
    $result2=$conn->query($sql2);
    $row2=$result2->fetch_assoc();*/

    
    $totalamount = 0.0;
$totalamountperday =1 * $roomname[2] + 1* $roomname[1]   ;echo "<br>"; /*}*/ $totalamount = $totalamountperday * ($diff+1);
/*echo $totalamount; */
   $taxamount = 0.0;
   $num = $totalamount * $tax[1];
   $deno = 100;
   $total1 = $num / $deno;
   $taxamount = $totalamount + $total1;
} 

$paid = 0;

   $sql = "INSERT INTO `tbl_booking`(`name`, `roomname`, `kidno`, `adultno`, `fromdate`, `todate`,`taxamount`, `totalamount`, `paid`,`tax_id`, `created_date` ) VALUES ('$name', '$roomname[0]', '$kidno', '$adultno', '$fromdate', '$todate', '$taxamount', '$totalamount', '$paid','$tax[0]', CURDATE())";

 if ($conn->query($sql) === TRUE) {
  $booking_id = $conn->insert_id;
  $res_date = getDatesFromRange($_POST['fromdate'],$_POST['todate']); 
  foreach ($res_date as $value) {
   $sql = "INSERT INTO `tbl_booking_dates`(`booking_id`, `booking_date`, `roomname`) VALUES ('$booking_id', '$value','$roomname[0]')";
   $conn->query($sql);
  }
      $_SESSION['success']=' Record Successfully Added';
      if(isset($useroles)){  if(in_array("booking_payment",$useroles)){
  echo "<script>window.location='../edit_payment.php?id=".$booking_id."';</script>";
    }}
    if(isset($useroles)){  if(!in_array("booking_payment",$useroles)){
      ?>
      <script type="text/javascript">
      window.location="../view_booking.php";
      </script>
      <?php
    }}
    /*else
    {
      ?>
      <script type="text/javascript">
      window.location="../view_booking.php";
      </script>
      <?php
    }*/
     
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="../view_booking.php";
</script>
<?php }
function getDatesFromRange($start, $end, $format = 'Y-m-d h:ia') { 

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
 ?>

