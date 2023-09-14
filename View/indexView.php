<html>

<head>
    <title><?php echo $data['title'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="script/commonScript.js"></script>
    <script src="script/jquery.min.js"></script>
    <script src="script/action.js"></script>
    <script src="script/components.js"></script>
    <link rel="stylesheet" href="style/global.css">

</head>
<?php
if(isset($_COOKIE['uid'])){
//  print_r($_COOKIE);
}else{
  setcookie('uid',3802279867,time() + (86400 * 30),"/");
}
?>

<body>
    <?php
    require_once __DIR__.'/../sections/header.php';
    ?>
    <style>

    </style>
    <div id="common_dis_msg_box">
    		<div id="msg_content_to_display"></div>
    	</div>
    <br><br><br>
    <div class="item-container">
      <?php
      if(count($data['data'])!==0){
        echo "<script>loadComponent('nor-card-view',".json_encode($data['data']).")</script>";
      }else{
        echo "ZERO";
      }
      ?>
    </div>

    <div class="mycart">
        <h4 style="text-align:right;background:red;padding:10px;margin:10px;color:#fff" class="fa fa-close"
            onclick="cls_my_cart()"></h4>
        <h1 align="center">MY CART</h1>
        <br>
        <div style="display:flex;justify-content:space-around;align-items: center;">
            <button class="btn fa fa-shopping-cart" onclick="cls_my_cart()">&nbsp;Continue Shopping</button>
            <button id="checkout" class="btn fa fa-check-circle" onclick="checkout()">&nbsp;Check out</button>
        </div>
        <input style="margin:10px;padding:5px" type="date" id="cart_filter" value="<?php echo date('Y-m-d');?>"
            onchange="dis_my_cart('cart_filter')">
        <br>
        <center>
            <table id="mycarttbl">
            </table>
        </center>
        <br><br><br>
    </div>
</body>
<?php
//    require_once 'sections/suggestionProducts.php';
echo hash_hmac('sha256','removefrommycart',9050);
?>


<script>
//get_all();

</script>


</html>
