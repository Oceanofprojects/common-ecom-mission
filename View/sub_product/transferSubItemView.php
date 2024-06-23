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
    <script src="Script/components.js"></script>
    <script src="Script/action.js"></script>
    
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


    /*THIS STYLE ONLY FOR EDIT*/
    #disOldImgLink {
        display: none;
    }
    </style>
</head>

<body>
    <?php
    require_once 'sections/header.php';

/**
 * 
 * 
 * CHECKING AUTO FILL FROM ADMIN EDIT
 * **/
    if(isset($_GET['autofill']) && (bool)$_GET['autofill']){
        echo "<script>search_purpose('editProduct','".$_GET['p_id']."')</script>";//Search & autofill
    }

    ?>
    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <br><br>
    <h1 align="center">Add Sub-Product</h1>
    <br><br>
    <center>
        <section>
            <form id="frm" action="">
                <table id="tbl_data_1">
                    <tr>
                        <td>Child ID<sup>*</sup></td>
                        <td><input type="text" name="pid" id="pid" placeholder="Parent ID"></td>
                    </tr>
                    <tr>
                        <td>Parent ID<sup>*</sup></td>
                        <td><input type="text" name="cid" id="cid" placeholder="Child ID"></td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td><input type="button" id="add_item_btn" value="Transfer Item"
                                style="background:lightgreen;width:100px" onclick="transferItem()">


                        </td>
                    </tr>
                </table>
            </form>
        </section>

    </center>
    <script>
    function transferItem(t_id) {
            performAjx('index.php', 'get',
                'controller=product&key=af5b9c4022abf3f0b4cc753ed5396ec843bc46dea1e68a0dfa0b75b3636cb7de&pid=' +
                $('#pid').val()+'&cid='+$('#cid').val(), (res) => {
                    d = JSON.parse(res);
                    if (d.status) {
                        dis_msg_box('#000', 'lightgreen', d.message);
                    } else {
                        dis_msg_box('#000', 'tomato', d.message);
                    }
                });
    }
    </script>

    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>