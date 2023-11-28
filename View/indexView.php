<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <?php
    require_once __DIR__.'/../sections/msg_bot.php';
    ?>
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
    echo "Zero lists";
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
      }
      $rng = '&from='.$data['data']['range'][0].'&to='.$data['data']['range'][1];
      ?>
    </div>
    <br><br><br><br>
    <center>
        <button id="loadMoreProduct"
            onclick="loadMoreProduct('key=5b9a4ec28c6ebd73521c41b554fc3f5ec02d546cb0d381ac83e3140f044f43a4&controller=product<?php echo $rng;?>')"
            class="btn" style="background:cornflowerblue;color:#fff;text-decoration:none" name="button">            More Products&nbsp;<span class="fa fa-angle-double-down"></span> </button>
    </center>
    <br><br><br>
    <section style="background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)) 20%,url('assets/common-images/leaf1.jpg');background-attachment:fixed; background-size:cover; height:250px;padding:10px;display:flex;flex-direction:column;justify-content: center; align-content: center;">
        <div>
        <h1 style="margin:10px;color:#fff;font-size:2em;">Top Quality & Collective Plants Available</h1>
        <br>
        <button id="loadMoreProduct"
            onclick="window.open('index.php?key=1cf31b8f97c87304e97cd86a13916753d77e16a1edb4bebfe3909aaea983e20f&controller=product','_self')"
            class="btn" style="background:darkorange;color:#fff;text-decoration:none" name="button">            Explore Nows&nbsp;&nbsp;<span class="fa fa-angle-double-right"></span> </button>
            </div>
    </section>
<br><br>
    <section class="cateSetProductsLoaderLayer">
        <!-- LOAD CATEGORY WITH PRODUCTS -->
        <?php 

   $cateNProLen = $data['categoryProductSets']['data'];
    if(count($cateNProLen) !==0){
        for($cateLoop=0;$cateLoop<count($cateNProLen);$cateLoop++){
            $d = $cateNProLen[$cateLoop]['catesets'];
            $cateNdata = explode('{CATE_SEP}',$d);
            if(count($cateNdata) == 2 && !empty($cateNdata[1])){
                $category_name = $cateNdata[0];
                $tmpRow = $cateNdata[1];
                $rows = explode('{ROW_SEP}',$tmpRow);
                for($i = 0;$i<count($rows);$i++){
                    $pdata =  explode('{DATA_SEP}',$rows[$i]);
                   foreach($pdata as $singleData){
                    $pDataUnit = explode('=',$singleData);
                    $myArr['data'][$i][$pDataUnit[0]] = $pDataUnit[1]; 
                   }
                }   
                echo "<script>
                loadComponent('layer-wt-nor-card-view',".json_encode($myArr).",['".$category_name."'])
                </script>";
                unset($myArr['data']);
            }
        }
    }


         ?>
    </section>
<br>
<br>
<br>
<br>
<br>

    <?php 

require_once __DIR__.'/../sections/features.php';

?>
    <br><br><br><br>
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
    // echo hash_hmac('sha256','myCustomers',9050);

    require_once __DIR__.'/../sections/footer.php';


    ?>


    <script src="Script/reviewSlide.js"></script>
    <!-- <br><br><br> -->
</body>
<?php
   // require_once 'sections/foote.php';

//38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9---MOVETOPRODUCT
?>

</html>