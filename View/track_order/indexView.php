<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">

    <style>
    .status-con {
        width: 40%;
        background-color: #fff;
        border-radius: 0px 0px 10px 10px;
    }

    .status-box {
        min-height: 80px;
        ;
        position: relative;
        top: 0px;
        left: 0px;
        background-color: #fff;
        border-left: 5px solid #ddd;
        width: 90%;
        border-bottom: 1px solid rgba(0, 0, 0, .1);
    }

    .b-txt {
        display: none;
    }

    .status-box h3 {
        color: #123
    }

    .status-box p {
        padding: 30px 0px;
        ;
        width: 90%;
        text-align: justify;
    }

    .status-indi {
        position: absolute;
        top: 0px;
        left: -27px;
        border-radius: 25px;
        ;
        height: 50px;
        width: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ddd
    }

    #product_list li {
        list-style: none;
        padding: 10px;
        border-bottom: .1px solid rgba(0, 0, 0, .2);
    }

    @media only screen and (max-width:800px) {
        .status-con {
            width: 60%;
        }
    }

    @media only screen and (max-width:600px) {
        .status-con {
            width: 80%;
        }
    }
    </style>

    <title>Document</title>
</head>

<body>
    <?php
    require_once __DIR__.'/../../sections/header.php';

    ?>
    <center>
        <section class="status-con">
            <br><br>
            <div class="status-box b1" style="border-left-color:#b8efb8;">
                <div class="status-indi" style="background-color: #b8efb8;"><span class="fa fa-search"></span></div>
                <br>
                <h1>Track orders.</h1>
                <form id="frm">
                    <br>
                    <select id="myOrderId" style="padding:10px;border:.2px solid #ddd;border-radius: 5px;">
                        <?php
          if(count($data['data']['data']) !== 0){
            echo "<option value=''>Select order ID</option>";
            for($i=0;$i<count($data['data']['data']);$i++){
              echo "<option id='".$data['data']['data'][$i]['id']."' value='".$data['data']['data'][$i]['id'].",".$data['data']['data'][$i]['status']."'>".$data['data']['data'][$i]['id'].', #'.$data['data']['data'][$i]['date']."</option>";
            }
          }else{
            echo "<option value=''>Select Order ID</option><option value=''>Empty</option>";
          }
           ?>
                    </select>

                    <br><br><br>
                </form>
            </div>

            <div class="status-box b2">
                <div class="status-indi"><span class="fa fa-clock-o"></span></div>
                <div class="b-txt b2-txt">
                    <br>
                    <h3>Order Processing</h3><br>
                    <p>Be patient, your order processing by shop owner/Admin. Once order approved they send comfirmation
                        invoice bill to your email or whastapp. </p>
                    <ul id="product_list">
                        <li>Product 1</li>
                        <li>Product 1</li>
                        <li>Product 1</li>
                    </ul><br>
                    <h1><span class="fa fa-inr"></span> 1000</h1>

                    <br>
                </div>

            </div>


            <div class="status-box b3">
                <div class="status-indi"><span class="fa fa-truck"></span></div>
                <div class="b-txt b3-txt">

                    <br>
                    <h3>Product Shipped</h3>
                    <br>
                    <p>Your order shipped from hub/shop.</p>
                    <br>
                </div>
            </div>
            <div class="status-box b4">
                <div class="status-indi"><span class="fa fa-home"></span></div>
                <div class="b-txt b4-txt">

                    <br>
                    <h3>Order Arrived</h3>
                    <br>

                    <p>Your order shipped from hub/shop. Order arrived on <b>May 18 2023</b></p>
                    <br>
                </div>
            </div>

            <div class="status-box b5">
                <div class="status-indi"><span class="fa fa-comment"></span></div>
                <div class="b-txt b5-txt">

                    <br>
                    <h3>Update review</h3><br>
                    <p>Your order delivered successfully, Kindly give feedback about order/our service</p>
                    <form action="" id="frm" style="width:100%">
                        <center>
                            <textarea name="" id=""
                                style="border:.2px solid rgba(0,0,0,.2);border-radius:5px;width:90%;height: 100px;"></textarea>
                            <br>s s s s s <br>
                            <input type="button" value="send">
                        </center>
                    </form>
                    <br>
                </div>
            </div>

            <div class="status-box b6" style="border-left:5px solid transparent">
                <div class="status-indi"><span class="fa fa-heart"></span></div>
                <div class="b-txt b6-txt">

                    <br>
                    <h3>Thank You</h3><br>
                    <p style="text-align:center">Thank you & Visit our shop again</p>
                    <br>
                </div>
            </div>

            <!-- CANCEL -->
            <div class="status-box b7" style="border-left:5px solid transparent" hidden>
                <div class="status-indi" style="background-color:lightcoral"><span class="fa fa-ban"></span></div>
                <div class="b-txt b7-txt">

                    <br>
                    <h3>Order Cancelled</h3><br>
                    <p>Your order cancelled by shop owner/Admin. Please contact them !</p>
                    <ul id="product_list">
                        <li>Product 1</li>
                        <li>Product 1</li>
                        <li>Product 1</li>
                    </ul><br>
                    <h1><span class="fa fa-inr"></span> 1000</h1>
                    <br>
                </div>
            </div>



            <br><br>
        </section>
        <br><br><br>
    </center>
    <script>
    a = ['Pending', 'Shipped', 'Arrived', 'Complete', 'Success', 'Cancel'];
    v = a[0];
    //    loadOrderTracks(v);

    function loadOrderTracks(status) {
        switch (status) {
            case 'Pending':
                $('.b2-txt').fadeIn(300);
                $('.b2 .status-indi').css({
                    'background': '#b8efb8'
                })
                break;
            case 'Shipped':
                $('.b2-txt,.b3-txt').fadeIn(300);
                $('.b2').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi').css({
                    'background': '#b8efb8'
                })
                break
            case 'Arrived':
                $('.b2-txt,.b3-txt,.b4-txt').fadeIn(300);
                $('.b2,.b3').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi').css({
                    'background': '#b8efb8'
                })
                break
            case 'Complete':
                $('.b2-txt,.b3-txt,.b4-txt,.b5-txt').fadeIn(300);
                $('.b2,.b3,.b4').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi,.b5 .status-indi').css({
                    'background': '#b8efb8'
                })
                break
            case 'Success':
                $('.b5-txt').empty();
                $('.b5-txt').append("<br><h3>Update Review <span style='color:green' class='fa fa-check'></span></h3>");
                $('.b2-txt,.b3-txt,.b4-txt,.b5-txt,.b6-txt').fadeIn(300);
                $('.b2,.b3,.b4,.b5').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi,.b5 .status-indi,.b6 .status-indi').css({
                    'background': '#b8efb8'
                })
                break
            case 'Cancel':
                $('.b2,.b3,.b4,.b5,.b6').fadeOut(300);
                $('.b7,.b7-txt').fadeIn(300);
                break
        }
    }
    </script>
</body>

</html>