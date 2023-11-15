<?php


// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');
require_once('../Model/productModel.php');
require_once('../Model/customerModel.php');


//shop info
$prdObj = new products();
$productList = $prdObj->getOrderDetailById($_GET['invoice_id'])['data'];
if(count($productList)!==0){
    $products = $productList[0];
}else{
    die('Invaild invoice ID, Please check.');
}
$date = $products['date'];
$order_id = $products['id'];
$order_status = $products['status'];
$list = json_decode($products['list'],true);
$total_item = count($list);
$tags = '';
for($i=0;$i<count($list);$i++){
    $tags .= "<tr>
    <td>".($i+1)."</td>
    <td><a href='http://localhost/common-ecom-mission/index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=".$list[$i]['p_id']."' target='blank'>".$list[$i]['p_id']."</a></td>
    <td>".$list[$i]['p_name']."</td>
    <td>".$list[$i]['qnty']."</td>
    </tr><br>";
}

$cusObj = new customer();
$cus = $cusObj->getUserInfoById();
if(count($cus['data'])!==0){
$cusInfo = $cus['data'][0];
}else{
    die('Invaild customer');
}
$shop_name = "ONLINE SUPER MARKET";
$shop_address = "NO:4 Shankar nagar, Pallavaram, chennai - 44";
$shop_owner_name = "mani";
$shop_contact = "xxxxx xxxxx";
$shop_social_media = "insta,what,fb";
//Customer info


$cus_name =$cusInfo['c_name'];
$cus_address = $cusInfo['address_1'].', '.$cusInfo['address_2'].', '.$cusInfo['city'].'-'.$cusInfo['pin_code'];
$cus_contact =$cusInfo['ph_num'];


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 001');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 30,$shop_name,$shop_address.', Phone number :'. $shop_contact, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));
//$pdf->Write(10, 'Instagram', 'http://www.instagram.com/', false, 'L', true);

// Set some content to print
$html = <<<EOD
<h1>ORDER ID : {$order_id}</h1>
<h4>Total Item : {$total_item}</h4>
<h>Ordered Date : {$date}</h4>
<h4>Order Status : {$order_status}</h4>

<div style="background-color:#ddd;">
    <div>
    <table cellpadding="5px">
        <tr><th colspan="2"><b>Order From</b></th></tr> 
        <tr><th>Shop Name</th><td>{$shop_name}</td>
</tr>
<tr>
    <th>Shop Address</th>
    <td>{$shop_address}</td>
</tr>
<tr>
    <th>Owner Name</th>
    <td>{$shop_owner_name}</td>
</tr>
<tr>
    <th>Contact</th>
    <td>{$shop_contact}</td>
</tr>
<tr>
    <th>Follow us</th>
    <td>{$shop_social_media}</td>
</tr>
</table>
</div>
<hr>
<div>
    <table cellpadding="10px">
        <tr>
            <th colspan="2"><b>Order To</b></th>
        </tr>
        <tr>
            <th>Customer Name</th>
            <td>{$cus_name}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{$cus_address}</td>
        </tr>
        <tr>
            <th>Contact</th>
            <td>{$cus_contact}</td>
        </tr>
    </table>
</div>
</div><br><br>
<table>
    <tr style="background-color:cornflowerblue;">
        <th>Sno</th>
        <th>P-ID</th>
        <th>P-Name</th>
        <th>Quantity</th>
    </tr><br><br>
   $tags
</table>

EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
?>