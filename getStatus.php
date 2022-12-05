<?php require_once('check_login.php');?>
<?php
include 'connect.php';
$dates=array();
$res_date = getDatesFromRange($_POST['fromdate'],$_POST['todate']); 
  foreach ($res_date as $value) {
   	$que="SELECT * FROM `tbl_booking_dates` WHERE booking_date='".$value."' AND roomname='".$_POST['room_id']."'";
	$query=$conn->query($que);
	while($row=mysqli_fetch_array($query))
	{
	    $dates[]=$value;
	}
  }
  if(empty($dates))
  {
  	echo '1';
  }
  else
  {
  	echo json_encode($dates);
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

?>

