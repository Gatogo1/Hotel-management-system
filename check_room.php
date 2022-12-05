<?php include('connect.php');?>
<?php 

if(isset($_GET['room_no']))
{
    
    $que="SELECT * FROM `tbl_rooms` WHERE room_no='".$_GET['room_no']."'";
    $query=$conn->query($que);
    $rowcount=mysqli_num_rows($query);
    if($rowcount>0)
    {
        while($row=mysqli_fetch_array($query))
        {
            if(empty($row))
              {
                echo '1';
              }
              else
              {
                echo '0';
              }
        }
    }
    else{
        echo '1';
      }
    
  
}
?>