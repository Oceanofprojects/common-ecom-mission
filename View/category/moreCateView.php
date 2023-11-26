<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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