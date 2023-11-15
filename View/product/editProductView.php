<html>

<head>
    <title><?php echo $data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
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


    /*THIS STYLE ONLY FOR EDIT*/
    #disOldImgLink {
        display: none;
    }
    </style>
</head>

<body>
    <?php
    require_once 'sections/header.php';

    ?>
    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <br><br>
    <h1 align="center">Edit Product</h1>
    <br><br>
    <center>
        <!-- <div class="search">
    <input type="text" name="" id="search" list="product_names" placeholder="Search Product here">
    <span class="fa fa-search" onclick="get_for_edit()"></span>
  </div>
  <datalist id="product_names">
  </datalist> -->
        <section>
            <input type="button" onclick="deleteProduct()" style="width:100px;background:red;border-radius:5px;"
                id="delProduct" value="Delete Product">
            <form id="frm" action="" enctype="multipart/form-data">
                <table id="tbl_data_1">
                    <tr>
                        <td>Search<sup></sup></td>
                        <td>
                            <input type="text" style="width:70%" id="search_txt" placeholder="Search Product name">
                            <input type="button" onclick="searchProduct('editProduct','search_txt')"
                                style="width:20%;background:orange;border-radius:5px;" id="search" value="Go">
                        </td>
                    </tr>
                    <tr>
                        <td>Category<sup>*</sup></td>
                        <td>
                            <select id="cate_name" name="cate_id">
                                <?php
          if(count($data['data']['data']) !== 0){
            echo "<option value=''>Select cate list</option>";
            for($i=0;$i<count($data['data']['data']);$i++){
              echo "<option value='".$data['data']['data'][$i]['cate_id']."'>".$data['data']['data'][$i]['cate']."</option>";
            }
          }else{
            echo "<option value=''>Select cate list</option><option value=''>Empty</option>";
          }
           ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>image<sup>*</sup></td>
                        <td>
                            <div id="disOldImgLink"><a href="#" id="disOldUrl" target="blank">View Old Image
                                </a><br>- - - or - - -<br></div>
                            <input type="file" id="file1" name="file1" onchange="chFileBg(1)">
                            &nbsp;<span style="color:green" id="fileInd1"></span>

                        </td>
                    </tr>
                    <tr>
                        <td>Name<sup>*</sup></td>
                        <td><input type="text" id="p_name" placeholder="Product name" name="p_name"></td>
                    </tr>
                    <tr>
                        <td>Description<sup>*</sup></td>
                        <td><textarea placeholder="Enter product description" id="desc" name="p_desc"></textarea></td>
                    </tr>
                    <tr>
                        <td>Price<sup>*</sup></td>
                        <td><input type="number" id="price" placeholder="Product Price" min="0" name="price"></td>
                    </tr>

                    <tr>
                        <td>Offer</td>
                        <td><input type="number" id="offer" placeholder="Product Offer %" min="0" name="offer"></td>
                    </tr>
                    <tr>
                        <td>Unit<sup>*</sup></td>
                        <td>
                            <input type="text" id="unit" name="unit" placeholder="KG,Piece,Nos,Liter,Pair....">
                        </td>
                    </tr>
                    <tr>
                        <td>Stock<sup>*</sup></td>
                        <td><input type="number" name="stock" id="stock" placeholder="Product Stock" min="0"></td>
                    </tr>
                    <tr>
                        <td>Tag<sup>*</sup></td>
                        <td><textarea placeholder="Enter keywords, Tags, Identity..." id="tags" name="tags"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" id="p_id" name="p_id" hidden>
                            <input type="text" id="p_img" name="p_img" hidden>
                        </td>
                        <td><input type="button" id="add_item_btn" value="Update Product"
                                style="background:lightgreen;width:100px" onclick="edit_item()">


                        </td>
                    </tr>
                </table>
            </form>
        </section>

    </center>
    <script src="Script/action.js"></script>

    <script type="text/javascript">
    function deleteProduct() {
        pid = $('#p_id').val();
        if (pid.trim().length !== 0) {
            if (confirm(
                    'Do you want to delete this product ?, \n\nNotes : If product deleted never recover again !.') ==
                true) {
                //a2b8443bbee09de17d84128a8e9d4e0bd8c241b79d82f96fefa384af8a77d7c9
                performAjx('index.php', 'get',
                    'controller=product&key=a2b8443bbee09de17d84128a8e9d4e0bd8c241b79d82f96fefa384af8a77d7c9&pid=' +
                    pid.trim(), (
                        res) => {
                        d = JSON.parse(res);
                        if (d.status) {
                            $('#frm')[0].reset();
                            dis_msg_box('#000', 'lightgreen', d.message);
                        } else {
                            dis_msg_box('#000', 'tomato', d.message);
                        }
                    });
            }
        } else {
            alert('Please search and select product to delete');
        }

    }
    </script>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>