    <style>
      .ft-layer{
        background-color:#123;
        width:100%;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
      }
      .ft-sub-div{
        flex: 1;
        padding: 10px;
      }
      .ft-sub-div span{
        padding:10px 0px;
        color:cornflowerblue;
        font-weight: bolder;
        }
      .ft-l-info h2,.ft-l-info p{
        width:100%;
        color:#fff;
      }
      .ft-l-info{
        text-align: center;
      }

 .ft-social-links{
    display: flex;
        justify-content: flex-start;
        flex-direction: column;
        flex-wrap: wrap;
 }
 .ft-social-links ul{
    list-style: none;
    display: flex;
        justify-content:flex-start;
        align-items: center;
 }
 .ft-social-links ul li{
    padding-right:25px
 }

 .ft-social-links ul a,.ft-r-bm-box ul li a{
    color:#fffa;
    text-decoration: none;
 }
 .ft-social-links ul a:hover,.ft-r-bm-box ul li a:hover{
    color:#ddd
 }


      .ft-r-tp-box{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 15px 0px;;
      }
      .ft-r-bm-box{
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        padding:20px 0px;
      }
      .ft-r-bm-box ul{
        min-width:100px;
        margin:10px 0px;
      }

      .ft-r-bm-box ul li{
        list-style: none;
        padding:10px
      }
      .ft-subscribe-layer{
        display: flex;
        flex-direction: column;
    width:100%;
      }
.ft-subscribe{
    display: flex;
    justify-content: center;
    align-items: center;
}
.ft-subscribe input{
    border:none;
    outline: none;
    padding:10px
}
#subscribe{
    width:100%;
    background-color:#ddd;
}
#subscribeBtn{
    width:100px;
}

.ft-r-tp-box div{
    flex:1;
    margin:0px 10px;
}

#gMap{
    width:90%;
    height:200px;
}

@media only screen and (max-width:850px){
    .ft-layer{
        flex-direction: column;
    }
    #gMap{
        width:97%;
    }
}

@media only screen and (max-width:500px){
    .ft-r-tp-box{
        flex-direction: column;
    }
    .ft-subscribe{
        width:95%
    }

}

@media only screen and (max-width:350px){
    #gMap{
        width:80%;
    }
    .ft-subscribe{
        width:80%
    }
}

    </style>
<?php
require_once __DIR__.'/../Model/productModel.php';
$cusObj = new products();
$info = $cusObj->business_info();
?>
<footer class="ft-layer">
        <div class="ft-l-info ft-sub-div"><br>
            <img src="assets/common-images/logo.png" style="border-radius:100px;" alt="Logo" height="100px" width="100px"><br><br>
            <h2><?php echo $info['business']['name'];?></h2><br>
            <p><?php echo $info['business']['slogan'];?></p>
            <br><br><br>
            <iframe src="<?php echo $info['business']['google_map_location'];?>" id="gMap" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="ft-r-info ft-sub-div">
            <div class="ft-r-tp-box">
                <div class="ft-social-links">
                    <span>Follow us</span>
                    <ul>
                        <li><a href="<?php echo $info['social_media']['instagram'];?>" class="fa fa-instagram"></a></li>
                        <li><a href="<?php echo $info['social_media']['facebook'];?>" class="fa fa-facebook-official"></a></li>
                        <li><a href="<?php echo 'https://wa.me/91'.$info['social_media']['whatsapp'];?>" class="fa fa-whatsapp"></a></li>
                        <li><a href="<?php echo $info['social_media']['youtube'];?>" class="fa fa-youtube-play"></a></li>
                    </ul>
                </div>
                <div class="ft-subscribe-layer">
                    <span>Follow us</span>
                    <div class="ft-subscribe" style="margin:0px">
                        <input type="email" name="" id="subscribe" placeholder="Enter Email ID">
                        <input style="background-color:lightgreen;" type="button" value="Send" id="subscribeBtn">
                    </div>
                </div>
            </div>

            <div class="ft-r-bm-box">
                <ul>
                    <li><span>Reach us</span></li>
                    <li><a href="#"><?php echo $info['business']['address'];?></a></li>
                    <li><a href="tel:<?php echo '+91 '.$info['business']['phone'];?>"><?php echo '+91 '.$info['business']['phone'];?></a></li>
                    <li><a href="<?php echo 'https://wa.me/91'.$info['business']['whatsapp'];?>"><?php echo '+91 '.$info['business']['whatsapp'];?></a></li>
                    <li><a href="mailto:<?php echo $info['social_media']['mail'];?>"><?php echo $info['social_media']['mail'];?></a></li>
                </ul>
                <ul>
                    <li><span>Quick links</span></li>
                    <li><a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6">Home</a></li>
                    <li><a href="index.php?key=450fa328dcada230a73f8b9797e504445116170dc6e0180da5d35b63d5b05e29&controller=product">Track my order</a></li>
                    <li><a href="#" onclick="dis_my_cart()">My Cart</a></li>
                    <li><a href="#" onclick="dis_my_fav()">My Wishlist</a></li>
                </ul>
                <ul>
                    <li><span>Features</span></li>
                    <li><a href="#">Top Quality</a></li>
                    <li><a href="#">Order Tracking</a></li>
                    <li><a href="#">Safe CC</a></li>
                    <li><a href="#">Offers</a></li>
                </ul>
<!--                 <ul>
                    <li><span>Follow us</span></li>
                    <li><a href="<?php echo 'https://api.whatsapp.com/send?phone=+91'.$info->social_media->whatsapp;?>">Whatsapp</a></li>
                    <li><a href="<?php echo $info->social_media->facebook;?>">Facebook</a></li>
                    <li><a href="<?php echo $info->social_media->instagram;?>">Instagram</a></li>
                    <li><a href="<?php echo $info->social_media->twitter;?>">Twitter</a></li>
                </ul> -->
                <ul>
                    <li><span>Policy</span></li>
                    <li><a href="index.php?controller=home&key=d75c9c5bdb3499137659ecfe86f846bbc126a25bd6fe91ef16f6983b3536df02">Shipping Policy</a></li>
                    <li><a href="index.php?controller=home&key=d45cd0f4c84fe88efa0fc4f23105a7ed1d868302f794afba92eccce80c286742">Refund Policy</a></li>
                </ul>
                <ul>
                    <li><span>Credits</span></li>
                    <li><a href="https://www.pexels.com/">Image by Pexel</a></li>
                    <li><a href="https://www.freepik.com/free-vector/leaves-pattern-background_1128617.htm#query=leaf%20icon%20background&position=1&from_view=search&track=ais&uuid=3eee07c3-42c3-4e2a-8c6d-6390d6c832c9">Image by Freepik</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div style="display: flex;justify-content:center;align-items: center;flex-direction: column;text-align:center;padding:30px 0px;background:#123">
      <hr width="20%">
      <h2 style="color:#fff;font-size:13pt"><br><br>2024, All rights reserved, <?php echo $info['business']['name'];?><br><br><br><a href="https://www.instagram.com/_the_mani_maran_?utm_source=ig_web_button_share_sheet&igsh=OGQ5ZDc2ODk2ZA==" style="color:#fe019a">Designed by <span class="fa fa-heart"></span> </a><br><br></h2>
    </div>
