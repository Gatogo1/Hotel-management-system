<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
<?php

 
 include('connect.php');
 date_default_timezone_set("Africa/Tunis");
 $current_date = date('Y-m-d');
 $taxpercent = '18%'
?>

<?php
$que="SELECT * FROM `tbl_booking` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
     $sql2 = "SELECT * FROM `tbl_customer` WHERE id='".$row['name']."'";
     $result2=$conn->query($sql2);
     $row2=$result2->fetch_assoc();
     $sql3 = "SELECT * FROM `tbl_payment` WHERE id='".$row['id']."'";
     $result3=$conn->query($sql3);
     $row3=$result3->fetch_assoc();
      $sql4 = "SELECT SUM(amount) as amt from tbl_payment WHERE bookingid='".$_GET["id"]."'";
                                    $result4 = $conn->query($sql4);
                                    $row4 = $result4->fetch_assoc();
    //print_r($row);
    extract($row);
$bookingid = $row['id'];
$name = $row2['name'];
$amount = $row3['amount'];
$datee = $row3['datee'];
$totalamount = $row['totalamount'];
$taxamount = $row['taxamount'];
$paid =  $row4['amt'];
$paid_amount = $row4['amt'];
$remainamount = $row['taxamount']-$row4['amt'];
  
 $c1 = "SELECT * FROM `tbl_rooms` WHERE id='".$row['roomname']."'";
 $type = $conn->query($c1);
 $room=$type->fetch_assoc();

 $c2 = "SELECT count(*) as days FROM `tbl_booking_dates` WHERE booking_id='".$row['id']."'";
 $type1 = $conn->query($c2);
 $days=$type1->fetch_assoc();

 $w_que="select * from manage_website";
$w_query=$conn->query($w_que);
while($web_details=mysqli_fetch_array($w_query))
{
  //print_r($row);
  extract($web_details);
}

}


?>      
<div class="row justify-content-center">
   <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <button class="btn btn-primary pull-right" onclick="printDiv('printableArea')"><i class="fa fa-print"></i></button>
                <div id="printableArea">
                    <table width="100%">
                        <tr>
                            <td colspan="3">
                                <h1><?php echo $hotel_name;?></h1>
                                <span><?php echo $address;?></span><br>
                                <span><?php echo $city;?>,<?php echo $zip_code;?></span><br>
                                <span><?php echo $phone_no;?><br>
                                <span><?php echo $email;?></span>
                            </td>
                            <td colspan="3" align="right">
                                <h2 class="text-info">INVOICE</h2>
                                <span>INVOICE NO. <?php echo sprintf('%03d',intval($bookingid)); ?></span><br>
                                <span>Date : <?php echo date('Y-m-d h:ia'); ?></span><br>
                                
                            </td> 
                        </tr>
                        <tr>
                            <td colspan="6" style="height:10px;"></td>
                        </tr>
                        <tr>
                            <!-- <td>Arival Date</td>
                            <td><?php echo $fromdate; ?></td> -->
                            <td colspan="2">Room type : <?php echo $room['roomname']; ?></td>                            
                            <td colspan="2"></td>
                            <td>BILL TO</td>
                            <td><?php echo $name; ?></td>
                        </tr> 
                        <tr>
                            <!-- <td>Departure Date</td>
                            <td><?php echo $todate; ?></td> -->
                            <td colspan="2">Room No. : <?php echo $room['room_no']; ?></td>                            
                            <td colspan="2"></td>
                            <td>Email</td>
                            <td><?php echo $row2['email']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">No of Adult : <?php echo $adultno; ?></td>
                            <td></td>
                            <td></td>
                            <td>Street Address</td>
                            <td><?php echo $row2['address']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">No of Kids : <?php echo $kidno; ?></td>
                            <td></td>
                            <td></td>
                            <td>Contact</td>
                            <td><?php echo $row2['contact']; ?></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="height: 30px;"></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <table border="1" width="100%" class="table">
                                    <tr align="center">
                                        <th>Stay Duration</th>
                                        <th>No of Days</th>
                                        <th>Adult Rate</th>
                                        <th>Kids Rate</th>
                                        <th> Total </th>
                                        <th>Total Tax</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    <tr>
                                        <td><?php echo date('d/m/Y',strtotime($fromdate)).'-'.date('d/m/Y',strtotime($todate)); ?></td>
                                        <td><?php echo $days['days']; ?></td>
                                        <td><?php echo ' &#8373 '. $room['peradultprice']; ?></td>
                                        <td><?php echo' &#8373 '.$room['perkidprice']; ?></td>
                                        <td><?php echo ' &#8373 '. $totalamount;
                                         ?></td>
                                        <td><?php echo  $taxpercent;  ?></td>
                                        <td><?php 
                                        $sql = "SELECT SUM(amount) as paid_amount FROM `tbl_booking` join `tbl_payment` 
                    On tbl_booking.id= tbl_payment.bookingid
                    WHERE tbl_booking.id = '".$_GET['id']."'";
                    
                     $result = $conn->query($sql);
                 $payment = $result->fetch_assoc();
                 echo ' &#8373 '.$payment['paid_amount']; ?></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   <!--  </div> -->
 
<?php include('footer.php');?>
<script>
function printDiv(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=1000');

    //mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('</head><body >');
    //mywindow.document.write('<h1>' + document.title  + '</h1>');
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    window.location.reload();
}
</script>

