<html>

<head>
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
    <?php
    require_once 'sections/header.php';
    ?>

    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <div class="head-info">
        <h1>Categories</h1>
        <p>See all product based on category</p>
    </div>
    <br><br>
    <div class="cate-container">
        <?php
  if(count($data['data'])!==0){
    echo "<script>loadComponent('category-card-view',".json_encode($data['data']['data']).",['all'])</script>";
  }else{
    echo "cate illa ZERO";
  }
  ?>
    </div>
    <br><br><br><br>
    <script type="text/javascript">

    </script>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>