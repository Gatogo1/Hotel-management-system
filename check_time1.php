<?php require_once('check_login.php');?>
<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    </head>
 <?php
 include('connect.php');
 date_default_timezone_set('Africa/Accra');
 $current_date =('l, jS F  h:ia');
 $taxpercent = '19%'
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
                                    $sql5 = "SELECT * FROM `tbl_check` WHERE id='".$row['id']."'";
                                    $result5=$conn->query($sql5);
                                    $row5=$result5->fetch_assoc();
                                    $sql6 = "SELECT * FROM `tbl_check1` WHERE id='".$row['id']."'";
                                    $result6=$conn->query($sql6);
                                    $row6=$result6->fetch_assoc();



    //print_r($row);
    extract($row);
$bookingid = $row['id'];
$name = $row2['name'];
$time_in = $row3['amount'];
$datee = $row3['datee'];
$timein = $row5['timein'];
$timeout = $row6['timeout'];


  
 $c1 = "SELECT * FROM `tbl_rooms` WHERE id='".$row['roomname']."'";
 $type = $conn->query($c1);
 $room=$type->fetch_assoc();

 $c2 = "SELECT count(*) as days FROM `tbl_booking_dates` WHERE booking_id='".$row['id']."'";
 $type1 = $conn->query($c2);
 $days=$type1->fetch_assoc();


}


?>      






<div class="row justify-content-center">
   <div class="col-lg-6">
        <div class="card">
            <div class="">
              <!--   <button class="btn btn-primary pull-right" onclick="printDiv('printableArea')"><i class="fa fa-print"></i></button>
                <div id="printableArea">
                   <table width="100%">
 
                    
                        <tr>
                            <td colspan="6">
                                <table border="1" width="100%" class="table">
                                    <tr align="center">
                                        <th>Customer name</th>
                                        <th>ID</th>
                                        <th>Check in</th>
                                        <th>Check out</th>
                                       
                                    </tr>

                                      
                                    <tr>
                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $bookingid; ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($fromdate))?></td>
                                        <td><?php echo date('d/m/Y',strtotime($todate))?></td>
                                       
                                         
                                </table>
                            </td>
                        </tr> 
                    </table>
                    </div>
                        </div>   .-->

                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#id</th>
      <th scope="col">Name</th>
    
      <th scope="col">Time in</th>
      <th scope="col">Time out</th>
    </tr>
  </thead>
  <tbody>

 
                                            <tr>
                                            <td><?php echo  $bookingid;?></td>
                                                <td><?php echo  $name;?></td>
                                             
                                                <td><?php echo $timein ; ?></td>
                                                <td><?php echo $timeout; ?></td>
                                                
                                                
                                                </td>
                                            </tr>
                                        



<?php
date_default_timezone_set("Africa/Tunis");
echo   date("h:i:sa");
?>

  </tbody>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
                        <form class="form-valide" action="pages/checkin1.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">ENTER USER ID<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="id" placeholder="e.g(40)"   >
                                            </div>
                                        </div>
                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">ENTER CUSTORMER CHECKOUT TIME<span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="timeout" placeholder="00:00"   >
                                            </div>
                                        </div>


                                     

                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="save_contact" class="btn btn-primary" id="btnValidate">Submit</button>
                                            </div>
                                        </div>
                                        <p><span class="text-danger">Note*</span>Please dont submit twice </p>








                                        
                    </div>
                </div>
            </div>
        </div>
    </div>   <!--  </div> -->
   



 

    

</html>

    
 
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

