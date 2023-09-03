<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script/commonScript.js"></script>
    <script src="script/jquery.min.js"></script>

    <script src="script/action.js"></script>
    <script src="script/components.js"></script>
    <link rel="stylesheet" href="style/global.css">
</head>

<body>
    <?php
    require_once __DIR__.'/../sections/header.php';
    ?>
    <script>
get_all();
    </script>

    <br><br><br>
    <div class="item-container">

    </div>
</body>
<?php
 //   require_once 'sections/suggestionProducts.php';
?>


</html>
<?php
session_start();
$_SESSION['1485fe7c0627c439594baf9c3db3d47ec39e6abab732dec42a662067d7374940'] = 3802279867;
$algo = 'sha256';
$skey = 9050;
echo hash_hmac($algo,'uniqueID',$skey);
?>
