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
    require_once __DIR__.'/../sections/header.php';
    require_once __DIR__.'/../sections/mainSlider.php';
    ?>

    <br><br><br>
    <div class="head-info">
        <h1>Categories</h1>
        <p>See all product based on category</p>
    </div>
    <br><br>
    <div class="cate-container">
        <?php
  if(count($data['cate_list']['data'])!==0){
    echo "<script>loadComponent('category-card-view',".json_encode($data['cate_list']['data']).",[6])</script>";
  }else{
    echo "cate illa ZERO";
  }
  ?>
    </div>
    <br><br><br><br>
    <center>
        <a href="index.php?key=1cf31b8f97c87304e97cd86a13916753d77e16a1edb4bebfe3909aaea983e20f&controller=product"
            class="btn" style="background:cornflowerblue;color:#fff;text-decoration:none" name="button">More
            Categories</a>
    </center>

    <br><br><br><br><br><br>

    <div class="head-info">
        <h1>Latest Products</h1>
        <p>Our store lastest update !</p>
    </div>
    <br><br>
    <div class="item-container">
        <?php
      if(count($data['data'])!==0){
        echo "<script>loadComponent('nor-card-view',".json_encode($data['data']).")</script>";
      }else{
        echo "ZERO";
      }
      $rng = '&from='.$data['data']['range'][0].'&to='.$data['data']['range'][1];
      ?>
    </div>
    <br><br><br><br>
    <center>
        <button id="loadMoreProduct"
            onclick="loadMoreProduct('key=5b9a4ec28c6ebd73521c41b554fc3f5ec02d546cb0d381ac83e3140f044f43a4&controller=product<?php echo $rng;?>')"
            class="btn" style="background:cornflowerblue;color:#fff;text-decoration:none" name="button">View
            More <span class="fa fa-angle-double-down"></span> </button>
    </center>

    <br><br><br><br><br><br>



    <!-- customers review -->
    <div class="head-info">
        <h1>Customer's Review</h1>
        <p>Our customer's product review</p>
    </div>
    <br><br>
    <!-- <script type="text/javascript">
  t = "THE MSG";
</script> -->
    <?php

require_once 'Controller/productController.php';

$productCtrllr = new productController();

$review = $productCtrllr->getReviews(['type'=>'getAllReview','data'=>'','r-from'=>0,'r-to'=>10]);
if($review['status']){
  echo "<script>var review = ".json_encode($review)."</script>";
  require_once __DIR__.'/../sections/reviews.php';
}else{
  echo "<center><span class='fa fa-chain-broken'>&nbsp;&nbsp;".$review['message']."</span></center>";
}


 ?>

    <!-- customers review -->
    <br><br><br><br>

    <?php
    echo hash_hmac('sha256','openSearch',9050);

    require_once __DIR__.'/../sections/footer.php';


    ?>

    <script src="Script/reviewSlide.js"></script>
    <!-- <br><br><br> -->
</body>
<?php
//    require_once 'sections/suggestionProducts.php';

//38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9---MOVETOPRODUCT
?>

</html>