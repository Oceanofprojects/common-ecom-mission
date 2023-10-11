<?php
require_once __DIR__.'/../Model/productModel.php';
$cusObj = new products();
// $_COOKIE['uid']
if($cusObj->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0))[0]){
//  $extraLinks = '<li class="fa fa-heart-o"><a href="#" onclick="dis_my_fav()">My fav</a></li>
  //<li class="fa fa-shopping-cart"><a href="#" onclick="dis_my_cart()">Cart</a></li><li class="fa fa-user-circle"><a href="#">Account<ul class="sub-menu"><li class="fa fa-cog"><a href="#">Settings</a></li></ul></a></li>';
//ADD PRODUCT	index.php?controller=product&key=758e3a91787e546aa5b33c54525273df699d92ce4fc7e1ffeee2a2f2cd409d31
	$extraLinks = '<li><a href="#"><span class="fa fa-user-circle-o"></span>account</a>
		<ul class="li2">
			<li><a href="#"><span class="fa fa-cloud"></span>Cpanel</a></li>
			<li><a href="#"><span class="fa fa-cog"></span>Settings</a></li>
			<li><a href="#"><span class="fa fa-sign-out"></span>logout</a></li>
		</ul>
	</li>';
}else{
  $extraLinks = '<li><a href="#"><span class="fa fa-sign-in"></span>login</a></li>';
}
?>

	<style type="text/css">

				.header_con{
			position: sticky;
			top: 0px;
			left: 0px;
			display: flex;
			justify-content:space-between;
			align-items: center;
			padding:20px 10px;
			box-shadow:0px 2px 2px 0px rgba(0,0,0,.3);
			z-index: 10;
			background:#fff;
			backdrop-filter:blur(1px);
		}
		.logo_layer{
			display: flex;
			justify-content:space-between;
			align-items: center;
		}
		#menu_icon{
			display: none;
			font-size:18pt;
		}
		#logo{
			height: 30px;
		}
		.menu{
			width: 90%;
						display: flex;
			justify-content:flex-end;
		align-items: center;
		}

		.menu li{
			list-style: none;
			padding:0px 5px;
			margin: 0px 5px;
			transition: .3s;
		}


		.menu li span{
			padding:2px;
			margin:5px;
			height:20px;width:20px;
			border-radius: 2px;
			font-size: 10pt;
				display: flex;
			justify-content:center;
			align-items: center;
		}
		.menu li a{
			text-decoration: none;
			font-size:10pt;
			color:#123;
			text-transform: capitalize;
			display: flex;
			justify-content:flex-start;
			align-items: center;
		}
		.menu li small{
			padding:10px;
			transition: .3s;
		}

		.menu .li1 li{
			position: relative;
			top: 0px;
			left: 0px;
			float:left;
		}
		.menu .li2{
			border:.2px solid rgba(0,0,0,.1);
		}
		.menu .li2 li{
			float: none;
			z-index: 1;
			margin-top:10px;
			left:0px;
		}
		.menu li:hover{
			cursor: pointer;
			border-radius:5px;
		}
		.menu li:hover > a small{
			transform:rotate(45.5deg);
		}
		.menu li:hover>a{
			color:#000;
		}
		.menu li:hover > a span{
			border-radius: 50px;
			color:navy;
}

		.menu .li1 li:hover > ul{
			display: block;
		}
		.menu .li2 li:hover > ul{
			display: block;
		}

		.menu .li2{
//			width:150px;
			position: absolute;
			top:33px;
			left:0px;
			display: none;
			border-radius:5px;
			background:#fff;
		}


		.menu .li3{
			width:100%;
			position: absolute;
			top:-10px;
			left:-280px;
			display: none;
			background:#fff;
			border-radius:5px;
}

		.menu .active{
			border-radius:5px;
		}
		.menu .active:hover > a{
			color:var(--spl_color);
		}

.init{
	text-align: right;
	padding:0px 20px;
				background:var(--df_bl_color);
			backdrop-filter:blur(10px);
				display: flex;
	justify-content:space-between;
	align-items: center;

}
.init ul{
		display: flex;
	justify-content:space-between;
	align-items: center;
}


/*.init a{
//	background:navy;
}
	.init a small{
		padding:0px 5px;
		font-size:10pt;
	}*/
	.init li{
		list-style: none;
	}
.init a{
	font-size: 13pt;
		text-decoration: none;
	padding:7px 9px;
	cursor: pointer;
	color:var(--df_wt_color1);
	text-decoration: none;
}
.init a:hover{
	color:red;
	cursor: pointer;
}

.whtup-contactus{
	position:fixed;
	left:0px;
	bottom:0px;
	height:40px;
	width:40px;
	margin:15px;
	background:#25D366;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius:5px;
	animation:u-d 2s linear infinite;
	z-index: 5;
}
@keyframes u-d{
	0%{
		transform:translateY(0px);
	}
	25%{
		transform:translateY(-5px);
	}
	50%{
		transform:translateY(0px);
	}
	75%{
		transform:translateY(5px);
	}
	100%{
		transform:translateY(0px);
	}
}
.whtup-contactus a{
	text-decoration: none;
	color:#fff;
	font-size:1.5em;
}

.search_layer{
  background:transparent;
  position:fixed;
  top:-100%;
  left:0px;
  width:100%;
  z-index:12;
  transition:.3s;
}
.search_box{
  box-shadow:0px 0px 10px 0px rgba(0, 0, 0, .5);
  background:#fff;
  width:50%;
  border:1px solid rgba(0, 0, 0, .3);
  border-radius: 5px;
}
.search_box input{
  background: transparent;
  padding:15px 0px;
  width:90%;
  border: none;
  outline: none;
  letter-spacing:1px;
  z-index: 1;
}

@media only screen and (max-width: 1150px){
	.header_con{
		flex-direction: column;
	}
	#menu_icon{
		display: flex;
	}
	.logo_layer{
		width:90%;
	}
.menu{
	justify-content:center;
}
.menu .li1{
	width: 50%;
	display: none;
}
		.menu .li1 li{
			position: relative;
			top: 0px;
			left: 0px;
			float:none;
		}
		.menu .li2,.menu .li3{
			position: relative;
			width:90%;
			padding: 0px;
			left: 0px;
			top:0px;
		}

}
@media only screen and (max-width: 550px){
	.search_box{
		width:90%;
	}
	.menu{
		width:95%;
	}
.menu .li1,.menu .li2,.menu .li3{
	width:100%;
}
.init span{
	/*hiding all span in init class*/
	display: none;
}
#mode{
	/*unhide span in init class*/
	display: block;
}
}

@media only screen and (max-width: 450px){
.menu .li2 li a,.menu .li3 li a{
	font-size:8pt;
}
	.init a small{
		display: none;
	}
}
@media only screen and (max-width: 400px){

}
}
	</style>

		<div class="init" style="color:#555;">
			<div id="i_cons">
				<!-- <span class="fa fa-moon-o" id="mode" onclick="ch_mode()"></span> -->
				<ul>
					<li><a href="#" class="fa fa-envelope" title="Mail" style="background:linear-gradient(red,darkred);color:#fff;"></a></li>
				<li><a href="#" target="blank" class="fa fa-instagram" style="background:linear-gradient(#feda75,#fa7e1e,#d62976,#962fbf,#4f5bd5);color:#fff;"></a></li>
				<li><a href="#" target="blank" class="fa fa-facebook" style="background:linear-gradient(#3b5998,#3b5998);color:#fff"></a></li>
			<li><a href="#" class="fa fa-whatsapp" title="Whatsapp" style="background:linear-gradient(#075E54,#075E54);color:#fff;"></a></li>
		</ul>
			<!-- 	<span class="fa fa-envelope"></span>
				<span class="fa fa-whatsapp"></span>
				<span class="fa fa-facebook-official"></span>
				<span class="fa fa-instagram"></span> -->

			</div>
		</div>
<header class="header_con">
	<div class="logo_layer">
		<a href="index.php?controller=product&key=758e3a91787e546aa5b33c54525273df699d92ce4fc7e1ffeee2a2f2cd409d31">
		<img src="assets/common-images/logo.png" id="logo">
	</a>
		<h3 class="fa fa-bars" style="color:#555" id="menu_icon" onclick="menu()"></h3>
	</div>
	<nav class="menu">
		<ul class="li1">
			<li><a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"><span class="fa fa-home"></span>home</a></li>
			<li onclick="op_search()"><a href="#"><span class="fa fa-search"></span>Search</a></li>
			<li onclick="dis_my_fav()"><a href="#"><span class="fa fa-heart-o"></span>my fav</a></li>
			<li onclick="dis_my_cart()"><a href="#"><span class="fa fa-shopping-cart"></span>cart</a></li>
			<li><a href="#"><span class="fa fa-percent"></span>offer</a></li>
			<li><a href="#"><span class="fa fa-question-circle"></span>FAQ</a></li>
			<li><a href="#"><span class="fa fa-comments"></span>contact</a></li>
			<?php echo $extraLinks;?>
		</ul>
	</nav>
</header>
<div class="whtup-contactus">
	<a href="https://api.whatsapp.com/send?phone=+91xxxxxx&text=msg" class="fa fa-whatsapp"></a>
</div>

<script type="text/javascript">
	var temp_menu=0;
	function menu() {
			if(temp_menu%2==0){
				$('#menu_icon').removeClass();
				$('#menu_icon').attr('class','fa fa-close');
				$('.menu .li1').fadeIn(300)
			}
			else{
				$('#menu_icon').removeClass();
				$('#menu_icon').attr('class','fa fa-bars');
				$('.menu .li1').hide()
			}
			temp_menu++;
	}
</script>
<!-- Common message box  -->
<div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
<!-- Common message box  -->
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


		<div class="search_layer">
			<center>
			<div class="search_box"><input type="search" id="search_product" list="" placeholder="Search here"><span class="fa fa-search"  onclick="search_product()" style="color:#555a;cursor:pointer"></span></div>
			<br>
			<span class="fa fa-close" style="padding:20px;background:#fff;border-radius: 100%;color:#000;cursor:pointer;border:1px solid #555a;box-shadow:0px 0px 10px 0px rgba(0, 0, 0, .5);" onclick="op_search()"></span>
		</center>
		</div>
