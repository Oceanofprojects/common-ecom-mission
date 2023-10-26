<!-- updates

particular review for category view
if zero product or cate (show empyt box)
for cate box want precentage num
want review data dyn not static
show empty when 0 reviews
  -->

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
    <style>

    </style>

    <br><br>
    <div class="head-info">
        <h1>Best Products</h1>
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



    <br><br><br><br><br><br>
    <div class="head-info">
        <h1>Categories</h1>
        <p> kas oa saks alks alks als alms alms </p>
    </div>
    <br><br>
    <div class="cate-container">
        <?php
  if(count($data['cate_list']['data'])!==0){
    echo "<script>loadComponent('category-card-view',".json_encode($data['cate_list']['data']).")</script>";
  }else{
    echo "cate illa ZERO";
  }
  ?>
    </div>
    <br><br><br><br>
    <center>
        <a href="#" class="btn" style="background:cornflowerblue;color:#fff;text-decoration:none" name="button">More
            Categories</a>
    </center>

    <br><br><br><br><br><br>

    <!-- customers review -->
    <div class="head-info">
        <h1>Customer's Review</h1>
        <p> kas oa saks alks alks als alms alms </p>
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

    require_once __DIR__.'/../sections/footer.php';
    ?>
    <script src="Script/reviewSlide.js"></script>
    <!-- <br><br><br> -->
</body>
<?php
//    require_once 'sections/suggestionProducts.php';
echo hash_hmac('sha256','search',9050);
?>

</html>