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
        <h1 align="center"><b>Replacement Policy</b></h1>
        <br><br>
        <div>
            <h3>Plant Replacement Policy:</h3>
            <p>In our continuous effort to provide you with the highest quality plants, we understand that sometimes accidents happen during transit. To address this, we are pleased to announce our Plant Replacement Policy. If, by any chance, your plant arrives damaged, we will gladly replace it free of charge.</p>
        </div>
        <br><br>
        <div>
            <h3>Unboxing Video Requirement:</h3>
            <p>To streamline this process and ensure that we can promptly address any concerns, we kindly request that you record an unboxing video when receiving your order. This simple step will help us assess the condition of the plant upon arrival.</p>
        </div>
        <br><br>
        <div>
            <h3>Instructions for Recording the Unboxing Video:</h3>
            <p>Set up your camera or smartphone in a well-lit area.<br><br>
Record the unboxing process from the moment you receive the package.<br><br>
Clearly show the condition of the packaging and the plant itself.<br><br>
If there are any signs of damage, please focus the camera on those areas.</p>
        </div>
        <br><br>
        <div>
            <h3>How to Submit the Video:</h3>
            <p><b>Once you have recorded the unboxing video, please send it to our customer support team at <a href="mailto:<?php echo $info['social_media']['mail'];?>"><?php echo $info['social_media']['mail'];?></a> within 12 hours of receiving your order. This will enable us to process any necessary replacements promptly.</p>
        </div>
        <br><br>
        <div>
            <h3>Free Plant for Next Order:</h3>
                        <p>As a token of our appreciation for your cooperation, if your plant is indeed damaged, we will include that particular plant for free in your next order. We believe this not only demonstrates our commitment to your satisfaction but also adds a touch of joy to your future plant endeavors.<br><br>At <?php echo $info['business']['name'];?>, we value your trust and aim to make your plant-buying experience seamless and enjoyable. Thank you for being a part of our community of plant enthusiasts.<br><br>Happy Planting!.</p>
        </div>
        <br><br>
        <div>
            <h3>Questions</h3>
            <p>If you have any questions about the replacement policy, please contact us at <span><a href="mailto:<?php echo $info['social_media']['mail'];?>"><?php echo $info['social_media']['mail'];?></a></span> or <span><a href="tel:<?php echo $info['business']['phone'];?>"><?php echo $info['business']['phone'];?></a> / <a href="https://wa.me/<?php echo $info['business']['whatsapp'];?>"><?php echo $info['business']['whatsapp'];?></a></span>.</p>
        </div>

</center>
    </section>
    <br><br><br>

             <?php
    require_once __DIR__.'/../../sections/footer.php';

    ?>
</body>

</html>