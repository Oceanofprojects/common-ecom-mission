<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
  <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/action.js"></script>
    <script src="Script/components.js"></script>
    <link rel="stylesheet" href="Style/global.css">
  </head>
  <body>
    <style>
    .details {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        max-width:70%;
        min-width:400px;
        border:.3px solid rgba(0, 0, 0, 0.2);
        border-radius:10px
    }

    .details-box-layer {
        flex: 1;
        margin: 20px;
    }

    .details-box-content-layer {
        flex: 2;
        min-width: 200px;
        margin:10px;
    }

    .details-box-content-layer h1 {
        font-size: 2em;
    }
    table{
      border-collapse: collapse;
      width:90%;
    }
    tr,td{
      text-align: left;
      padding: 10px;
      border-bottom:.2px solid rgba(0, 0, 0, 0.5);
    }

    .details-box-content-layer p {
        font-size: 1em;
        padding: 20px 0px;
        text-align:justify;

    }

    .details-box-head {
        background:#cdc;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 5px;
    }

    .details-box-head a {
        text-decoration: none;
        font-size: 13pt;
        color:#fff;
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
        border:1px solid #fff;
    }

    .details-box-main-img {
        min-width: 200px;
        height: 300px;
        width: 100%;
    }

    .details-sub-imgs {
        backdrop-filter: blur(5px);
        display: flex;
        justify-content: space-around;
        align-items: center;
        background:#cdc;
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
    </style>
    <?php
    require_once __DIR__.'/../../sections/header.php';
    if($data['data']['data'] == 0){
      echo "Err in viewing product";
      exit;
    }else{
      $resData = $data['data']['data'][0];
    }

    ?>

    <br><br><br>
    <center>
    <section class="details" style="background:#fff">
        <div class="details-box-layer">
            <div class="details-box-head">
                <a href="#" class="fa fa-share-alt"></a>
                <?php
                if($data['data']['myFavExit']['status']){
                  $favIndi = "fa fa-heart";
                }else{
                  $favIndi = "fa fa-heart-o";
                }
                ?>
                <a href="#" style="color:#fff" class="<?php echo $favIndi;?>" id="myfav1" onclick="add_fav('myfav1','<?php echo $resData['p_id'];?>')"></a>
            </div>
            <div class="details-box-main-img" style="background:url('assets/product_images/<?php echo $resData['p_img'];?>');background-position: center;background-size: cover;"></div>
            <div class="details-sub-imgs">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
                <img
                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRwixnX9_EXei7itvuaLzBWKhrCj0ypC78jLA&usqp=CAU">
            </div>
        </div>
        <div class="details-box-content-layer">
            <h1><?php echo $resData['p_name'].' #'.$resData['p_id'];?></h1>
            <div class="t">
ONGOING
            </div>
            <script>
            i=1;
            $('.t').append(check_stock(1,<?php echo $resData['stock']?>, <?php echo $resData['offer'];?>,'<?php echo $resData['unit'];?>','<?php echo $resData['p_name'];?>','<?php echo $resData['p_id'];?>'));

            </script>
            <p width="100%"><?php echo $resData['p_desc'];?></p>
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
                <td><?php echo $resData['p_name'].', <a href="index.php?cate='.$resData['cate'].'&cate_img='.$resData['cate_img'].'&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7">More</a>';?></td>
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
              <tr>
                <th>Last update</th>
                <td><?php echo $resData['update_at'];?></td>
              </tr>
            </table>
        </div>

    </section>
  </center>
  <br><br><br>
  <center> <img width="50%" src="assets/common-images/end_line.png" alt=""> </center>
  <h2 align="center">Suggestion Product</h2><br><br><br>

  <?php
      require_once 'sections/suggestionProducts.php';
  ?>
  <br><br>

  <center> <img width="50%" src="assets/common-images/end_line.png" alt=""> </center>
  <h2 align="center">Customers Reviews</h2><br>
  <?php
  require_once 'Controller/productController.php';

  $productCtrllr = new productController();

  $review = $productCtrllr->getReviews(['type'=>'getPidReview','data'=>$resData['p_id'],'r-from'=>0,'r-to'=>10]);
  if($review['status']){
    echo "<script>var review = ".json_encode($review)."</script>";
    require_once 'sections/reviews.php';
  }else{
    echo "<center><span class='fa fa-chain-broken'>&nbsp;&nbsp;".$review['message']."</span></center>";
  }

  require_once 'sections/footer.php';
  ?>
    <script src="Script/reviewSlide.js"></script>
  </body>
</html>
