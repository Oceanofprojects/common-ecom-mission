<?php
require_once __DIR__.'/../Model/productModel.php';
$cusObj = new products();
// $_COOKIE['uid']
//print_r($cusObj->getUserId($_COOKIE['uid']));exit;
$userState = $cusObj->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0));
if($userState[0] && $userState[2] == 'customer'){//CUSTOMER VIEW MENU
	$extraLinks = '<li><a href="#"><span class="fa fa-user-circle-o"></span>account</a>
		<ul class="li2">
			<li><a href="index.php?key=168b97a9b1f1442304b12b879f1c9a6d753645ac35944cf51685e43bff059f9e&controller=customer"><span class="fa fa-cog"></span>Settings</a></li>
			<li><a href="#" onclick="logout()"><span class="fa fa-sign-out"></span>Signout</a></li>
		</ul>
	</li>';
}else if($userState[0] && $userState[2] == 'admin'){//ADMIN VIEW MENU
		$extraLinks = '<li><a href="#"><span class="fa fa-user-circle-o"></span>account</a>
			<ul class="li2">
            <li><a href="#"><span class="fa fa-th"></span>Product</a>
						<ul class="li3">
			            <li><a href="index.php?controller=product&key=758e3a91787e546aa5b33c54525273df699d92ce4fc7e1ffeee2a2f2cd409d31"><span class="fa fa-plus"></span>Add</a></li>
									<li><a href="index.php?key=38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9&controller=product"><span class="fa fa-edit"></span>Edit</a></li>
						</ul></li>

						<li><a href="#"><span class="fa fa-list"></span>Category</a>
						<ul class="li3">
			            <li><a href="index.php?key=cd5d521c96350ad79730bc4d02e77d0af6eb8c1f33eaee0458678f1f76d29d3d&controller=product"><span class="fa fa-plus"></span>Add</a></li>
									<li><a href="index.php?key=b69927d5ea68bd565050864957490ba4025cf4a90a69780be9db9a25cba12b8d&controller=product"><span class="fa fa-edit"></span>Edit</a></li>
						</ul></li>



<li><a href="index.php?key=6c5bce7dca7b1d43b37e1bb86a016ee0307342ea1bb4a75c87111f6ed090ee68&controller=admin"><span class="fa fa-users"></span>Customers</a></li>
                        <li><a href="index.php?key=f688a5ac3f3f4edbd7172d430360ad7c7a5f4a968e2f50774b911592ffd6592c&controller=admin"><span class="fa fa-check"></span>P-Status</a></li>
						<li><a href="index.php?key=168b97a9b1f1442304b12b879f1c9a6d753645ac35944cf51685e43bff059f9e&controller=customer"><span class="fa fa-cog"></span>Settings</a></li>
					<li><a href="#" onclick="logout()"><span class="fa fa-sign-out"></span>Signout</a></li>

			</ul>
		</li>';
}else{
  $extraLinks = '<li><a href="index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home"><span class="fa fa-sign-in"></span>login</a></li>';
}
?>

<style type="text/css">
.header_con {
    position: sticky;
    top: 0px;
    left: 0px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10px;
    box-shadow: 0px 2px 2px 0px rgba(0, 0, 0, .3);
    z-index: 10;
    background: #fff;
    backdrop-filter: blur(1px);
}

.logo_layer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#menu_icon {
    display: none;
    font-size: 18pt;
}

#logo {
    height: 50px;
    width: 50px;
    border-radius: 50px;
    border:1px solid rgba(0,0,0,.1);
}

.menu {
    width: 90%;
    display: flex;
    justify-content: flex-end;
    align-items: center;
}

.menu li {
    list-style: none;
    padding: 0px 5px;
    margin: 0px 5px;
    transition: .3s;
    border:.1px solid transparent;
}


.menu li span {
    padding: 2px;
    margin: 5px;
    height: 20px;
    width: 20px;
    border-radius: 2px;
    font-size: 11pt;
    display: flex;
    justify-content: center;
    align-items: center;
}

.menu li a {
    text-decoration: none;
    font-size: 11pt;
    color: #123;
    text-transform: capitalize;
    display: flex;
    justify-content: flex-start;
    align-items: center;
}

.menu li small {
    padding: 10px;
    transition: .3s;
}

.menu .li1 li {
    position: relative;
    top: 0px;
    left: 0px;
    float: left;
}


.menu .li2 li {
    float: none;
    z-index: 1;
    margin-top: 10px;
}

.menu li:hover {
    cursor: pointer;
    border-radius: 5px;
    border-color:#ddd;

}

.menu li:hover>a small {
    transform: rotate(45.5deg);
}

.menu li:hover>a {
    color: #000;
}

.menu li:hover>a span {
    border-radius: 50px;
    color: navy;
}

.menu .li1 li:hover>ul {
    display: block;
}

.menu .li2 li:hover>ul {
    display: block;
}

.menu .li2 {
    position: absolute;
    top: 33px;
    left: -25px;
    display: none;
    border-radius: 5px;
    background:#fff;
    border: .2px solid rgba(0, 0, 0, .1);
}


.menu .li3 {
    border: .1px solid #ddda;
    position: absolute;
    top: -10px;
    right: 120px;
    display: none;
    background: #fff;
    border-radius: 5px;
}


.menu .active {
    border-radius: 5px;
}

.menu .active:hover>a {
    color: var(--spl_color);
}

.init {
    text-align: right;
    padding: 0px 20px;
    background: var(--df_bl_color);
    backdrop-filter: blur(10px);
    display: flex;
    justify-content: space-between;
    align-items: center;

}

.init ul {
    display: flex;
    justify-content: space-between;
    align-items: center;
}


/*.init a{
//	background:navy;
}
	.init a small{
		padding:0px 5px;
		font-size:10pt;
	}*/
.init li {
    list-style: none;
}

.init a {
    font-size: 13pt;
    text-decoration: none;
    padding: 7px 9px;
    cursor: pointer;
    color: var(--df_wt_color1);
    text-decoration: none;
}

.init a:hover {
    color: red;
    cursor: pointer;
}

.whtup-contactus {
    position: fixed;
    left: 0px;
    bottom: 0px;
    margin: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-direction: column;
    z-index: 5;
}


.whtup-contactus a {
    margin: 3px;
    padding: 8px 10px;
    text-decoration: none;
    color: #fff;
    background: rgba(0, 0, 0, .8);
    border: .2px solid #ddd;
    border-radius: 3px;
    font-size: 1em;
}

.search_layer {
    background: transparent;
    position: fixed;
    top: -100%;
    left: 0px;
    width: 100%;
    height:100vh;
    background:rgba(0,0,0,.8);
    z-index: 12;
    transition: .3s;
}

.search_box {
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .5);
    background: #fff;
    width: 50%;
    border: 1px solid rgba(0, 0, 0, .3);
    border-radius: 5px;
}

.search_box input {
    background: transparent;
    padding: 15px 0px;
    width: 90%;
    border: none;
    outline: none;
    letter-spacing: 1px;
    z-index: 1;
}

.cartBag {
    position: relative;
    top: 0px;
    left: 0px;
}

.cartBag span {
    position: absolute;
    top: -10px;
    left: 20px;
    font-size: 8pt;
    background: transparent;
    padding: 5px;
    border-radius: 25px;
}

.loader {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100vh;
    background: #fff;
    z-index: 100;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column
}

@media only screen and (max-width: 1150px) {
    .header_con {
        flex-direction: column;
    }

    #menu_icon {
        display: flex;
    }

    .logo_layer {
        width: 90%;
    }

    .menu {
        justify-content: center;
    }

    .menu .li1 {
        width: 50%;
        display: none;
    }

    .menu .li1 li {
        position: relative;
        top: 0px;
        left: 0px;
        float: none;
    }

    .menu .li2,
    .menu .li3 {
        position: relative;
        width: 90%;
        padding: 0px;
        left: 0px;
        top: 0px;
    }

}

@media only screen and (max-width: 550px) {
    .search_box {
        width: 90%;
    }

    .menu {
        width: 95%;
    }

    .menu .li1,
    .menu .li2,
    .menu .li3 {
        width: 100%;
    }

    .init span {
        /*hiding all span in init class*/
        display: none;
    }

    #mode {
        /*unhide span in init class*/
        display: block;
    }
}

@media only screen and (max-width: 450px) {

    .menu .li2 li a,
    .menu .li3 li a {
        font-size: 8pt;
    }

    .init a small {
        display: none;
    }
}

@media only screen and (max-width: 400px) {}
</style>

<!-- 		<div class="init" style="color:#555;">
			<div id="i_cons">
				<ul>
					<li><a href="#" class="fa fa-envelope" title="Mail" style="background:linear-gradient(red,darkred);color:#fff;"></a></li>
				<li><a href="#" target="blank" class="fa fa-instagram" style="background:linear-gradient(#feda75,#fa7e1e,#d62976,#962fbf,#4f5bd5);color:#fff;"></a></li>
				<li><a href="#" target="blank" class="fa fa-facebook" style="background:linear-gradient(#3b5998,#3b5998);color:#fff"></a></li>
			<li><a href="#" class="fa fa-whatsapp" title="Whatsapp" style="background:linear-gradient(#075E54,#075E54);color:#fff;"></a></li>
		</ul>
			</div>
		</div> -->

<script src="https://cdn.lordicon.com/lordicon-1.2.0.js"></script>
<div class="loader">
    <lord-icon src="https://cdn.lordicon.com/odavpkmb.json" trigger="loop" delay="500"
        colors="primary:#121331,secondary:#913710" style="width:100px;height:100px">
    </lord-icon>
    <p><b>Please wait</b></p>
</div>
<!-- Common message box  -->
<div id="common_dis_msg_box">
    <div id="msg_content_to_display"></div>
</div>
<!-- Common message box  -->
<header class="header_con">
    <div class="logo_layer">
        <a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6">
            <img src="assets/common-images/logo.png" id="logo">
        </a>
        <h3 class="fa fa-bars" style="color:#555" id="menu_icon" onclick="menu()"></h3>
    </div>
    <nav class="menu">
        <ul class="li1">
            <li><a
                    href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"><span
                        class="fa fa-home"></span>home</a></li>
            <li onclick="op_search()"><a href="#"><span class="fa fa-search"></span>Search</a></li>
            <li onclick="dis_my_fav()"><a href="#"><span class="fa fa-heart-o"></span>Wishlist</a></li>
            <li onclick="dis_my_cart()"><a href="#"><span class="fa fa-shopping-cart cartBag"></span>cart</a></li>
<li><a href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product"><span class="fa fa-truck"></span>Track</a></li>
            <?php echo $extraLinks;?>
        </ul>
    </nav>
</header>
<div class="whtup-contactus">
    <a href="#" onclick="dis_my_cart()" style="background:cornflowerblue;" class="fa fa-shopping-bag cartBag">
        <span class="cartIndi"></span></a>

    <a href="https://api.whatsapp.com/send?phone=+91xxxxxx&text=msg" class="fa fa-whatsapp"></a>

    <a href="https://api.whatsapp.com/send?phone=+91xxxxxx&text=msg" class="fa fa-instagram"></a>

    <a href="https://api.whatsapp.com/send?phone=+91xxxxxx&text=msg" class="fa fa-facebook-official"></a>

</div>

<script type="text/javascript">
var temp_menu = 0;

function menu() {
    if (temp_menu % 2 == 0) {
        $('#menu_icon').removeClass();
        $('#menu_icon').attr('class', 'fa fa-close');
        $('.menu .li1').fadeIn(300)
    } else {
        $('#menu_icon').removeClass();
        $('#menu_icon').attr('class', 'fa fa-bars');
        $('.menu .li1').hide()
    }
    temp_menu++;
}
</script>

<div class="myfav">
    <h4 style="text-align:right;background:red;padding:10px;margin:10px;color:#fff" class="fa fa-close"
        onclick="cls_my_fav()"></h4>
    <h1 align="center">My Wishlist</h1>
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
        <!-- <input style="margin:10px;padding:5px" type="date" id="cart_filter" value="<?php echo date('Y-m-d');?>"
            onchange="dis_my_cart('cart_date_filter')">
        <select style="margin:10px;padding:5px" id="cart_type" onchange="dis_my_cart('cart_type_filter')">
            <option value="current">Current Cart list</option>
            <option value="ordered">Ordered Cart list</option>
        </select> -->
        <button class="btn fa fa-shopping-cart" onclick="cls_my_cart()">&nbsp;Continue Shopping</button>
    </div>

    <br>
    <center>
        <table id="mycarttbl">
        </table>
    </center>
    <br><br><br>


</div>


<div class="search_layer">
    <center>
        <div class="search_box"><input type="search" id="search_product" list="" placeholder="Search here"><span
                class="fa fa-search" onclick="searchProduct('detailProduct','search_product')"
                style="color:#555a;cursor:pointer;background:cornflowerblue;padding:8px;border-radius:5px;"></span></div>
        <br>
        <span class="fa fa-close"
            style="padding:20px;background:tomato;border-radius: 100%;color:#000;cursor:pointer;border:1px solid #555a;box-shadow:0px 0px 10px 0px rgba(0, 0, 0, .5);"
            onclick="op_search()"></span>
    </center>
</div>
<center>
    <section class="dis_search_result">
        <div style="display:flex;justify-content:flex-end;align-items:center">
            <h4 style="text-align:right;cursor:pointer;background:red;padding:10px;margin:10px;color:#fff"
                class="fa fa-close" onclick="cls_search_result()"></h4>
        </div>
        <br><br><br>
        <h3 id="result_res_indi"></h3>
        <br>
        <h4 id="result_res_msg"></h4>
        <br>
        <div class="result">
            <ul id="result_list">
            </ul>
        </div>
    </section>
</center>