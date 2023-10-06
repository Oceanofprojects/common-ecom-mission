<!-- updates


if zero product or cate (show empyt box)
for cate box want precentage num  -->


<html>

<head>
    <title><?php echo $data['title'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="script/commonScript.js"></script>
    <script src="script/jquery.min.js"></script>
    <script src="script/action.js"></script>
    <script src="script/components.js"></script>
    <link rel="stylesheet" href="style/global.css">

</head>

<body>
    <div id="common_dis_msg_box">
    		<div id="msg_content_to_display"></div>
    	</div>


    <div style="display:flex;justify-content: center;align-items: center;background:url('<?php echo 'assets/category_images/'.$_GET['cate_img'];?>');background-position: center;background-size: cover;height:300px;width:100%" id="img" alt="Product category">
      <div class="head-info" style="background:rgba(0,0,0,.5);padding:0px 20px">
        <h1 style="color:#fff"><?php echo $_GET['cate'];?></h1>
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

require_once __DIR__.'/../../sections/reviews.php';

 ?>

<!-- customers review -->
<br><br><br><br>

    <?php

      require_once __DIR__.'/../../sections/footer.php';
    ?>
</body>
</html>
