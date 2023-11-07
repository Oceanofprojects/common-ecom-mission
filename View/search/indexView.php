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
    <style media="screen">
    #frm {
        width: 50%;
        min-width: 250px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);
        border-radius: 10px;
        background: #fff;

    }

    .btn {
        padding: 10px;
        margin: 2px;
        border: 1px solid rgba(0, 0, 0, .1);
        border-radius: 3px;
        background: rgba(0, 0, 0, .1);
    }

    .btn:hover {
        cursor: pointer;
        background: rgba(0, 0, 0, .4);
        color: #fff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        border-bottom: .8px solid rgba(0, 0, 0, .2);
        padding: 10px 5px;
    }

    input,
    select,
    textarea {
        width: 100%;
        padding: 10px 0px;
        border: none;
        outline: none;
        cursor: pointer;
    }

    /* .search{
min-width:200px;
width:50%;
border:.2px solid rgba(0,0,0,.2);
}
.search input{
width:90%;
} */
    #tmp_img_viewer,
    #check_box_label {
        display: none;
    }

    sup {
        color: red
    }

    #file1 {
        position: relative;
        top: 0px;
        left: 0px;
        width: 100px;
    }

    #file1:after {
        content: 'Upload image';
        color: #fff;
        text-align: center;
        position: absolute;
        top: 0px;
        left: 0px;
        padding: 10px 0px;
        width: 100%;
        height: 100%;
        background: cornflowerblue;
    }
    </style>
</head>

<body>
    <?php
    require_once 'sections/header.php';
    // print_r($data);
    ?>

    <div style="padding:20px 0px;display:flex;justify-content:flex-start;align-items:center;background:cornflowerblue;width:100%"
        id="img" alt="Product category">
        <div class="head-info" style="padding:10px 20px;">
            <h1
                style="max-width:200px;overflow: hidden;white-space: nowrap;text-overflow:ellipsis;color:#fff;text-align:center;margin:0px 10px;background:rgba(0,0,0,.2);padding:10px">
                Search</h1>
            <br>
            <div style="display:flex;justify-content:center;align-items:center;">
                <h6 style="color:#fff"><a
                        href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
                        style="text-decoration:none;color:#fff">Home</a>&nbsp;&nbsp;<span
                        class="fa fa-chevron-right"></span>&nbsp;&nbsp;Search</h6>
            </div>
        </div>
    </div>
    <br><br><br>
    <?php 
    if(count($data['data']['data'])==0){
        echo '<h1 align="center">'.$data['data']['message'].'</h1><br><h4 align="center">Zero result for "'.$_GET['search_txt'].'"</h4>';
    }else{
        echo '<h1 align="center">Search Result ('.count($data['data']['data']).')</h1>';
    }    
    ?>
    <br><br>
    <div class="item-container">
        <?php 
    if(count($data['data'])!==0){
        echo "<script>loadComponent('nor-card-view',".json_encode($data['data']).")</script>";
    }    
    ?>
    </div>
    <br><br><br>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>