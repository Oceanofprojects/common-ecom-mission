<!DOCTYPE html>
<html lang="en" dir="ltr">

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

</head>

<body>
    <?php
    require_once 'sections/header.php';
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
        
        if(count($data['data']) ==0){
          echo "Please some products to cart !.";exit;
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
                        <small>&nbsp;Please check selected item.</small><br><br>
                        <label>Selected items : <b><?php echo count($data['data']);?></label></b><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="background:navy;color:#ddd;padding:5px;">Step 2</label>
                        <small>&nbsp;Scan G-pay QR to pay money (<b>#notes:TBD condition</b>)</small><br><br>
                        <a href="assets/common-images/gpay_qr.jpeg" target="blank"><img
                                src="assets/common-images/gpay_qr.jpeg" alt="" style="width:230px;"></a><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label style="background:navy;color:#ddd;padding:5px;">Step 3</label>
                        <small>&nbsp;After success payment take a screenshot upload the image proof and track your order
                            status <a
                                href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product"
                                class="fa fa-truck">&nbsp;Track
                                order</a> </small><br><br>
                        <label>Payment proof : </label><input class="file" type="file" id="file1" name="file1">
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <br><br>
                        <input type="button" class="btn" value="Complete order" style="background:cornflowerblue;"
                            onclick="completeOrder()" id="completeOrder">
                    </td>
                </tr>

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
                        $('#frm')[0].reset();
                        $('#completeOrder').hide();
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
    require_once 'sections/footer.php';
    ?>
</body>

</html>