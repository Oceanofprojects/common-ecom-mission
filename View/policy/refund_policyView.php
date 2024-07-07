<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <title><?php echo $data['title']; ?></title>
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
        .static_temp {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }

        .static_temp div {
            width: 90%;
        }

        .static_temp h3 {
            text-align: left;
            padding: 10px;
            margin: 10px 0px;
            background: lightblue;
            text-weight: bolder;
        }

        .static_temp p {
            padding: 0px 20px;
            text-align: justify;
        }

        .static_temp div span a {
            color: navy;
        }
    </style>

    <title>Document</title>
</head>

<body>
    <?php
    require_once __DIR__ . '/../../sections/header.php';

    ?>

    <section class="static_temp">
        <center>
            <br>
            <h1 align="center"><b>Refund Policy</b></h1>
            <br><br><br>
            <div>
                <p>At <b><?php echo $info['business']['name']; ?></b>, our goal is to ensure your satisfaction with every
                    purchase. If, for any reason, you are not completely satisfied with your order, we are here to
                    assist you.</p>
            </div>
            <br><br>

            <div>
                <h3>Conditions for Refund or Exchange</h3>
                <p>To be eligible for a refund or exchange, please ensure the following conditions are met:
                    <br><br>The plant must be in its original condition.
                    <br><br>The plant must be returned in the original packaging.
                    <br><br>You must provide proof of purchase.
                    <br><br>Refund or exchange requests must be made within 30 days of receiving the order.
                </p>
            </div>
            <br><br>
            <div>
                <h3>How to Initiate a Refund or Exchange</h3>
                <p>To initiate a refund or exchange, please follow these steps:
                    <br><br>
                    Contact our customer support team at [customer support email] within 30 days of receiving your
                    order.
                    Provide your order number and details about the issue.
                    Our customer support team will guide you through the return process.
                    Refund Processing
                    <br><br>
                    Once your return is received and inspected, we will send you an email to notify you that we have
                    received your returned item. We will also notify you of the approval or rejection of your refund.
                    <br><br>
                    If approved, your refund will be processed, and a credit will be automatically applied to your
                    original method of payment within [number of days] days.
                </p>
            </div>
            <br><br>
            <div>
                <h3>Non-Refundable Items</h3>
                <p>Please note that certain items are non-refundable, including gift cards and perishable goods.</p>
            </div>
            <br><br>
            <div>
                <h3>Damaged or Defective Items</h3>
                <p>If your plant arrives damaged or defective, please contact us immediately. We will work with you to
                    replace the item or provide a refund.</p>
            </div>
            <br><br>
            <div>
                <h3>Contact Us</h3>
                <p>If you have any questions about our refund policy, please contact us at <span><a
                            href="mailto:<?php echo $info['social_media']['mail']; ?>"><?php echo $info['social_media']['mail']; ?></a></span>
                    or <span><a
                            href="tel:<?php echo $info['business']['phone']; ?>"><?php echo $info['business']['phone']; ?></a></span>.
                    <br><br>
                    Thank you for choosing <b><?php echo $info['business']['name']; ?></b>!
                </p>
            </div>
        </center>

    </section>
    <br><br><br>

    <?php
    require_once __DIR__ . '/../../sections/footer.php';

    ?>
</body>

</html>