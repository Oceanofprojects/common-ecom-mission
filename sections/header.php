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
    list-style: none;
    margin:0px 10px;
    font-size:15px
}

.menu li a {
    text-decoration: none;
    color: #000;
    padding: 0px 5px;
    font-size: 12pt
}

.menu li a:hover {
    color: navy
}

#menu_icon {
    display: none
}
</style>
<?php
require_once 'model/productModel.php';

$cusObj = new products();
if($cusObj->getUserId()[0]){
  $extraLinks = '<li class="fa fa-heart-o"><a href="#" onclick="dis_my_fav()">My fav</a></li><li class="fa fa-shopping-cart"><a href="#">Cart</a></li><li class="fa fa-user-circle"><a href="#">Account</a></li>';
}else{
  $extraLinks = '<li><a href="#" class="fa fa-sign-in">Login</a></li>';
}
?>
<header class="menu">
    <div>
        <img src="assets/common-images/logo.png" alt="asasas">
        <span id="menu_icon">X</span>
    </div>
    <nav>
        <ul>
            <li class="fa fa-home"><a href="#">Home</a></li>
            <li class="fa fa-search"><a href="#">Search</a></li>
            <li class="fa fa-percent"><a href="#">Offer</a></li>
            <?php echo $extraLinks;?>
        </ul>
    </nav>
</header>
