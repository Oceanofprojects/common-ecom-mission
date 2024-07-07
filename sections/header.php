<?php
require_once __DIR__.'/../Model/productModel.php';
require_once __DIR__.'/../Controller/spacesettingController.php';
$cusObj = new products();
$bis_info = new spacesetting();
$info = $bis_info->business_info();
$userState = $cusObj->getUserId((isset($_COOKIE['uid'])?$_COOKIE['uid']:0));
$account_nav = '<li><span class="nav-link"><span  class="fa fa-cloud"></span><a href="#">Account </a>
                    <span class="fa fa-caret-right"></span></span>
                <ul class="sub_menu_1">
                    <li><span class="nav-link"><span class="fa fa-cog"></span><a href="index.php?key=168b97a9b1f1442304b12b879f1c9a6d753645ac35944cf51685e43bff059f9e&controller=customer">Settings</a></span></li>
                    <li><span class="nav-link"><span class="fa fa-sign-out"></span><a href="#" onclick="logout()">Signout</a></span></li>
                </ul>
                </li>';

if($userState[0] && $userState[2] == 'customer'){//CUSTOMER VIEW MENU
    $extraLinks = $account_nav;
}else if($userState[0] && $userState[2] == 'admin'){//ADMIN VIEW MENU
        $extraLinks = '<li><span class="nav-link"><span class="fa fa-cubes"></span><a href="#">My Store </a>
                    <span class="fa fa-caret-right"></span></span>
                    <ul class="sub_menu_1">
                        <li><span class="nav-link"><span class="fa fa-sitemap"></span> <a href="#">Categories </a><span class="fa fa-caret-right"></span></span>
                            <ul class="sub_menu_2">
                                <li><span class="nav-link"><span class="fa fa-plus"></span><a href="index.php?key=cd5d521c96350ad79730bc4d02e77d0af6eb8c1f33eaee0458678f1f76d29d3d&controller=product">Add</a></span></li>
                                <li><span class="nav-link"><span class="fa fa-wrench"></span><a href="index.php?key=b69927d5ea68bd565050864957490ba4025cf4a90a69780be9db9a25cba12b8d&controller=product">Edit</a></span></li>
                            </ul>
                        </li>
                        <li><span class="nav-link"><span class="fa fa-cube"></span><a href="#">Products </a>
                            <span class="fa fa-caret-right"></span></span>
                            <ul class="sub_menu_2">
                                <li><span class="nav-link"><span class="fa fa-list"></span><a href="index.php?key=4ed65d87253931bd029d4d57a24ceaece22cd710e095f9f343802cdb0de272b0&controller=admin">List</a></span></li>
                                <li><span class="nav-link"><span class="fa fa-plus"></span><a href="index.php?controller=product&key=758e3a91787e546aa5b33c54525273df699d92ce4fc7e1ffeee2a2f2cd409d31">Add</a></span></li>
                                <li><span class="nav-link"><span class="fa fa-wrench"></span><a href="index.php?key=38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9&controller=product">Edit</a></span></li>
                            </ul>
                        </li>
                        <li><span class="nav-link"><span class="fa fa-cube"></span><a href="#">Sub Items</a>
                            <span class="fa fa-caret-right"></span></span>
                            <ul class="sub_menu_2">
                                <li><span class="nav-link"><span class="fa fa-plus"></span><a href="index.php?controller=product&key=8a0f72fd3fcbf1251465c4c08ca83ec220d386abdadda14deea943df38b79d22">Add</a></span></li>
                                <li><span class="nav-link"><span class="fa fa-refresh"></span><a href="index.php?controller=product&key=d02d50e91c94b56391c8a26675321efacaa55b019ea4c4e43a8da6ac3e8336e9">Transfer</a></span></li>
                            </ul>
                        </li>
                        <li><span class="nav-link"><span class="fa fa-users"></span><a href="#">Customers</a>
                            <span class="fa fa-caret-right"></span></span>
                            <ul class="sub_menu_2">
                            <li><span class="nav-link"><span class="fa fa-list"></span><a href="index.php?key=6c5bce7dca7b1d43b37e1bb86a016ee0307342ea1bb4a75c87111f6ed090ee68&controller=admin">List</a></span></li>
                            <!---<li><span class="nav-link"><span class="fa fa-plus"></span><a href="#">Add-beta</a></span></li>
                            <li><span class="nav-link"><span class="fa fa-wrench"></span><a href="#">Edit-beta</a></span></li>--->
                        </ul></li>
                        <li><span class="nav-link"><span class="fa fa-bar-chart-o"></span><a href="index.php?key=f688a5ac3f3f4edbd7172d430360ad7c7a5f4a968e2f50774b911592ffd6592c&controller=admin">Orders</a>
                            <!---<span class="fa fa-caret-right"></span></span>
                            <ul class="sub_menu_2">
                            <li><span class="nav-link"><span class="fa fa-list"></span><a href="index.php?key=f688a5ac3f3f4edbd7172d430360ad7c7a5f4a968e2f50774b911592ffd6592c&controller=admin">List</a></span></li>
                            <li><span class="nav-link"><span class="fa fa-inbox"></span><a href="index.php?controller=admin&key=f76543c3830696dbcdb775d38ebe9b6a763086d2a86be47c449c7b5a55f8d3e9">Request</a></span></li>
                        </ul>--></li>
                        <li><span class="nav-link"><span class="fa fa-upload"></span><a href="#">Bluk upload</a></span></li>
                    </ul>
                </li>'.$account_nav;

}else{
  $extraLinks = '<li><span class="nav-link"><span class="fa fa-sign-in"></span><a href="index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home">Login</a></span></li>';
}
?>

 <style>
        header{
            position:relative;
            top:0px;
            left:0px;
            z-index:10;
            background-color: #fff;
            padding:5px;
            box-shadow:0px 5px 10px 1px rgba(0,0,0,.1);
        }
        nav ul{
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #fff;
            transition: .3s;
        }
        nav ul li{
            position: relative;
            top:0px;left:0px;
            padding:5px  10px;
            background-color:#fff;
            border-bottom:.1px solid rgba(0,0,0,.1);
        }
        .nav-link{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        nav ul li:hover{
            cursor: pointer;
        }

        header nav{
            display: flex;
            justify-content:space-between;
            align-items: center;
        }
        header .top_nav div{
            flex: 1;
        }
        .search{
            background-color: #fff;
            display: flex;
            align-items: center;
            border:.1px solid #555a;
            border-radius: 3px;
            flex: 1;

        }
        .search input{
            border:none;
            outline: none;
            background-color: transparent;
            width:100%;
            padding:10px;
        }
        .search select{
            border:none;
            outline: none;
            border-right:.2px solid #555a;
            background-color: transparent;
            padding: 10px;
            margin:5px 0px;
            display: none;
        }
        .search option{
            background-color:#ddda;
        }

        .search span{
            background-color: transparent;
            padding:15px;
            margin-right:5px

        }
        .search span:hover{
            background-color: rgba(0,0,0,.1);
            cursor: pointer;
        }

         
        header .search{
            flex: 2;
        }
        .icon-layer{
            /* flex: 2; */
            text-align: right;
        }
        .icon-layer a{
            font-size: 15pt;
            text-decoration: none;
            padding:7px;
            color:#000;
            margin:0px 10px;
            border-radius:4px;
        }
        .icon-layer a:hover{
            background-color: rgba(0,0,0,.1);
        }

        .sub_menu_1{
            position: absolute;
            top:40px;
            left:0px;
            display: none;
        }

        .sub_menu_2{
            position: absolute;
            top:0px;
            left:138px;
            display: none;
        }
        li:hover > .sub_menu_1{
            display:block;
        }
        .sub_menu_1 li:hover > .sub_menu_2{
            display: block;
        }
        li:hover{
            background-color:rgba(0,0,0,.1);
        }
        li span{
            color:#111a
        }

        li a{
            color: #555;
            text-decoration: none;
            display: flex;
            justify-content:space-evenly;
            align-items: center;
            width: 100%;
            padding:5px;
        }
        #menu_icon{
            display: none;
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
@media only screen and (max-width:700px){
    .icon-layer i{
        display: none;
    }
    .icon-layer a{
        margin:0px 3px
    }
    .menu{
        position: relative;
        top:0px;left:0px;
        align-items:flex-start;
    }
    header .menu ul{
        width:200px;
        position:absolute;
        top:50px;
        left:-100%;
        align-items: flex-start;
        flex-direction: column;
    }
    header .menu ul li{
        width:100%;
        padding-right:0px;
        padding-left: 0px;
        padding-bottom:0px;
    }
    .nav-link {
        padding:5px;
    }

    header .menu .sub_menu_1,header .menu .sub_menu_2{
        position: relative;
        top:0px;
        left:0px;
    }
    header .menu .sub_menu_1 li:hover{
        background-color:rgba(0,0,0,.2);
    }
    header .menu .sub_menu_2 li:hover{
        background-color:rgba(0,0,0,.1);
    }
    #menu_icon{
        display: block;
        padding:5px;
        position:absolute;
        top:0px;
        right:0px;
        font-size: 15pt;;
        background-color:rgba(0,0,0,.1);
    }
    .menu ul{
        position: relative;
        top:0px;
        left:-265px;
    }
    
}
@media only screen and (max-width:600px){
    header nav:first-child div:last-child{
        display: none;
    }
}
@media only screen and (max-width:500px){
    header nav:first-child{
        flex-direction: column;
    }

}

    </style>
</head>
<body>
    <header>
        <nav class="top_nav">
            <div>
                <a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6">
                    <img height="90px" src="./assets/common-images/logo.png" alt="" style="border-radius:50px;height:60px;width:60px;margin:15px">
                </a>
            </div>
            <div class="search">
                <select name="" id="">
                    <option value="">Category 1</option>
                    <option value="">Category 1</option>
                    <option value="">Category 1</option>
                    <option value="">Category 1</option>
                </select>
                <input type="text" id="search_product" placeholder="Search more then 1000+ products">
                <span class="fa fa-search" onclick="searchProduct('detailProduct','search_product')"></span>
            </div>
            <div class="icon-layer">
                <span style="display: flex;justify-content:flex-end;align-items: center;">
                    <a href="tel:<?=$info['business']['phone']?>" style="padding:5px 10px;border-radius:5px;background-color:lightgreen;"><span class="fa fa-phone"></span><i style="padding-left: 5px; font-size: 13pt;">Contact us</i></a>                    
                </span>
            </div>
        </nav>
        <nav class="menu" style="padding:3px">
            <ul style="border:.1px solid rgba(0,0,0,.1);">
                <li><span class="nav-link"><span class="fa fa-home"></span><a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6">Home</a></span></li>
                <li><span class="nav-link"><span class="fa fa-truck"></span><a href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product">Track</a></span></li>
                <?=$extraLinks?>    
             </ul>

            <span class="fa fa-bars" id="menu_icon"></span>
                                
            <div class="icon-layer">
                <span>
                    <a href="#" onclick="dis_my_fav()" class="fa fa-heart-o"> </a>
                </span>

                <span>
                    <a href="#" class="fa fa-bell-o"></a>
                </span>

                <span>
                    <a href="#" onclick="dis_my_cart()" class="fa fa-shopping-cart  cartBag">  <span class="cartIndi"></span></a>
                </span>
            </div>
        </nav>
    </header>
    <script>
        $('#menu_icon').click(function(){
            menu();
        });
        let menu_loop = 0;
        function menu(){
            if(menu_loop%2==0){
                $('.menu ul').css({
                'left':'0%'
            })
            }else{
                $('.menu ul').css({
                'left':'-100%'
            })
            }
            menu_loop++;
        }

    </script>

<div class="mycart">
    <h4 style="text-align:right;background:red;padding:10px;margin:10px;color:#fff" class="fa fa-close"
        onclick="cls_my_cart()"></h4>
    <h1 align="center">MY CART</h1>
    <br>
    <div style="display:flex;justify-content:space-around;align-items: center;">
        <button class="btn fa fa-shopping-cart" onclick="cls_my_cart()">&nbsp;Continue Shopping</button>
    </div>

    <br>
    <center>
        <table id="mycarttbl">
        </table>
    </center>
    <br><br><br>
</div>

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

<!-- SEARCH RESULT -->
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

<script src="https://cdn.lordicon.com/lordicon-1.2.0.js"></script>
<div class="loader">
    <lord-icon src="https://cdn.lordicon.com/odavpkmb.json" trigger="loop" delay="500"
        colors="primary:#121331,secondary:#913710" style="width:100px;height:100px">
    </lord-icon>
    <p><b>Please wait</b></p>
</div>
<!-- Common message box  -->
 <center>
<div id="common_dis_msg_box">
    <!-- <div class="msg_content_to_display">
    </div> -->
</div>
</center>
