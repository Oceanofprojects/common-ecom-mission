<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>as</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <script src="script/commonScript.js"></script>
    <script src="script/jquery.min.js"></script>
    <script src="script/action.js"></script>
    <script src="script/components.js"></script>
    <link rel="stylesheet" href="style/global.css">

  </head>
  <body>
    <style>
    * {
        padding: 0px;
        margin: 0px
    }
  body{
    background:linear-gradient(rgba(256,256,256,.9),rgba(256,256,256,.8)),url('assets/common-images/leave_bg.jpg');
    background-position: center;
    background-attachment:fixed;
    background-size: cover;
  }

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
        background: linear-gradient(0deg, transparent, rgba(0, 0, 0, .3) 95%);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 5px;
    }

    .details-box-head a {
        text-decoration: none;
        font-size: 13pt;
        color:#555;
        margin: 10px;
        background-color:rgba(256,256,256,.9);
        padding: 10px;
        border-radius: 5px
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
        background: linear-gradient(0deg, rgba(0, 0, 0, .8), rgba(0, 0, 0, .6), rgba(0, 0, 0, .4) 50%, transparent);
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
    print_r($data);
    if($data['data']['data'] == 0){
      echo "Err in viewing product";
      exit;
    }else{
      $resData = $data['data']['data'][0];
    }

    ?>

    <br><br><br>
    <center>
    <section class="details">
        <div class="details-box-layer" style="background:url('assets/product_images/<?php echo $resData['p_img'];?>');background-position: center;background-size: cover;">
            <div class="details-box-head">
                <a href="#" class="fa fa-share-alt"></a>
                <a href="#" class="fa fa-shopping-cart" onclick="add_fav('<?php echo $resData['p_id'];?>')"></a>
            </div>
            <div class="details-box-main-img"></div>
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
                <td><?php echo $resData['p_name'];?></td>
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
      require_once 'sections/reviews.php';
  ?>
<br><br><br>
  </body>
</html>
