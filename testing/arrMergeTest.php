<?php


?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="../Script/commonScript.js"></script>
    <script src="../Script/jquery.min.js"></script>
    <script src="../Script/components.js"></script>
    <script src="../Script/action.js"></script>
    <link rel="../stylesheet" href="Style/global.css">
    <style>
    .features_layer {
        background: #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        padding: 20px 0px;
        background: linear-gradient(45deg, navy, blue, purple);
    }

    .features_box {
        flex: 1;
        min-width: 150px;
        background: #fff;
        margin: 10px;
        text-align: center;
        border-radius: 10px
    }

    .features_box h1 {
        font-size: 3em;
    }
    </style>
</head>

<body>
    <section class="features_layer">
        <div class="features_box">
            <h1 class="fa fa-diamond"></h1>
            <p>TOP QUALITY</p>
        </div>

        <div class="features_box">
            <h1 class="fa fa-cubes"></h1>
            <p>SAFE PACKING</p>
        </div>

        <div class="features_box">
            <h1 class="fa fa-truck"></h1>
            <p>ONLINE TRACK</p>
        </div>

        <div class="features_box">
            <h1 class="fa fa-percent"></h1>
            <p>EXCLUSIVE OFFER</p>
        </div>

        <div class="features_box">
            <h1 class="fa fa-exchange"></h1>
            <p>MONEY BACK</p>
        </div>
    </section>
</body>

</html>