<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>
    <?php
    require_once 'Model/productModel.php';
    require_once 'Model/orderModel.php';
    require_once 'sections/header.php';
    require_once 'Controller/spacesettingController.php';

    $productMdl = new products();
    $bis_info = new spacesetting();
    $orderMdl = new orderMdl();
    ?>
    <br><br><br>
    <style>
        form {
            background: #ffff;
            padding: 5px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
            width: 70%;
            min-width: 240px;
        }

        #completeOrderCon {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            outline: none;
            border: 1px solid #ddd;
            background-color: navy;
            color: #fff;
            width: 50%;
            min-width: 170px
        }

        tr td {
            padding: 10px 0px;
            border-bottom: 1px solid #5555
        }

        #completeOrderCon span {
            margin-right: 10px
        }

        #completeOrderCon:hover {
            cursor: pointer;
            background-color: blue;
            color: #ddd
        }
    </style>
    <?php
    // print_r($data);exit;
    if (!isset($data['data']['product_detail'])) {
        die('<center><h4><span class="fa fa-chain-broken"></span>&nbsp;&nbsp;Cart list empty, Please add some items !</h4></center>');
    }
    $tot_qnt = 0;
    $net_weight = 0;//init 0g
    foreach ($data['data']['product_detail'] as $item) {
        $tot_qnt += $item['qnty'];
        $net_weight += $item['weight'];
    }
    $services = CC_GLOBAL_SERIVE_KEY;

    if (isset($_GET['cc_service']) && !empty($_GET['cc_service']) && in_array($_GET['cc_service'], $services)) {
        // if ($_GET['cc_service'] == 'pf') {
        //     $cc = COURIER['PROFESSIONAL_CC'];
        // } else 
        if ($_GET['cc_service'] == 'st') {
            $cc = COURIER['ST_CC'];
        } else if ($_GET['cc_service'] == 'dtdc') {
            $cc = COURIER['DTDC'];
        } else if ($_GET['cc_service'] == 'indp') {
            $cc = COURIER['INDIA_POST'];
        }
    } else {
        $cc = COURIER[DEFAULT_COURIER_SERVICE];
    }

    $cc_price_flag = $orderMdl->get_courier_fee($net_weight, $cc);
    if ($cc_price_flag['status']) {
        $cc_price = $cc_price_flag['price'];
    } else {
        die($cc_price_flag['message']);
        exit;
    }
    $total_cost = $cc_price + $data['data']['total_cost'];
    $online_pay_cost = $total_cost * ONLINE_PAYMENT_CHARGE / 100;
    //Hashing amount and quantity
    $amt_hash = hash_hmac('sha256', $data['data']['total_cost'], 'AMT_HASH_9050');

    $qnty_hash = hash_hmac('sha256', $tot_qnt, 'QNT_HASH_9050');

    $transaction_hashes = $amt_hash . '_' . $qnty_hash;

    $info = $bis_info->business_info();
    if (isset($data['data']['product_detail'])) {
        // print_r($data['data']['product_detail']);
        $cartPrdList = $data['data']['product_detail'];
        if (count($cartPrdList) == 0) {
            echo "Please add some products to cart !.";
            exit;
        }
    }
    $pf = $st = $dtdc = $indp = '';
    $cc_uri_pos = strpos($_SERVER['REQUEST_URI'], 'cc_service');
    if ($cc_uri_pos) {
        $params = explode('&', $_SERVER['QUERY_STRING']);
        foreach ($params as $key => $param) {
            if (strpos($param, 'cc_service') !== false) {
                if ($_GET['cc_service'] == 'pf') {
                    $pf = 'selected';
                } else if ($_GET['cc_service'] == 'st') {
                    $st = 'selected';
                } else if ($_GET['cc_service'] == 'dtdc') {
                    $dtdc = 'selected';
                } else if ($_GET['cc_service'] == 'indp') {
                    $indp = 'selected';
                } else {
                    $st = 'selected';
                }
                unset($params[$key]);
            }
        }
        $d = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'] . '?' . implode('&', $params);
        echo "<script>let cc_upt_uri = '$d';</script>";
    } else {
        echo "<script>let cc_upt_uri = '$_SERVER[REQUEST_URI]';</script>";
    }

    ?>
    <center>

        <form id="frm"><br><br>
            <h1>Checkout</h1>
            <table width='100%'>
                <tr>
                    <td style="text-align:left" colspan="2">
                        <?php
                        echo '<u><b><p>Selected items (' . count($cartPrdList) . ')</p></b></u><br>';
                        for ($i = 0; $i < count($cartPrdList); $i++) {
                            $of_price = ($cartPrdList[$i]['price']-($cartPrdList[$i]['price']*$cartPrdList[$i]['offer']/100));
                            echo '<p>' . $cartPrdList[$i]['p_name'].($cartPrdList[$i]['offer']>0?"(".$cartPrdList[$i]['offer']."%)":''). "&nbsp;&nbsp;<span class='fa fa-angle-double-right'></span>&nbsp;&nbsp;" . $cartPrdList[$i]['qnty'] . '&nbsp;&nbsp;x&nbsp;&nbsp' . $of_price . 'rs = ' . ($cartPrdList[$i]['qnty'] * $of_price) . 'rs</p><br>';
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:left">
                        <select name="cc_service" onchange="ch_cc_price(this.value)"
                            style="padding:10px;outline:none;border:none;border:1px solid #555a;cursor:pointer">
                            <option value="pf" <?= $pf ?>>Professonal Courier</option>
                            <option value="st" <?= $st ?>>ST Courier</option>
                            <option value="dtdc" <?= $dtdc ?>>DTDC Courier</option>
                            <option value="indp" <?= $indp ?>>India Post</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="text-align:right">
                        Sub total : <?= $data['data']['total_cost']+$data['data']['off_price'] . 'rs'; ?></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:right">
                        Saving : (-<?= $data['data']['off_price']?>rs)</td>
                </tr>
                <tr>
                    <td style="text-align:right">
                        Courier Price : <?= $cc_price . 'rs'; ?></td>
                </tr>
                <tr>
                    <td style="text-align:right">
                        Online Payment charge (0.5%) : <?= $online_pay_cost . 'rs'; ?></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h3 style="text-align:center">Total Price :
                            <?= (is_numeric($cc_price)) ? round($total_cost + $online_pay_cost) . 'rs' : "TBD"; ?>
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <center>
                            <input type="hidden" name="trans" value="<?= $transaction_hashes ?>">
                            <div id="completeOrderCon" onclick="completeOrder()">
                                <span class="fa fa-lock"></span>
                                <p>Secure Checkout</p>
                             </div>
                        </center>
                    </td>
                </tr>

            </table>
        </form>
    </center>
    <script>
        function completeOrder() {
            $.ajax({
                type: 'POST',
                url: 'index.php?controller=product&key=9139fb9fc1c8a937ed92c4b4550cf57ab5ac7bff859837c41e27a451583a8883',
                data: $('#frm').serialize(),
                dataType: 'json',
                encode: true,
            }).done(function (data) {
                if (data.flag) {
                    let paymentOption = 'netbanking';
                    let orderID = data.order_number;
                    let orderNumber = data.order_number;
                    let options = {
                        "key": data.razorpay_key,
                        "amount": data.userData.amount,
                        "currency": "INR",
                        "name": "Blossomcorner",
                        "description": data.userData.description,
                        "image": "https://blossomcorner.lovestoblog.com/assets/common-images/logo.png",
                        "order_id": data.userData.rpay_order_id,
                        "handler": function (response) {
                            performAjx('index.php', 'get',
                                'controller=payment&key=815348834f2c1ca71dee9ffdc2807bf37b10a3a08cc19b6c67370e488435b227&oid=' + orderID + '&rp_payment_id=' + response.razorpay_payment_id + '&rp_signature=' + response.razorpay_signature, (
                                    res) => {

                                let d = JSON.parse(res)
                                if (d.status) {
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
                        },
                        "modal": {
                            "ondismiss": function () {
                                dis_msg_box('#000', 'tomato', 'Payment cancelled !');
                            }
                        },
                        "prefill": { 
                            "name": data.userData.name,
                            "email": data.userData.email,
                            "contact": data.userData.mobile
                        },
                        "notes": {
                            "address": "Blossomcorner address"
                        },
                        "config": {
                            "display": {
                                "blocks": {
                                    "banks": {
                                        "name": 'Pay using ' + paymentOption,
                                        "instruments": [

                                            {
                                                "method": paymentOption
                                            },
                                        ],
                                    },
                                },
                                "sequence": ['block.banks'],
                                "preferences": {
                                    "show_default_blocks": true,
                                },
                            },
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.on('payment.failed', function (response) {
                        dis_msg_box('#000', 'tomato', response.error.description);
                    });
                    rzp1.open();
                    e.preventDefault();
                } else {
                    dis_msg_box('#000', 'tomato', d.message);
                }

            });
        }

        function ch_cc_price(x) {
            window.open(cc_upt_uri + '&cc_service=' + x, '_self');
        }

    </script>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>