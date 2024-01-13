<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <title><?php echo $data['title'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <script src="Script/action.js"></script>
    <script src="Script/components.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <style media="screen">
    section {
        display: flex;
        justify-content: center;
        flex-direction: center;
        align-items: center
    }

    .list {
        width: 50%;
        min-width: 200px;
        background: #fff;
        border: 1px solid rgba(0, 0, 0, .2);
        border-radius: 3px;
        padding: 10px;
        display: flex;
        justify-content: flex-start;
        /* align-items: center */
    }

    .list div {
        /* margin: 5px; */
    }

    .list .img_port {
        height: 100px;
        min-width: 100px;
        margin-right: 10px;
        border: .2px solid rgba(0, 0, 0, .1);
    }

    ul {
        list-style: none;
    }

    li {
        color: #555;
    }

    b {
        color: #000
    }
    </style>
</head>

<body>
    <?php
    require_once 'sections/header.php';
    ?>
    <br><br>
    <h3 style="background:#123;color:#fff;width:200px;text-align:center;margin:0px 10px">HOT LIST</h3>
    <br>
    <section>
        <div class="list">
            <div class="img_port"
                style="background:url('assets/common-images/logo.png');background-size:cover;background-position:center">
            </div>
            <div>
                <ul>
                    <li><b>Item :</b> plant</li>
                    <li><b>Price :</b> 10rs</li>
                    <li><b>Description :</b> Tesy aj sja sja s aska s asm aks akm skma skma smka skma smka skams akms
                        akms akm
                        skma sk</li>
                    <li><b>Review :</b> 4</li>
                    <br>
                    <li><button class="btn" style="padding:2px 5px;background:lightgreen">Buy now</button></li>
                </ul>
            </div>
        </div>
    </section>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>