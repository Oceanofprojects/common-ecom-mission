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
        width: 125px;
    }

    #file1:after {
        content: 'Upload new image';
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
    ?>

    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <br><br>
    <h1 align="center">Edit Category</h1>
    <br><br>
    <center>
        <!-- <div class="search">
    <input type="text" name="" id="search" list="product_names" placeholder="Search Product here">
    <span class="fa fa-search" onclick="get_for_edit()"></span>
  </div>
  <datalist id="product_names">
  </datalist> -->
        <section>
            <form id="frm" enctype="multipart/form-data">
                <table id="tbl_data_1">
                    <tr>
                        <td>Search Category</td>
                        <td>
                            <select id="cate_name" onchange="getCateById(this.value)">
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
                </table>
                <table id="tbl_data_2">
                </table>
            </form>
        </section>
    </center>
    <script type="text/javascript">
    function chFileBg(id) {
        val = document.getElementById('file' + id);
        if (val.value.trim().length !== 0) {
            $('#fileInd' + id).attr('class', 'fa fa-check');
        } else {
            $('#fileInd' + id).removeClass();
        }
    }

    function getCateById(x) {
        if (x.length !== 0) {
            performAjx('index.php', 'get',
                'controller=product&key=56013b2d598a413bc3dc7eec84b3e8880fe4f4136f4feff01e078254a520b37d&cid=' + x,
                (
                    res) => {
                    d = JSON.parse(res)
                    if (d.status) {
                        dis_msg_box('#000', 'lightgreen', d.message);
                        $('#tbl_data_2').empty();
                        $('#tbl_data_2').append(
                            '<tr><td>Category image<sup>*</sup></td><td><a href="assets/category_images/' + d
                            .data[0].cate_img +
                            '">View Old image</a><br>or<br><input type="file" id="file1" name="file1" onchange="chFileBg(1)">&nbsp;<span style="color:green" id="fileInd1"></span></td></tr><tr><td>Category Name<sup>*</sup></td><td><input type="text" id="cate_name" placeholder="Category name" value="' +
                            d
                            .data[0].cate_name +
                            '" name="cate_name"><input hidden type="text" value="' + d
                            .data[0].cate_id +
                            '" name="cate_id"><input hidden type="text" value="' + d
                            .data[0].cate_img +
                            '" name="cate_img"></td></tr><tr><td></td><td><input type="button" value="Update Category" style="background:lightgreen;width:100px" onclick="edit_cate()"></td></tr>'
                        );
                    } else {
                        dis_msg_box('#000', 'tomato', d.message);
                    }
                });
        }
    }

    function edit_cate() {
        if ($('#cate_name').val().trim().length == 0) {
            alert('Please enter category name')
        } else {
            performAjxForFiles('index.php', '#frm',
                '?controller=product&key=9b37f43780714806223752e0727ff1d34adcb20c0b2598a135a1ad9bd9be8f7f', (
                    res) => {
                    d = JSON.parse(res)
                    if (d.status) {
                        $('#frm')[0].reset();
                        $('#tbl_data_2').empty();
                        dis_msg_box('#000', 'lightgreen', d.message);
                    } else {
                        dis_msg_box('#000', 'tomato', d.message);
                    }
                });
        }
    }
    </script>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
</body>

</html>