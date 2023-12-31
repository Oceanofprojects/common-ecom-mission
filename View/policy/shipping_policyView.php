<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <?php
        $info = $data['data']['info'];
    require_once 'sections/msg_bot.php';
    ?>
    <style>
        .static_temp{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }
        .static_temp div{
            width:90%;
        }.static_temp h3{
            text-align: left;
            padding:10px;
            margin:10px 0px;
            background: lightblue;
            text-weight:bolder;
        }

.static_temp p{
    padding:0px 20px;
    text-align: justify;
}
.static_temp div span a{
    color:navy;
}
    </style>

    <title>Document</title>
</head>

<body>
    <?php
    require_once __DIR__.'/../../sections/header.php';

    ?>

    <section class="static_temp">
        <center>
        <br>
        <h1 align="center"><b>Shipping Policy</b></h1>
        <br><br><br>   
        <div>
            <h3>Processing Time</h3>
            <p>All orders are processed within 1-2 business days. Orders are not shipped or delivered on weekends or holidays. If we are experiencing a high volume of orders, shipments may be delayed by a few days. Please allow additional days in transit for delivery. If there will be a significant delay in the shipment of your order, we will contact you via email or telephone.</p>
        </div>
        <br><br>
        <div>
            <h3>Shipping Rates & Delivery Estimates</h3>
            <p>Shipping charges for your order will be calculated and displayed at checkout. We offer a range of shipping options to meet your needs. Delivery times are estimates and commence from the date of shipping, rather than the date of order. Actual delivery times may vary depending on your location and chosen shipping method.</p>
        </div>
        <br><br>
        <div>
            <h3>International Shipping</h3>
            <p>We currently do not offer international shipping.</p>
        </div>
        <br><br>
        <div>
            <h3>Shipment Confirmation & Order Tracking</h3>
            <p>You will receive a shipment confirmation email once your order has shipped containing your tracking number(s). The tracking number will be active within 24 hours.
</p>
        </div>
        <br><br>
        <div>
            <h3>Customs, Duties, and Taxes</h3>
            <p><b><?php echo $info['business']['name'];?></b> is not responsible for any customs and taxes applied to your order. All fees imposed during or after shipping are the responsibility of the customer (tariffs, taxes, etc.).</p>
        </div>
        <br><br>
        <div>
            <h3>Damages</h3>
            <p><b><?php echo $info['business']['name'];?></b> is not liable for any products damaged or lost during shipping. If you received your order damaged, please contact the shipment carrier to file a claim. Please save all packaging materials and damaged goods before filing a claim.</p>
        </div>
        <br><br>
        <div>
            <h3>Returns Policy</h3>
            <p>Please refer to our Returns & Refunds Policy for information on returns.</p>
        </div>
        <br><br>
        <div>
            <h3>Questions</h3>
            <p>If you have any questions about the shipping policy, please contact us at <span><a href="mailto:<?php echo $info['social_media']['mail'];?>"><?php echo $info['social_media']['mail'];?></a></span> or <span><a href="tel:<?php echo $info['business']['phone'];?>"><?php echo $info['business']['phone'];?></a> / <a href="https://wa.me/<?php echo $info['business']['whatsapp'];?>"><?php echo $info['business']['whatsapp'];?></a></span>.</p>
        </div>

</center>
    </section>
    <br><br><br>

             <?php
    require_once __DIR__.'/../../sections/footer.php';

    ?>
</body>

</html>