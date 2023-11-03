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
    ?>

    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <br><br>
    <h1 align="center">Add Category</h1>
    <br><br>
    <center>
        <!-- <div class="search">
    <input type="text" name="" id="search" list="product_names" placeholder="Search Product here">
    <span class="fa fa-search" onclick="get_for_edit()"></span>
  </div>
  <datalist id="product_names">
  </datalist> -->
        <section>
            <form id="frm" action="" enctype="multipart/form-data">
                <table id="tbl_data_1">

                    <tr>
                        <td>Category image<sup>*</sup></td>
                        <td><input type="file" id="file1" name="file1" onchange="chFileBg(1)">
                            &nbsp;<span style="color:green" id="fileInd1"></span>

                        </td>
                    </tr>
                    <tr>
                        <td>Category Name<sup>*</sup></td>
                        <td><input type="text" id="cate_name" placeholder="Category name" name="cate_name"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="button" value="Add Category"
                                style="background:lightgreen;width:100px" onclick="add_cate()"></td>
                    </tr>
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

    function add_cate(){
      if(document.getElementById('file1').value.trim()==''){
        alert('Please select category image')
      }else if($('#cate_name').val().trim().length == 0){
        alert('Please enter category name')
      }else{
        performAjxForFiles('index.php','#frm','?controller=product&key=d8a0a704007a2b8495506d206e5601379069a624066a86d9584f4906564b192a', (res) => {
          d = JSON.parse(res)
          if(d.status){
            $('#frm')[0].reset();
            dis_msg_box('#000','lightgreen',d.message);
          }else{
            dis_msg_box('#000','tomato',d.message);
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
