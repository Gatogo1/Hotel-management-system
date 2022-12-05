 <?php 
 include('connect.php');
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

 ?>
         <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard </span></a>
                        </li>

                        <li class="nav-label">Management</li>
                        <?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">User Management</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("manage_roles",$useroles)){ ?>
                                <li><a href="assign_roles.php">Add Roles</a></li>
                                <li><a href="view_roles.php">View Roles</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("create_user",$useroles)){ ?>
                                 <li><a href="add_user.php">Add User</a></li>
                                 <?php } } ?>
                                 <?php if(isset($useroles)){  if(in_array("users",$useroles)){ ?>
                                <li><a href="view_user.php">View Users</a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                        <?php } } ?>
                        <?php if(isset($useroles)){  if(in_array("customer",$useroles)){ ?>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Customer Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_customer",$useroles)){ ?>
                                <li><a href="add_customer.php">Add Customer</a></li>
                                <?php } } ?>
                                <li><a href="view_customer.php">View Customer</a></li>
                                
                            </ul>
                        </li>
                        <?php } } ?>

                        <?php if(isset($useroles)){  if(in_array("rooms",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Room Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_room",$useroles)){ ?>
                                <li><a href="add_room.php">Add Room</a></li>
                                <?php } } ?>
                                <li><a href="view_room.php">View Room</a></li>
                                
                            </ul>
                        </li>
                    <?php }} ?>

                   <!-- <?php if(isset($useroles)){  if(in_array("rooms",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-edit (alias)"></i><span class="hide-menu">Room Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_room",$useroles)){ ?>
                                <li><a href="add_room.php">Add Room</a></li>
                                <?php } } ?>
                                <li><a href="view_room.php">View Room</a></li>
                                
                            </ul>
                        </li>
                    <?php }} ?>-->

                        <?php if(isset($useroles)){  if(in_array("currency",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-rupee (alias)"></i><span class="hide-menu">Currency Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_curr.php">Add Currency</a></li>
                                <li><a href="view_curr.php">View Currency</a></li>
                               
                            </ul>
                        </li>
                        <?php }} ?>
                       <?php if(isset($useroles)){  if(in_array("room_booking",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-th-large"></i><span class="hide-menu">Room Booking Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_booking",$useroles)){ ?>
                                <li><a href="add_booking.php">Add Booking</a></li>
                                <?php } } ?>
                                <li><a href="view_booking.php">View Booking</a></li>
                               
                            </ul>
                        </li>
                        <?php }} ?>
                        <?php if(isset($useroles)){  if(in_array("drinks",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-glass"></i><span class="hide-menu">Bar Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_drink",$useroles)){ ?>
                                <li><a href="add_drink.php">Add Drink</a></li>
                                <?php } } ?>
                                <li><a href="view_drink.php">View Drink</a></li>
                                <?php if(isset($useroles)){  if(in_array("add_drink_payment",$useroles)){ ?>
                                <li><a href="add_drink_payment.php">Add Drink Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("drink_payment_invoice",$useroles)){ ?>
                                <li><a href="view_drink_payment.php">Drink Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("report_drink_payment",$useroles)){ ?>
                                <li><a href="drink_payment_report.php">Drink Report Payment</a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                    <?php }} ?>


                    <?php if(isset($useroles)){  if(in_array("plats",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu">Restaurant</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_plats",$useroles)){ ?>
                                <li><a href="add_plat.php">Add Food</a></li>
                                <?php } } ?>
                                <li><a href="view_plat.php">View Food</a></li>
                                <?php if(isset($useroles)){  if(in_array("add_plat_payment",$useroles)){ ?>
                                <li><a href="add_plat_payment.php">Add Food Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("food_payment_invoice",$useroles)){ ?>
                                <li><a href="view_plat_payment.php">Food Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("report_food_payment",$useroles)){ ?>
                                <li><a href="plat_payment_report.php">Food Report Payment</a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                    <?php }} ?>

                    <?php if(isset($useroles)){  if(in_array("pool",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bath"></i><span class="hide-menu">Pool Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("add_pool",$useroles)){ ?>
                                <li><a href="add_pool.php">Add Pool</a></li>
                                <?php } } ?>
                                <li><a href="view_pool.php">View Pool</a></li>
                                <?php if(isset($useroles)){  if(in_array("add_pool_payment",$useroles)){ ?>
                                <li><a href="add_pool_payment.php">Add Pool Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("pool_payment_invoice",$useroles)){ ?>
                                <li><a href="view_pool_payment.php">Pool Payment Invoice</a></li>
                                <?php } } ?>
                                <?php if(isset($useroles)){  if(in_array("report_pool_payment",$useroles)){ ?>
                                <li><a href="pool_payment_report.php">Pool Report Payment</a></li>
                                <?php } } ?>
                            </ul>
                        </li>
                    <?php }} ?>

                       <?php if(isset($useroles)){  if(in_array("tax",$useroles)){ ?>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-files-o"></i><span class="hide-menu">Tax Details</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="add_tax.php">Add Tax</a></li>
                                <li><a href="view_tax.php">View Tax</a></li>
                                
                            </ul>
                        </li>
                        <?php }} ?>
                       <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa  fa-sticky-note"></i><span class="hide-menu">Reports</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php if(isset($useroles)){  if(in_array("customer_report",$useroles)){ ?>
                                <li><a href="report_customer.php">Customer Report</a></li>
                                <?php }} ?>
                       <?php if(isset($useroles)){  if(in_array("report_booking",$useroles)){ ?>
                                <li><a href="report_booking.php">Booking Report</a></li>
                            <?php }} ?>
                       <?php if(isset($useroles)){  if(in_array("report_payment",$useroles)){ ?>
                        <li><a href="report_payment.php">Payment Reports</a></li>
                        <?php }} ?>
                        <?php if(isset($useroles)){  if(in_array("report_rooms",$useroles)){ ?>
                        <li><a href="report_rooms.php">Reserved Rooms</a></li>
                        <?php }} ?>
                        <?php if(isset($useroles)){  if(in_array("report_invoice",$useroles)){ ?>
                        <li><a href="report_invoice.php">Print Invoice</a></li>
                        <?php }} ?>
                        <?php if(isset($useroles)){  if(in_array("report_paid_unpaid",$useroles)){ ?>
                        <li><a href="report_paid_unpaid.php">Paid/UnPaid Reservations</a></li>
                        <?php }} ?>
                       
                               
                            </ul>
                        </li>
                        <?php if(isset($useroles)){  if(in_array("settings",$useroles)){ ?>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Setting</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="manage_website.php">Appearance Management</a></li>
                               <?php if($_SESSION["username"]=='admin') { ?>
                               
                              <li><a href="backups.php" >Download Database</a>
                        </li>
                             <?php } ?>
                              
                              
                            </ul>
                        </li> 
                        <?php } }?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->