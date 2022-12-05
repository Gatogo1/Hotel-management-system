<?php session_start();?>
<?php include('head.php');?>

  <?php
  include('connect.php');
if(isset($_POST['btn_forgot']))
{
$otp = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);
 $text_email=$_POST['email'];

$sql = "SELECT * FROM admin where email ='".$text_email."' " ;
$ans = $conn->query($sql);
$res=mysqli_fetch_array($ans);
   $realemail=$res['email'];
  $person_fname=$res['fname'];  
  $person_lname=$res['lname'];
  $personname=$person_fname.$person_lname;
  $user_name = $res['username'];

  
 $msg = "Your Password is :'".$otp."'";
  $subject='Remind password';
  //$m = mail($to,$subject,$msg,$headers);
  
$otp1 = hash('sha256', $otp);
function createSalt()
{
    return '2123293dsj2hu2nikhiljdsd';
}
$salt = createSalt();
$otp_pass =  hash('sha256', $salt . $otp1);     
  
if($text_email == $realemail){

$s = "select * from tbl_email_config";
$r = $conn->query($s);
$rr = mysqli_fetch_array($r);

$mail_host = $rr['mail_driver_host'];
$mail_name = $rr['name'];
$mail_username = $rr['mail_username'];
$mail_password = $rr['mail_password'];
$mail_port = $rr['mail_port'];
//$m = mail($to,$subject,$msg,$headers);
require("PHPMailer/class.phpmailer.php");

$mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = $mail_host;
    $mail->From = $mail_name;
    $mail->FromName  =  $mail_name;
    $mail->AddAddress($text_email, $personname);
    //$mail->AddAddress("recipient_2@domain.com");
    $mail->SMTPAuth = "true";
    $mail->Username = $mail_username;
    $mail->Password =  $mail_password;
    $mail->Port  =  $mail_port;
    $mail->Subject = 'Forget Password';
$mail->Body    = "Hello, Your New Password is :'".$otp."' ";
if ($mail->Send()) {
   $sql = "UPDATE admin SET password ='$otp_pass' WHERE email='$text_email'";
$ans1 = $conn->query($sql); 
?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -success js_success-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Success 
    </h1>
    <p>Send Email Successfully.....Please check Your Email</p>
    <p>
      <a href="login.php"><button class="button button--success" data-for="js_success-popup">OK</button></a>
    </p>
  </div>
</div>
<?php } else { ?>
<link rel="stylesheet" href="popup_style.css">
<div class="popup popup--icon -error js_error-popup popup--visible">
  <div class="popup__background"></div>
  <div class="popup__content">
    <h3 class="popup__content__title">
      Error 
    </h1>
    <p>Something Goes Wrong.....</p>
    <p>
      <button class="button button--error" data-for="js_error-popup">Close</button>
    </p>
  </div>
</div>
<?php } ?>
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


<?php

  

    
    }
}   

?> 


    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>Forgot Password</h4>
                                <form method="POST">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    
                                   
                                    <button type="submit" name="btn_forgot" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>

</body>

</html>