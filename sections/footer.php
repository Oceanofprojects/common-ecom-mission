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
    color:#fff;
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

<footer class="ft-layer">
        <div class="ft-l-info ft-sub-div"><br>
            <img src="assets/common-images/logo.png" style="border-radius:100px;" alt="Logo" height="100px" width="100px"><br><br>
            <h2>Your shop name</h2><br>
            <p>Spread love to plants</p>
            <br><br><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.7986291841326!2d80.20490457420618!3d13.048486113189687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266c25648d6c5%3A0xf3ce2da2a246c00d!2sForum%20mall%2C%20SH%20113%2C%20Ottagapalayam%2C%20Kannika%20Puram%2C%20Vadapalani%2C%20Chennai%2C%20Tamil%20Nadu%20600026!5e0!3m2!1sen!2sin!4v1696065491315!5m2!1sen!2sin" id="gMap" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="ft-r-info ft-sub-div">
            <!-- <div class="ft-r-tp-box">
                <div class="ft-social-links">
                    <span>Follow us</span>
                    <ul>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-facebook-official"></a></li>
                        <li><a href="#" class="fa fa-whatsapp"></a></li>
                        <li><a href="#" class="fa fa-telegram"></a></li>
                    </ul>
                </div>
                <div class="ft-subscribe-layer">
                    <span>Follow us</span>
                    <div class="ft-subscribe" style="margin:0px">
                        <input type="email" name="" id="subscribe" placeholder="Enter Email ID">
                        <input style="background-color:orange;" type="button" value="Send" id="subscribeBtn">
                    </div>
                </div>
            </div> -->

            <div class="ft-r-bm-box">
                <ul>
                    <li><span>Reach us</span></li>
                    <li><a href="#">No. 48, Test street, Pallavaram main road, Chennai- 600232.</a></li>
                    <li><a href="#">Land mark - Test land mark (Opt)</a></li>
                    <li><a href="tel:+910000000">+91 xxxxx xxxxx</a></li>
                    <li><a href="mailto:">testaccount@gmail.com</a></li>
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
                <ul>
                    <li><span>Follow us</span></li>
                    <li><a href="#">Whatsapp</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#"></a></li>
                </ul>
                <ul>
                    <li><span>Policy</span></li>
                    <li><a href="#">Shipping Policy</a></li>
                    <li><a href="#">Refund Policy</a></li>
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
      <p style="color:#fff"><br><br>2024, All rights reserved xxxx<br><br><br><a href="#" style="color:#fe019a">Designed by <span class="fa fa-heart"></span> </a><br><br></p>
    </div>
