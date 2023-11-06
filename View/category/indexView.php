<!-- updates


if zero product or cate (show empyt box)
for cate box want precentage num  -->


<html>

<head>
    <title><?php echo $data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">
</head>

<body>

    <?php


  require_once __DIR__.'/../../sections/header.php';
  ?>
    <!-- <div id="common_dis_msg_box">
    		<div id="msg_content_to_display"></div>
    	</div> -->


    <div style="display:flex;justify-content:flex-start;align-items:center;background:linear-gradient(45deg,#ec4a33 50%,transparent 50%),url('<?php echo 'assets/category_images/'.$_GET['cate_img'];?>');background-position: center;background-size: cover;height:200px;width:100%"
        id="img" alt="Product category">
        <div class="head-info" style="padding:10px 20px;">
            <h1
                style="max-width:200px;overflow: hidden;white-space: nowrap;text-overflow:ellipsis;color:#fff;text-align:center;margin:0px 10px;background:rgba(0,0,0,.2);padding:10px">
                <?php echo $_GET['cate'];?></h1>
            <br>
            <div style="display:flex;justify-content:center;align-items:center;">
                <h6 style="color:#fff"><a
                        href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
                        style="text-decoration:none;color:#fff">Home</a>&nbsp;&nbsp;<span
                        class="fa fa-chevron-right"></span>&nbsp;&nbsp;Category</h6>
            </div>
        </div>
    </div>

    <br><br>

    <div class="head-info">
        <h1>Products</h1>
        <p> kas oa saks alks alks als alms alms </p>
    </div>
    <br><br>
    <div class="item-container">
        <?php
      if(count($data['data'])!==0){
        echo "<script>loadComponent('nor-card-view',".json_encode($data['data']).")</script>";
      }else{
        echo "ZERO";
      }
      ?>
    </div>
    <br><br>



    <!-- customers review -->
    <div class="head-info">
        <h1>Customer's Review</h1>
        <p> kas oa saks alks alks als alms alms </p>
    </div>
    <br><br>
    <?php

require_once 'Controller/productController.php';

$productCtrllr = new productController();

$review = $productCtrllr->getReviews(['type'=>'getCateReview','data'=>$_GET['cate_id'],'r-from'=>0,'r-to'=>10]);
if($review['status']){
  echo "<script>var review = ".json_encode($review)."</script>";
  require_once 'sections/reviews.php';
}else{
  echo "<script>var review = {data:[]};</script><center><span class='fa fa-chain-broken'>&nbsp;&nbsp;".$review['message']."</span></center>";
}

 ?>

    <!-- customers review -->
    <br><br><br><br>

    <?php

      require_once __DIR__.'/../../sections/footer.php';
    ?>
    <script src="Script/reviewSlide.js"></script>

</body>

</html>