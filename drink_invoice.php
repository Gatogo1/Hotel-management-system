<?php
session_start();
     ob_clean();
	include 'connect.php';
	
	require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Drink Payment Invoice ');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage(); 
    $contents = '<table style="padding: 1%;">';
    $que="SELECT * FROM `drinks_invoice` WHERE id='".$_GET["id"]."'";
    $query=$conn->query($que);
    $drink=mysqli_fetch_assoc($query);

    $web = "select *from manage_website where id = '1'";
    $res_web = $conn->query($web);
    $website = mysqli_fetch_array($res_web);

    $que="SELECT * FROM `tbl_rooms` WHERE id='".$drink["room_id"]."'";
    $query=$conn->query($que);
    $room=mysqli_fetch_assoc($query);

    $contents .= '<tr><td colspan="2"><b>Hotel Name :</b> '.$website['hotel_name'].'<br>
    <b>Email :</b> '.$website['email'].'<br>
    <b>Phone No :</b> '.$website['phone_no'].'<br>
    <b>Address :</b> '.$website['address'].' '.$website['city'].' '.$website['zip_code'].'</td>
    <td colspan="2" align="right"><b>Customer Name :</b> '.$drink['cust_name'].'<br>
    <b>Email :</b> '.$drink['cust_email'].'<br>
    <b>Phone No :</b> '.$drink['cust_contact'].'<br>
    <b>Address :</b> '.$drink['cust_address'].'</td></tr>
    <tr><td colspan="2"><b>Room No : '.$room['room_no'].' ['.$room['roomname'].']</b></td>
    <td colspan="2" align="right"><b>Date : '.date('d/m/Y',strtotime($drink['added_date'])).'</b></td></tr>
    <tr><td colspan="4">
    <table style="padding: 1%;width:100%;" border="1">
    <tr style="background-color:#4c99d6;" align="center"><th width="5%"><b>Sr</b></th><th width="25%"><b>Drink Name</b></th><th><b>Qty.</b></th><th><b>Rate</b></th><th><b>Total</b></th></tr>';
    $sql_items = "select * from drinks_invoice_items where drinks_invoice_id = '".$drink['id']."'";
    $res_items = $conn->query($sql_items);
    $i=0;
    while($item = mysqli_fetch_array($res_items)){
      $sql = "select *from drinks where id = '".$item['drink_id']."'";
      $rep = $conn->query($sql);
      $product = mysqli_fetch_array($rep);
      $i++;
      $contents .= '<tr><td>'.$i.'</td><td>'.$product['item_name'].'</td><td>'.$item['qty'].'</td><td>'.$item['price'].'</td><td>'.$item['subtotal'].'</td></tr>';
    }
    $contents .= '<tr style="border: 1px solid black;"><td colspan="4" align="right">Total</td><td>'.$drink['total_amount'].'</td></tr></table></td></tr><tr><td colspan="4" align="right">Signature<br>_________________________</td></tr></table>';

	 $pdf->writeHTML($contents); 
    ob_end_clean();		
    $pdf->Output('payslip.pdf', 'I');

?>