<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/commonScript.js"></script>
    <script src="script/action.js"></script>
    <link rel="stylesheet" href="style/global.css">
</head>

<body>
    <script>
    get_all();
    </script>
    <header class="menu">
        <div>
            <img src="" alt="asasas">
            <span id="menu_icon">X</span>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Search</a></li>
                <li><a href="#">Home</a></li>
                <li><a href="#">Offer</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </nav>
    </header>
    <br><br><br>
    <div class="item-container">
        <div class="box">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h6 class="fa fa-share-alt" style="color:#555" onclick="add_fav('3QC469','1234')"></h6>
                <h6 class="fa fa-heart-o" onclick="add_fav('3QC469','1234')"></h6>
            </div>
            <div class="img-src"
                style="background:red;background-size:cover;background-position:center;border-radius:5px"></div><br>
            <h3 style="color:#555a" align="center">Gauva</h3>
            <p><span
                    style="color:#555;text-decoration:line-through;text-decoration-color:red;">100rs</span><sup>5%</sup>&nbsp;&nbsp;<span>95rs&nbsp;<small
                        style="color:lime;font-size: 8pt;" class="fa fa-check-circle-o"></small></span></p>
            <h3 style="text-align:center;color:tomato">OUT OF STOCK</h3><br><button onclick="add_fav('7UM405','1234')"
                class="fa fa-heart btn-active ">&nbsp;&nbsp;Add to fav</button>
        </div>

        <div class="box">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <h6 class="fa fa-share-alt" style="color:#555" onclick="add_fav('3QC469','1234')"></h6>
                <h6 class="fa fa-heart-o" onclick="add_fav('3QC469','1234')"></h6>
            </div>
            <div class="img-src"
                style="background:lime;background-size:cover;background-position:center;border-radius:5px"></div><br>
            <h3 style="color:#555a" align="center">Brinjal</h3>
            <p><span
                    style="color:#555;text-decoration:line-through;text-decoration-color:red;">40rs</span><sup>0%</sup>&nbsp;&nbsp;<span>40rs&nbsp;<small
                        style="color:lime;font-size: 8pt;" class="fa fa-check-circle-o"></small></span></p>
            <div
                style="padding-top:5px;border-top:.2px solid rgba(0,0,0,.1);display:flex;justify-content:space-between;align-items: center;">
                <div class="quantity-control">
                    <h2>KG</h2><span class="fa fa-minus" onclick="decr_quantity(2,20,40)"></span><small
                        id="quantity_2">0</small><span class="fa fa-plus" onclick="incr_quantity(2,20,40)"></span>
                </div><span class="fa fa-long-arrow-right"></span>
                <div><span id="dis-cart-price-2">0</span><sup>rs</sup></div>
            </div><button id="id-ty-2" onclick="add_to_cart(2,'3QC469','40','Brinjal')"
                class="fa fa-shopping-cart btn-active id-ty-2">&nbsp;&nbsp;Add to cart</button>
        </div>

    </div>
</body>

</html>
<?php
$v1=hash_hmac($algo,'get_all', $key);
echo 'V1 : '.$v1;
?>