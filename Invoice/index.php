<?php


// Include the main TCPDF library (search for installation path).
require_once('TCPDF/tcpdf.php');
require_once('../Model/productModel.php');
require_once('../Model/customerModel.php');
require_once('../Controller/spacesettingController.php');
$bis_info = new spacesetting();
$info = $bis_info->business_info();
//require_once '../View/main/business_info.php';//business info


//shop info

$prdObj = new products();

if(!isset($_GET['invoice_id'])){
    die('Invaild invoice ID, Please check.');
}
$productList = $prdObj->getOrderDetailById($_GET['invoice_id'])['data'];
if(count($productList)!==0){
    $products = $productList[0];
}else{
    die('Invaild invoice ID, Please check.');
}
$date = $products['date'];
$order_id = $products['id'];
$order_status = ($products['status'] =='null')?'TBD':$products['status'];
$list = json_decode($products['list'],true);
$total_item = count($list);
$tags = '';
$total = 0;
$o_price = 0;
$o_off = 0;
for($i=0;$i<count($list);$i++){
    $productInfo = $prdObj->getProductDetailById($list[$i]['p_id']);
   if($productInfo['status']){
    $o_price = $o_price + ($productInfo['data'][0]['price'] * $list[$i]['qnty']);
    $o_off = $o_off + (($productInfo['data'][0]['price'] * ($productInfo['data'][0]['offer'] * $list[$i]['qnty']))/100);
    $pp = $prdObj->calcOffer($productInfo['data'][0]['price'],($productInfo['data'][0]['offer']),$list[0]['qnty']);
    $total+=$pp;
        $tags .= "<tr>
        <td><br><br>".($i+1)."<br></td>
        <td><br><br><a href='http://localhost/common-ecom-mission/index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=".$productInfo['data'][0]['p_id']."' target='blank'>".$productInfo['data'][0]['p_id']."</a><br></td>
        <td><br><br>".$productInfo['data'][0]['p_name']."<br></td>
        <td><br><br>".$productInfo['data'][0]['offer']."%<br></td>
        <td><br><br>".$productInfo['data'][0]['price']."<br></td>
        <td><br><br>".$list[$i]['qnty']."<br></td>
        <td><br><br>".($productInfo['data'][0]['price'] * $list[$i]['qnty'])."<br></td>
        </tr><hr style=\"height:.5px\">";
        

        
   }

}


$cusObj = new customer();
$cus = $cusObj->getUserInfoById();
//print_r($list);exit;
if(count($cus['data'])!==0){
$cusInfo = $cus['data'][0];
}else{
    die('Invaild customer');
}
$shop_name = $info['business']['name'];
$shop_address = $info['business']['address'];
$shop_owner_name = $info['owner']['name'];
$shop_contact = 'Ph-'.$info['business']['phone'].', Whatsapp-'.$info['business']['whatsapp'];
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
$pdf->SetTitle('Invoice Bill');
$pdf->SetSubject('Invoice Bill');
$pdf->SetKeywords('INVOICE, PDF, Bill');
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, 0,$shop_name,$shop_address.', '. $shop_contact, array(0,64,255), array(0,64,128));
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
<h1></h1>
<h>Ordered Date : {$date}</h4>
<h4>Order Status : {$order_status}</h4>

<div style="background-color:#ddd;border-radius:10px">
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
</div>
<table>
    <tr style="background-color:cornflowerblue;">
        <th><br><br>Sno<br></th>
        <th><br><br>P-ID<br></th>
        <th><br><br>P-Name<br></th>
        <th><br><br>Off<br></th>
        <th><br><br>Price<br></th>
        <th><br><br>Qnty<br></th> 
        <th><br><br>Total<br></th>
    </tr>
   $tags

   <tr>
   <td colspan="7" ></td>
   </tr>

   <tr>
   <td colspan="7" style="text-align:left">Items - {$total_item}</td>
    </tr>

   <tr>
   <td colspan="7" ></td>
   </tr>

    <tr>
   <td colspan="5" ></td>
         <td colspan="2" style="text-align:right">Price +{$o_price}rs</td>
    </tr>
    <tr>
    <td colspan="7" ></td>
    </tr>
    
    <tr>
   <td colspan="5" ></td>
    <td colspan="2" style="text-align:right;">Saving(%) - {$o_off}rs</td>
</tr>
    <tr>
        <td colspan="7" align="center">
            <h1>Total : {$total}rs</h1>
        </td>
    </tr>
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