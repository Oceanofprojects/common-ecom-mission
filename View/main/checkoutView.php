<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
        <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">

</head>

<body>
    <?php
    require_once 'Model/productModel.php';
$productMdl = new products();
    require_once 'sections/header.php';
    // print_r($data['data']['product_detail']);
    // exit;
    ?>
    <br><br><br>
    <center>
        <style>
        form {
            background: #ffff;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
            width: 50%;
            min-width: 240px;
        }
        </style>
        <?php


        $cc_info = $productMdl->raiseCcReq();
        // print_r($cc_info);
        if($cc_info['status']){
            if(is_numeric($cc_info['data'])){
                $cc_price = $cc_info['data'];   
            }else{
                $cc_price = " <span class='fa fa-spinner rotate360auto'></span> <small style='color:tomato'>Please wait couple of minutes</small> <b>/</b> <small>Enquiry : <a href='#'>+91 00000 00000</a></small>";                
            }
        }

        if(isset($data['data']['product_detail'])){
        $cartPrdList = $data['data']['product_detail'];
        if(count($cartPrdList) ==0){
          echo "Please some products to cart !.";exit;
        }
    }else{
        die('Invaild Token');
    }
        ?>

        <form id="frm">
            <br>
            <h1>Checkout</h1><br>
            <br>
            <table>
                <tr>
                    <td>
                        <label style="background:navy;color:#ddd;padding:5px;">Step 1</label>
                        <small>&nbsp;Please check selected items. <u>(If item not showing? <a href="#" onclick="location.reload()">Refresh</a>)</u></small><br><br>
                        <label><b>Selected items (<?php echo count($cartPrdList);?>) : </b></label><br><br>
                        <?php
                        for($i=0;$i<count($cartPrdList);$i++){
                         echo "<p style='padding:5px 0px;'>".$cartPrdList[$i]['p_name']."&nbsp;&nbsp;<span class='fa fa-angle-double-right'></span>&nbsp;&nbsp;".$cartPrdList[$i]['qnty']."</p>";
                        }
                        ?><br>
                        <hr><br>
                        <h3>Product Price : <?php echo $data['data']['total_cost'];?></h3><br>
                        <h3>Courier Price : <?php echo $cc_price;?></h3><br>
                        <h3 style="padding:10px;background: lightgreen;">Total : <?php echo (is_numeric($cc_price))?$cc_price+$data['data']['total_cost']:"TBD";?></h3><br>
                    </td>
                </tr>
                <?php
                if(is_numeric($cc_price)){
                ?>
                <tr id="step2">
                    <td>
                        <label style="background:navy;color:#ddd;padding:5px;">Step 2</label>
                        <small>&nbsp;Scan G-pay QR to pay money (<b>#Please check UPI ID/Name before make
                                payment</b>)</small><br><br>
                        <a href="assets/common-images/gpay_qr.jpeg" target="blank"><img
                                src="assets/common-images/gpay_qr.jpeg" alt="" style="width:230px;"></a><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="background:navy;color:#ddd;padding:5px;">Step 3</label>
                        <small>&nbsp;After success payment take a screenshot upload the image proof
                            <!-- and track your order
                            status <a
                                href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product"
                                class="fa fa-truck">&nbsp;Track
                                order</a> -->
                        </small><br><br>
                        <label>Payment proof : </label><input class="file" type="file" id="file1" name="file1">
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <br><br>
                        <div id="completeOrderCon">
                            <input type="button" class="btn" value="Complete order" style="background:cornflowerblue;"
                                onclick="completeOrder()">
                        </div>

                    </td>
                </tr>
                <?php
                    }
                ?>

            </table><br>
        </form>
    </center>
    <script>
    function completeOrder() {
        if (document.getElementById('file1').value.trim() == '') {
            dis_msg_box('#000', 'tomato', 'Please select payment proof image !');
        } else {
            performAjxForFiles('index.php', '#frm',
                '?controller=product&key=9139fb9fc1c8a937ed92c4b4550cf57ab5ac7bff859837c41e27a451583a8883', (
                    res) => {
                    d = JSON.parse(res)
                    if (d.status) {
                        //                        $('#frm')[0].reset();
                        $('#frm').empty();
                        $('#frm').append('<br><h1>Success !</h1><br><br><label>Order ID : <b>' + d.data + '</b>, ' +
                            d.message +
                            '<a href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product" class="fa fa-truck">&nbsp;Track order</a></label><br><br>'
                        );
                        dis_msg_box('#000', 'lightgreen', d.message);
                    } else {
                        dis_msg_box('#000', 'tomato', d.message);
                    }
                });
        }
    }
    </script>
    <br><br><br>
    <?php
    // require_once 'sections/footer.php';
    ?>
</body>

</html>