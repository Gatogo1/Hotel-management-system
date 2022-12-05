<?php require_once('check_login.php');?>
<?php include('head.php');?>
<link href="popup_style.css" rel="stylesheet">
<?php include('header.php');?>
<?php include('sidebar.php');?>
 <?php include('connect.php');
 if(isset($useroles)){  if(!in_array("add_drink_payment",$useroles)){
  echo "<script>window.location='index.php';</script>";
    }}
    ?>

        <!-- Page wrapper  -->
<div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Payment</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Payment</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->     
                                
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4>Payment Details</h4>
                                <div class="form-validation">
                                    
                                    <form class="form-valide" action="pages/drink_payment.php" method="post" enctype="multipart/form-data">

                                         <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-skill">Room No:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <select class="form-control" id="room_id" name="room_id" >
                                                    <option value="">--Select Room--</option>
                                                    <?php  
                                                            $c1 = "SELECT * FROM `tbl_rooms`";
                                                            $result = $conn->query($c1);
                                                            if ($result->num_rows > 0) {
                                                                while ($row = mysqli_fetch_array($result)) {
                                                                    $c2 = "SELECT c.* FROM tbl_customer as c JOIN tbl_booking as b ON b.name=c.id WHERE b.roomname='".$row['id']."' and b.todate>='".date('Y-m-d ')."' and b.status=0 ORDER BY b.id DESC";
                                                                    $res = $conn->query($c2);
                                                                    $cust = mysqli_fetch_array($res);
                                                                    ?>
                                                                    <option data-name="<?php echo $cust['name'];?>" data-cust_id="<?php echo $cust['id'];?>" data-email="<?php echo $cust['email'];?>" data-contact="<?php echo $cust['contact'];?>" data-address="<?php echo $cust['address'];?>" value="<?php echo $row["id"];?>">
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
                                            <label class="col-lg-2 col-form-label" for="val-skill">Customer Name:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="hidden" class="form-control" name="cust_id" id="cust_id" required>
                                                <input type="text" class="form-control" name="cust_name" id="cust_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-skill">Customer Email:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="cust_email" id="cust_email" required>
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-skill">Customer Mobile No:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="cust_contact" id="cust_contact" required>
                                            </div>
                                            <label class="col-lg-2 col-form-label" for="val-skill">Customer Address:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="cust_address" id="cust_address" required>
                                            </div>
                                        </div>
                                       <hr>
                                       <div class="mydiv">
                                        <div class="form-group row control-group after-add-more subdiv">
                                            <div class="col-sm-3">
                                            <select class="form-control" name="drink_id[]" required>
                                                <option value="">Select Drink</option>
                                                <?php
                                                $drink_sql = "SELECT * FROM `drinks` WHERE status=0";
                                                $drink_res = $conn->query($drink_sql);
                                                while($drink = $drink_res->fetch_assoc()) { ?>
                                                    <option value="<?php echo $drink['id']; ?>" data-price="<?php echo $drink['price']; ?>"><?php echo $drink['item_name']; ?></option>
                                                <?php } ?>
                                            </select>
                                            </div>   
                                            <div class="col-sm-2">
                                            <input type="text" class="form-control product_price" name="price[]" min="1" placeholder="Price" required="required" readonly>
                                            </div>
                                            <div class="col-sm-2">
                                            <input type="number" class="form-control product_qty" name="qty[]" min="1" placeholder="Quantity" required="required">
                                            </div> 
                                            <div class="col-sm-2">
                                            <input type="text" class="form-control product_subtotal" name="subtotal[]" placeholder="Total" required="required" readonly="">
                                            </div>
                                            <div class="col-sm-3">
                                           <button class="btn btn-success add-more" type="button"><i class="fa fa-plus"></i></button>
                                            </div>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                            <label class="col-lg-2 col-form-label" for="val-skill">Grand Total:<span class="text-danger">*</span></label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" name="total_amount" id="total_amount" readonly required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                               <input type="submit" class="button button--success"  name="btn_save" value="Save">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="copy hide">
             <div class="form-group control-group row subdiv">
            <div class="col-sm-3">
            <select class="form-control" name="drink_id[]" required>
                <option value="">Select Drink</option>
                <?php
                $drink_sql = "SELECT * FROM `drinks` WHERE status=0";
                $drink_res = $conn->query($drink_sql);
                while($drink = $drink_res->fetch_assoc()) { ?>
                    <option value="<?php echo $drink['id']; ?>" data-price="<?php echo $drink['price']; ?>"><?php echo $drink['item_name']; ?></option>
                <?php } ?>
            </select>
            </div>
            <div class="col-sm-2">
            <input type="text" class="form-control product_price" name="price[]" min="1" placeholder="Price" required readonly>
            </div>
            <div class="col-sm-2">
            <input type="number" class="form-control product_qty" name="qty[]" min="1" placeholder="Quantity" required="required">
            </div>
            <div class="col-sm-2">
            <input type="text" class="form-control product_subtotal" name="subtotal[]" placeholder="Total" required="required" readonly="">
            </div>
            <div class="col-sm-3">
           <button class="btn btn-danger remove" type="button"><i class="fa fa-close"></i> </button>
            </div>
          </div>
          </div>
          
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
        <div class="popup popup--icon -error js_error-popup error_dates">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Sorry! 
    </h3>
    <p id="dates" class="text-danger">Oops Drink Already In List!!</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>

<?php include('footer.php');?>
  <script type="text/javascript">
    $(document).ready(function(){      
         $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });  
       $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      }); 
       $('#room_id').change(function(){
        var cust_id=$('#room_id option:selected').attr('data-cust_id');
        $('#cust_id').val(cust_id);
        var cust_name=$('#room_id option:selected').attr('data-name');
        $('#cust_name').val(cust_name);
        var cust_email=$('#room_id option:selected').attr('data-email');
        $('#cust_email').val(cust_email);
        var cust_contact=$('#room_id option:selected').attr('data-contact');
        $('#cust_contact').val(cust_contact);
        var cust_address=$('#room_id option:selected').attr('data-address');
        $('#cust_address').val(cust_address);
       });

       $('div.mydiv').on("change",'select[name^="drink_id"]',function(event){
        var drink_id=$(this).val();
        var reply=check_product(drink_id);
        if(Number(reply)>1)
        {
          $('.error_dates').addClass('popup--visible');
           $(this).val('');
        var currentRow=$(this).closest('.subdiv');
          currentRow.find('input[name^="price"]').val(0);
          currentRow.find('input[name^="qty"]').val(0);
          currentRow.find('input[name^="subtotal"]').val(0);
        }
        else
        {
          var price =$(this).find(':selected').attr('data-price');
          var currentRow=$(this).closest('.subdiv');
          currentRow.find('input[name^="price"]').val(price);
          currentRow.find('input[name^="qty"]').val(1);
          currentRow.find('input[name^="subtotal"]').val(price);
          
        }
        calculate();        
      }); 

       $('div.mydiv').on("keyup change",'input[name^="qty"]',function(event){
          var currentRow=$(this).closest('.subdiv');
          var qty =currentRow.find('input[name^="qty"]').val();
          var price =currentRow.find('input[name^="price"]').val();
          var subtotal=parseInt(price)*parseInt(qty);
          currentRow.find('input[name^="subtotal"]').val(subtotal);
          calculate();
});
       function calculate() {
          var tot_commi = 0;
 $('.product_subtotal').each(function() {
        tot_commi += Number($(this).val());
    });
 $('#total_amount').val(tot_commi);
       }
       function check_product(drink_id) {
        var flag=0;
        $("div.mydiv").find('select[name^="drink_id"]').each(function () {
                if(drink_id  == $(this).val()){
                  flag ++;               
                }
            });
        return flag;
       }
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