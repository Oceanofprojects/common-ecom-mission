<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <!-- Boxicons CSS -->
<link
  href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
  rel="stylesheet"
/>
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/action.js"></script>
    <script src="Script/components.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <link rel="stylesheet" href="Style/review_design.css">
    <link rel="stylesheet" href="Style/swiper-bundle.min.css">
    <style>
    .details {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        max-width: 70%;
        min-width: 250px;
        border: .3px solid rgba(0, 0, 0, 0.2);
        border-radius: 10px
    }

    .details-box-layer {
        flex: 1;
        min-width: 250px;
        margin: 10px;
    }

    .details-box-content-layer {
        flex: 2;
        min-width: 250px;
        margin: 10px;
    }

    .details-box-content-layer h1 {
        font-size: 2em;
    }

    table {
        border-collapse: collapse;
        width: 90%;
    }

    tr,
    td {
        text-align: left;
        padding: 10px;
        border-bottom: .2px solid rgba(0, 0, 0, 0.5);
    }

    .details-box-content-layer p {
        font-size: 1em;
        padding: 20px 0px;
        text-align: justify;

    }

    .details-box-head {
        background: #123;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 5px;
    }

    .details-box-head a {
        text-decoration: none;
        font-size: 13pt;
        color: #fff;
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #fff;
    }

    .details-box-main-img {
        min-width: 200px;
        height: 300px;
        width: 100%;
/*        box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, .5);*/

    }

    .details-sub-imgs {
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: space-around;
        align-items: center;
        background: #cdc;
        //background: linear-gradient(0deg, rgba(0, 0, 0, .8), rgba(0, 0, 0, .6), rgba(0, 0, 0, .4) 50%, transparent);
    }

    .details-sub-imgs img {
        border: 1px solid #555;
        height: 50px;
        width: 50px;
        margin: 10px;
    }

    .details-sub-imgs img:hover {
        box-shadow: 0px 0px 10px 2px #ddda;
        cursor: pointer;
    }

    .share_link_layer {
        position: fixed;
        top: 0px;
        left: 0px;
        background: rgba(0, 0, 0, .8);
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        height: 100vh;
        width: 100%;
        display: none;
        z-index: 15;
    }

    .share_link_box {
        height:50px;
        width:50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
        margin: 10px 10px;
        padding: 8px;
        text-align: center;
        border-radius: 100px;
        border: .2px solid rgba(0, 0, 0, .1);
    }

    .share_link_box a {
        text-decoration: none;
        color: #123;
        font-size:15pt;
    }

    .share_link_box span {
        margin: 10px;
        font-size: 10pt;
    }

    .share_link_box:hover {
        background: #123;
        box-shadow: 0px 0px 10px 0px rgba(256, 256, 256, 1);
    }

    .share_link_box:hover>a {
        color: #fff;
    }

    .subset_load{
        display: grid;
  height: 100px;
  width: 100%;
  overflow: scroll;
    }
    .subset_load_lyr{
        display: flex;
        justify-content:space-around;
    }



    </style>
</head>

<body>
  
    <?php
// echo '<pre>'.json_encode($data,JSON_PRETTY_PRINT);exit;
    require_once __DIR__.'/../../sections/header.php';
        if(count($data['selected_product']['data'][0])>0){
            $resData=$data['selected_product']['data'][0];
          }else{
            echo "<br><br><br><h3 align='center'>Product ID not available</h3>";exit;
          }

$url = '';

if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    $url .= 'https://';
}else{
    $url .= 'http://';
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];

require_once __DIR__.'/../../Controller/spacesettingController.php';
$cusObj = new spacesetting();
$info = $cusObj->business_info();

?>



    <section class="share_link_layer">
        <div class="share_link_box" style="background:red;" onclick="$('.share_link_layer').css('display','none')">
            <a class="fa fa-close" style="color:#fff;">
            </a>
        </div>
        <div class="share_link_box" style="background:green;">
            <a href="<?php echo 'https://wa.me/91'.$info['social_media']['whatsapp'];?>" class="fa fa-whatsapp">
            </a>
        </div>
        <div class="share_link_box" style="background:cornflowerblue;">
            <input type="text" style="color:#ddda;border:none;background:transparent; width:.1px; outline:none"
                value="<?php echo $url;?>" id="productURL">
            <a href="#" class="fa fa-copy" onclick="copyToClip()" style="padding:5px;">
            </a>
        </div>
        <!--         <div class="share_link_box">
            <a href="https://www.facebook.com/sharer/sharer.php?u=YOUR_URL" class="fa fa-facebook-official">
            </a>
        </div>
        <div class="share_link_box">
            <a href="#" class="fa fa-instagram"></a>
        </div>
        <div class="share_link_box">
            <a href="mailto:?subject=[SUBJECT]&body=[BODY]" class="fa fa-envelope">
            </a> -->
        <!--             https://twitter.com/intent/tweet?text=YOUR_TEXT&url=YOUR_URL
            https://www.reddit.com/submit?url=YOUR_URL&title=YOUR_TITLE -->
        <!--         </div>
        <div class="share_link_box">
            <a href="https://pinterest.com/pin/create/button/?url=[URL]&media=[IMAGE_URL]&description=[DESCRIPTION]" class="fa fa-pinterest">
            </a>
        </div> -->

    </section>
    <br><br><br>
    <center>
        <section class="details" style="background:#fff">
            <div class="details-box-layer">

                <div class="details-box-head">
                    <a href="#" class="fa fa-share-alt" onclick="$('.share_link_layer').css('display','flex')"></a>
                    <?php
                if($data['selected_product']['myFavExit']['status']){
                  $favIndi = "fa fa-heart";
                }else{
                  $favIndi = "fa fa-heart-o";
                }
                ?>
                    <a href="#" style="color:#fff" class="<?php echo $favIndi;?>" id="myfav1"
                        onclick="add_fav('myfav1','<?php echo $resData['p_id'];?>')"></a>
                </div>
                <div class="details-box-main-img"
                    style="background:url('assets/product_images/<?php echo $resData['p_img'];?>');background-position: center;background-size: cover;">
                </div>
                                    <?php
                    if(isset($data['selected_product_subsets']['data']) && count($data['selected_product_subsets']['data'])>0){
                        echo '<div style="margin:5px 0px;border-radius:5px;padding:5px 0px;color:#123;width:100%;background:lightgreen;"><span>Different price</span></div><div class="subset_load">
                    <div class="subset_load_lyr">';
                         foreach ($data['selected_product_subsets']['data'] as $key => $value) {
                            $r = 'assets/product_images/'.$value['p_img'];
                            $bdr = ($resData['p_id'] == $value['p_id'])?'cornflowerblue;box-shadow:0px 0px 5px 2px rgba(0,0,0,.3)':'#555a';
                           echo "<div class='bx' style='border-radius:3px;position: relative;top:0px;left:0px;flex:1;border:2px solid ".$bdr.";margin:2px; max-width:100px;margin-top:5px;cursor: pointer;background:url($r);background-position: center;background-size: cover;'  onclick=\"window.open('index.php?controller=product&key=5d551508d3cee059d6760a6ec69f708dc69a48f2596d2808f106e48db15e28e4&pid=".$value['p_id']."')\"><span style='position: absolute;bottom:0px;right: 0px;background:#123;color:#ddd;font-size:8pt;padding:0px 5px;'>{$value['price']}rs</span></div>";

                        }
                        echo '</div>
                </div>';
                    }else{
                        echo '<br>';
                    }


                ?>

                <?php
                  if($resData['offer'] > 0){
                    echo "<span style=\"text-decoration:line-through;font-size:15pt;text-decoration-color:red;\">".$resData['price']."rs</span><sup>".$resData['offer']."%</sup>&nbsp;&nbsp;&nbsp;&nbsp;<span>".($resData['price'] - ($resData['price']*$resData['offer']/100))."rs</span><br>";
                  }else{
                    echo "<h1>".$resData['price'].'rs'."</h1>";
                  }
                  ?>
                <br>
                <h1><?php echo $resData['p_name'].' #'.$resData['p_id'];?></h1>
                <br>
                <div class="t" style="min-width:200px;width:40%">
                </div>
                <br>
                <script>
                $('.t').append(check_stock(1, <?php echo $resData['stock']?>, calc_offer(
                        <?php echo $resData['price'];?>, <?php echo $resData['offer'];?>),
                    '<?php echo $resData['unit'];?>', '<?php echo $resData['p_name'];?>',
                    '<?php echo $resData['p_id'];?>'));
                </script>

            </div>
            <div class="details-box-content-layer">
                <br>
                <h2>Product Details</h2>
                <p width="100%"><?php 
//                echo $resData['p_desc'];
                $lines = explode('NEWLINE',$resData['p_desc']);
                    for($y=0;$y<count($lines);$y++){
                        echo "<span class='fa fa-angle-double-right'></span>&nbsp;&nbsp;".$lines[$y].'<br><br>';
                    }
                ?></p>
                <table>
                    <tr style="background:#555a;">
                        <th colspan="2" style="padding:10px;text-align:center">Product Details</th>
                    </tr>
                    <tr>
                        <th>Product Name</th>
                        <td><?php echo $resData['p_name'];?></td>
                    </tr>
                    <tr>
                        <th>Product ID</th>
                        <td><?php echo $resData['p_id'];?></td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td><?php echo $resData['p_name'].', <a href="index.php?cate_id='.$resData['cate_id'].'&cate='.$resData['cate_id'].'&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7">More</a>';?>
                        </td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td>
                            <?php
                  if($resData['offer'] > 0){
                    echo "<span style=\"text-decoration:line-through;text-decoration-color:red;\">".$resData['price']."rs</span><sup>".$resData['offer']."%</sup>&nbsp;&nbsp;&nbsp;&nbsp;<span>".($resData['price'] - ($resData['price']*$resData['offer']/100))."rs</span>";
                  }else{
                    echo "<span>".$resData['price'].'rs'."</span>";
                  }
                  ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Stock left</th>
                        <td><?php echo $resData['stock'];?></td>
                    </tr>
                    <!-- <tr>
                <th>Last update</th>
                <td><?php echo $resData['update_at'];?></td>
              </tr> -->
                </table>
            </div>

        </section>
    </center>
    <br><br><br>


    <center> <img width="50%" src="assets/common-images/end_line.png" alt=""> </center>
    <h2 align="center">Suggestion Product</h2><br><br><br>

    <?php

  $productCtrllr = new productController();

      require_once 'sections/suggestionProducts.php';
if(count($data['suggestion']['data'])!==0){
  echo "<script>loadComponent('suggestion-card-view',".json_encode($data['suggestion']).")</script>";
}else{
  echo "<center><span class='fa fa-chain-broken'>&nbsp;&nbsp;Suggestion list zero for this product</span></center>";
}

  ?>
    <br><br>
    <center> <img width="50%" src="assets/common-images/end_line.png" alt=""> </center>
    <h2 align="center">Customers Reviews</h2><br>
    <?php
  require_once 'Controller/productController.php';

  $review = $productCtrllr->getReviews(['type'=>'getPidReview','data'=>$resData['p_id'],'r-from'=>0,'r-to'=>10]);
//  var_dump($review['status']);
  if($review['status']){
    echo "<script>var review = ".json_encode($review)."</script>";
    require_once 'sections/reviews.php';
  echo "<br><br><br>";
  }else{
    echo "<script>var review = {'data':[]};</script>";
    echo "<center><span class='fa fa-chain-broken'>&nbsp;&nbsp;".$review['message']."</span></center>";
  }

  echo '  <center> <img width="50%" src="assets/common-images/end_line.png" alt=""> </center>
  <h2 align="center">Write your Reviews</h2><br>';
$p_id=$resData['p_id'];
  require_once 'sections/reviewForm.php';
  echo "<br><br><br>";

  require_once 'sections/footer.php';
  ?>
    <script src="Script/reviewSlide.js"></script>
    <script type="text/javascript">
    function copyToClip() {
        $('#productURL').select();
        document.execCommand("copy");
        dis_msg_box('#000', 'lightgreen', 'URL Copied !!');
        $('.share_link_layer').css('display', 'none');
    }
    </script>

</body>

</html>