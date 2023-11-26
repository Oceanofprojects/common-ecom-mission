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
    <?php
    require_once 'sections/msg_bot.php';
    ?>
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

    #invoice {
        display: none
    }

    #product_list,
    #cancel_product_list {
        width: 95%;
    }

    #product_list li,
    #cancel_product_list li {
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
                    <select id="myOrderId" onchange="getOrderStatusDetail(this.value)"
                        style="padding:10px;border:.2px solid #ddd;border-radius: 5px;">
                        <?php
          if(count($data['data']['data']) !== 0){
            echo "<option value=''>Select order ID</option>";
            for($i=0;$i<count($data['data']['data']);$i++){
              echo "<option id='".$data['data']['data'][$i]['id']."' value='".$data['data']['data'][$i]['id']."'>".$data['data']['data'][$i]['id'].', #'.$data['data']['data'][$i]['date']."</option>";
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
                    </ul><br>

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
                    <a href="#" id="invoice" class="btn"
                        style="width:80%;background:darkred;text-decoration:none;color:#fff;">Invoice
                        Bill</a>
                    <br>
                </div>
            </div>
            <div class="status-box b4">
                <div class="status-indi"><span class="fa fa-home"></span></div>
                <div class="b-txt b4-txt">

                    <br>
                    <h3>Order Arriving</h3>
                    <br>
                    <div id="arriveDetail">

                    </div>
                    <br><br>
                </div>
            </div>

            <!-- <div class="status-box b5">
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
            </div> -->

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
                    <p>Your order cancelled by shop owner/Admin. If any queries? Please contact them !</p>
                    <ul id="cancel_product_list">
                    </ul><br>
                    <br>
                </div>
            </div>



            <br><br>
        </section>
        <br><br><br>
    </center>
    <script>
    // a = ['Pending', 'Confirmed', 'Arriving', 'Complete', 'Success', 'Cancel'];
    // v = a[0];
    // //    loadOrderTracks(v);

    function loadOrderTracks(status) {
        switch (status) {
            case 'Pending':
                $('.b7,.b7-txt').fadeOut();
                $('.b2-txt').fadeIn(300);
                $('.b2 .status-indi').css({
                    'background': '#b8efb8'
                })
                break;
            case 'Confirmed':
                $('.b7,.b7-txt').fadeOut();

                $('.b2-txt,.b3-txt').fadeIn(300);
                $('.b2').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi').css({
                    'background': '#b8efb8'
                })
                break;
            case 'Arriving':
                $('.b7,.b7-txt').fadeOut();
                $('#com-btn').show();
                $('.b2-txt,.b3-txt,.b4-txt').fadeIn(300);
                $('.b2,.b3').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi').css({
                    'background': '#b8efb8'
                })
                break;
            case 'Completed':
                $('.b7,.b7-txt').fadeOut();
                $('.b2-txt,.b3-txt,.b4-txt,.b6-txt').fadeIn(300);
                $('.b2,.b3,.b4').css({
                    'border-left-color': '#b8efb8'
                })
                $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi,.b6 .status-indi').css({
                    'background': '#b8efb8'
                })
                break;
            case 'Cancel':
                $('.b2-txt,.b3-txt,.b4-txt,.b6-txt').fadeOut(300);
                //                $('.b2,.b3,.b4,.b5,.b6').fadeOut();
                $('.b7,.b7-txt').fadeIn();
                break;
        }
    }

    function getOrderStatusDetail(track_id) {
        performAjx('index.php', 'get',
            'controller=product&key=c46a069acd5f048c0dffce98a5462802e4c49d3bef8c7a7d6e1205e5cf76c540&order_id=' +
            track_id, (res) => {
                d = JSON.parse(res);
                if (d.status) {
                    list = JSON.parse(d.data[0].list);
                    $('#product_list,#cancel_product_list').empty();
                    for (i = 0; i < list.length; i++) {
                        //                        t = t + list[i].p_name
                        $('#product_list,#cancel_product_list').append('<li>' + list[i].p_name + '</li>');
                    }
                    $('.b2,.b3,.b4,.b5').css({
                        'border-left-color': '#ddd'
                    })
                    $('.b2-txt,.b3-txt,.b4-txt,.b5-txt,.b6-txt').fadeOut();
                    $('.b2 .status-indi,.b3 .status-indi,.b4 .status-indi,.b5 .status-indi,.b6 .status-indi').css({
                        'background': '#ddd'
                    });
                    s_data = d.data[0].status.split(',');
                    status = s_data[0];
                    if (status == 'Confirmed') {
                        $('#invoice').css('display', 'block');
                        $('#invoice').attr('href', 'Invoice?invoice_id=' + d.data[0].id);

                    } else if (status == 'Arriving') {
                        $('#invoice').css('display', 'block');
                        $('#invoice').attr('href', 'Invoice?invoice_id=' + d.data[0].id);

                        $('#arriveDetail').html(
                            '<p>Your order shipped from hub/shop. Order arrived on <b>' + ((s_data[1] ==
                                'null') ?
                                'TBD' : s_data[1]) +
                            '</b></p><button class="btn" onclick="completeOrder(\'' +
                            d.data[0].id + '\')">Product delivered</button>');
                    } else if (status == 'Completed') {
                        $('#invoice').css('display', 'none');
                        $('#arriveDetail').html(
                            '<p>Your order shipped from hub/shop. Order delivered.</p>');
                    }
                    loadOrderTracks(status)
                } else {
                    alert(d.message)
                }
            });
    }

    function completeOrder(t_id) {
        if (confirm("If you got your Product? Please click 'OK'") == true) {
            performAjx('index.php', 'get',
                'controller=product&key=7af0ea1502227acb713e04103478aa0c4055629c3dddf6d43049daa858a45efa&t_id=' +
                t_id, (res) => {
                    d = JSON.parse(res);
                    if (d.status) {
                        dis_msg_box('#000', 'lightgreen', d.message);
                        $('#arriveDetail').html(
                            '<p>Your order shipped from hub/shop. Order delivered.</p>');
                        loadOrderTracks(d.t_status)
                    } else {
                        dis_msg_box('#000', 'tomato', d.message);
                    }
                });
        }
    }
    </script>
     <?php
    require_once __DIR__.'/../../sections/footer.php';

    ?>
</body>

</html>