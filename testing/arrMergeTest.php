<?php


?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="../Script/commonScript.js"></script>
    <script src="../Script/jquery.min.js"></script>
    <script src="../Script/components.js"></script>
    <script src="../Script/action.js"></script>
    <link rel="../stylesheet" href="Style/global.css">
    <style>
        *{
            padding:0px;
            margin:0px;
        }
    .share_link_layer {
        position: relative;
        top:0px;
        left:0px;
        background: #ddda;
        display: flex;
        justify-content:center;
        align-items: center;
        flex-direction: column;
        flex-wrap: wrap;
        background:#ddd;
        height:100vh;
        width:100px;
    }

    .share_link_box {
        height:30px;
        width:30px;
        display: flex;
        justify-content:center;
        align-items: center;
        background: #fff;
        margin:10px 10px;
        padding:8px;
        text-align: center;
        border-radius:100px;
        border:.2px solid rgba(0,0,0,.1);
    }
    .share_link_box a{
        text-decoration: none;
        color:#123;
    }
    .share_link_box span{
        margin:10px;

        font-size: 10pt;
    }
    .share_link_box:hover {
        background: #123;
    }
    .share_link_box:hover > a{
        color:#fff;
    }


    </style>
</head>

<body>
    <section class="share_link_layer">
        <div class="share_link_box" style="background:red;">
            <a class="fa fa-close" style="color:#fff;">
            </a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-whatsapp">
            </a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-facebook-official">
            </a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-instagram"></a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-envelope">
            </a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-pinterest">
            </a>
        </div>

    </section>
</body>

</html>