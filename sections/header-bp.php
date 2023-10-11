<style>
.menu {
    /* position: sticky;
    top: 0px;
    left: 0px; */
    display: flex;
    justify-content: space-around;
    align-items: center;
    background: #fff;
    padding: 15px 5px;
    box-shadow: 10px 0px 10px 1px rgba(0, 0, 0, .2);
    z-index:50
}

.menu img {
    width: 50px
}

.menu ul {
    display: flex;
    justify-content: space-evenly;
    align-items: center;
}

.menu li {
  position: relative;
  top:0px;left;0px;
    list-style: none;
    margin:0px 10px;
    font-size:13px
}

.menu li a {
    text-decoration: none;
    color: #000;
    padding: 0px 5px;
    font-size: 11pt
}

.menu li a:hover {
    color: navy
}

#menu_icon {
    display: none
}
.sub-menu li{
  text-align: left;
  font-size:13px;
  padding:5px;
  background:#ddd
}
.sub-menu li a{
  text-align: left;
  padding:0px 3px
}
#menu li a .sub-menu{
  position:absolute;
  top:20px;left:-25px;
  padding:0px;
  margin:0px;
  display: none;
}


</style>
<?php
require_once __DIR__.'/../Model/productModel.php';
$cusObj = new products();

if($cusObj->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0))[0]){
  $extraLinks = '<li class="fa fa-heart-o"><a href="#" onclick="dis_my_fav()">My fav</a></li>
  <li class="fa fa-shopping-cart"><a href="#" onclick="dis_my_cart()">Cart</a></li><li class="fa fa-user-circle"><a href="#">Account<ul class="sub-menu"><li class="fa fa-cog"><a href="#">Settings</a></li></ul></a></li>';
}else{
  $extraLinks = '<li><a href="#" class="fa fa-sign-in">Login</a></li>';
}



?>
<!-- Common message box  -->
<div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
<!-- Common message box  -->

<header class="menu">
    <div>
        <a href="index.php?controller=product&key=758e3a91787e546aa5b33c54525273df699d92ce4fc7e1ffeee2a2f2cd409d31"><img src="assets/common-images/logo.png" alt="Logo"></a>
        <span id="menu_icon">X</span>
    </div>
    <nav>
        <ul>
            <li class="fa fa-home"><a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6">Home</a></li>
            <li class="fa fa-search"><a href="#">Search</a></li>
            <li class="fa fa-percent"><a href="#">Offer</a></li>
            <?php echo $extraLinks;?>
        </ul>
    </nav>
</header>

<div class="myfav">
    <h4 style="text-align:right;background:red;padding:10px;margin:10px;color:#fff" class="fa fa-close"
        onclick="cls_my_fav()"></h4>
    <h1 align="center">MY FAV</h1>
    <br>

    <br>
    <center>
        <table id="myfavtbl" style="text-align:center">
        </table>
    </center>
    <br><br><br>
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
