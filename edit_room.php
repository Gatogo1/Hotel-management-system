<?php require_once('check_login.php');?>

<?php include('head.php');?>

<?php include('header.php');?>
<?php include('sidebar.php');?>

 <?php
 include('connect.php');
if(isset($useroles)){  if(!in_array("edit_room",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
 date_default_timezone_set('Asia/Kolkata');
 $current_date = date('Y-m-d');

if(isset($_POST["submit"]))
{
    extract($_POST);
    /*$image = $_FILES['image']['name'];
  $target = "uploadImage/Profile/".basename($image);

 if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  @unlink("uploadImage/Profile/".$_POST['old_image']);
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }*/
  
      $q1="UPDATE `tbl_rooms` SET `floorno`='$floorno',`roomname`='$roomname',`peradultprice`='$peradultprice',`perkidprice`='$perkidprice',`color`='$color',`room_no`='$room_no' WHERE `id`='".$_GET['id']."'";
    //$q2=$conn->query($q1);
    if ($conn->query($q1) === TRUE) {
      $_SESSION['success']=' Record Successfully Updated';
     ?>
<script type="text/javascript">
window.location="view_room.php";
</script>
<?php
} else {
      $_SESSION['error']='Something Went Wrong';
?>
<script type="text/javascript">
window.location="view_room.php";
</script>
<?php
}
}
?>
<?php
$que="SELECT * FROM `tbl_rooms` WHERE id='".$_GET["id"]."'";
$query=$conn->query($que);
while($row=mysqli_fetch_array($query))
{
    //print_r($row);
    extract($row);
$floorno = $row['floorno'];
$roomname = $row['roomname'];
$peradultprice = $row['peradultprice'];
$perkidprice = $row['perkidprice'];
$color = $row['color'];
}

?> 
<!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Room Management</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Room Management</li>
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
                                    
                                    <form class="form-valide"  method="post"  enctype="multipart/form-data"> 
                                        <input type="hidden" name="currnt_date" class="form-control" value="<?php echo $currnt_date;?>">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Room No : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="room_no" name="room_no" value="<?php echo $room_no; ?>" required="">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Floor No : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="floorno" required="">
                                                    <option value="">Please select</option>
                                                    <option value="1" <?php if($floorno=='1'){ echo "selected"; } ?>>1</option>
                                                    <option value="2" <?php if($floorno=='2'){ echo "selected"; } ?>>2</option>
                                                    <option value="3" <?php if($floorno=='3'){ echo "selected"; } ?>>3</option>
                                                    <option value="4" <?php if($floorno=='4'){ echo "selected"; } ?>>4</option>
                                                    <option value="5" <?php if($floorno=='5'){ echo "selected"; } ?>>5</option>
                                                    <option value="6" <?php if($floorno=='6'){ echo "selected"; } ?>>6</option>
                                                </select>
                                            </div>
                                        </div>
                                      

                                       <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Room Name : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="roomname" required="">
                                                    <option value="">Please select</option>
                                                    <option value="Deluxe"<?php if($roomname=='Deluxe'){ echo "Selected";}?>>Deluxe</option>
                                                    <option value="Superior"<?php if($roomname=='Superior'){ echo "Selected";}?>>Superior</option>
                                                    <option value="Single"<?php if($roomname=='Single'){ echo "Selected";}?>>Single</option>
                                                    <option value="Double"<?php if($roomname=='Double'){ echo "Selected";}?>>Double</option>
                                                    <option value="Triple"<?php if($roomname=='Triple'){ echo "Selected";}?>>Triple</option>
                                                    <option value="Quad"<?php if($roomname=='Quad'){ echo "Selected";}?>>Quad</option>
                                                </select>
                                            </div>
                                        </div>
                                       
                                      <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Per Adult Price : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="peradultprice" value="<?php echo $peradultprice; ?>" minlength="3" maxlength="4" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Per Kid Price : <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-digits" name="perkidprice" value="<?php echo $perkidprice; ?>" minlength="3" maxlength="4" required="">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-digits">Amenities: <span class="text-danger">*</span></label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="color" value="<?php echo $color; ?>" required="">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
<link href="popup_style.css" rel="stylesheet">                                    
<div class="popup popup--icon -error js_error-popup error_dates">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sorry! 
    </h3>
    <p id="dates" class="text-danger">Room No Already Added</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php include('footer.php');?>
<script>
    $('#room_no').blur(function() {
        var room_no=$(this).val();
        var room_no1=<?php echo $room_no; ?>;
        if(room_no!=room_no1)
        {
          $.ajax({
            type: 'GET',
            url: 'check_room.php',
            data : {room_no:room_no},
            success: function (data) {
             if(data!=1)
             {
                $('.error_dates').addClass('popup--visible');
                $('#room_no').val(room_no1);
                return false;
             }
                  
            }
            });
        }
    })
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