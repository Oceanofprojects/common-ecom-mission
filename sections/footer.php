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
            <h2>LOGO</h2><br>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatibus debitis a voluptate quod ipsum, reprehenderit ea sint totam optio dolorem?</p>
            <br><br><br>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.7986291841326!2d80.20490457420618!3d13.048486113189687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5266c25648d6c5%3A0xf3ce2da2a246c00d!2sForum%20mall%2C%20SH%20113%2C%20Ottagapalayam%2C%20Kannika%20Puram%2C%20Vadapalani%2C%20Chennai%2C%20Tamil%20Nadu%20600026!5e0!3m2!1sen!2sin!4v1696065491315!5m2!1sen!2sin" id="gMap" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="ft-r-info ft-sub-div">
            <div class="ft-r-tp-box">
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
            </div>

            <div class="ft-r-bm-box">
                <ul>
                    <li><span>head</span></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                </ul>
                <ul>
                    <li><span>head</span></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                </ul>
                <ul>
                    <li><span>head</span></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                </ul>
                <ul>
                    <li><span>Credits</span></li>
                    <li><a href="#">text</a></li>
                    <li><a href="#">text</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <div style="display: flex;justify-content:center;align-items: center;flex-direction: column;text-align:center;padding:30px 0px;background:#123">
      <hr width="20%">
      <p style="color:#fff"><br><br><span class="fa fa-copyright"></span>&nbsp;2023 All rights reserved  by <a href="#" style="text-decoration: none;color:#fff">V2clothings</a><br><br><a href="https://www.instagram.com/_the_mani_maran_/" style="color:#fe019a">Designed by <span class="fa fa-heart"></span> </a></p>  <br>
    </div>
