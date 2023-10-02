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
<style media="screen">
.btn{
padding:10px;
margin:2px;
border:1px solid rgba(0, 0, 0, .1);
border-radius: 3px;
background:rgba(0, 0, 0, .1);
}
.btn:hover{
cursor: pointer;
background:rgba(0, 0, 0, .4);
color:#fff;
}
table{
border-collapse: collapse;
}
td{
border-bottom:.8px solid rgba(0, 0, 0, .2);padding: 10px 5px;
}
input,select,textarea{
width:100%;
padding:10px 0px;
border:none;
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
#tmp_img_viewer,#check_box_label{
display: none;
}
sup{
  color:red
}
</style>
</head>

<body>
  <div id="common_dis_msg_box">
      <div id="msg_content_to_display"></div>
    </div>
  <br><br>
  <h1 align="center">Add Product</h1>
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
      <td>Category<sup>*</sup></td>
      <td><input type="text" id="key" name="key" value="5265dbb8b63da8f3da8c145702deae1954a7224a585014f0bbc3086a6e499ef6" hidden>
        <select id="cate_name" name="cate_name">
          <?php
          if(count($data['data']['data']) !== 0){
            echo "<option value=''>Select cate list</option>";
            for($i=0;$i<count($data['data']['data']);$i++){
              echo "<option value='".$data['data']['data'][$i]['cate']."'>".$data['data']['data'][$i]['cate']."</option>";
            }
          }else{
            echo "<option value=''>Select cate list</option><option value=''>Empty</option>";
          }
           ?>
        </select></td>
    </tr>
    <tr>
      <td>image<sup>*</sup></td>
      <td><input type="text" id="old_img_name" name="old_img_name" hidden><input type="text" name="hidden_img_indi" id="hidden_img_indi" hidden><input type="file" id="file" name="file"><label id="check_box_label"><input type="checkbox" id="img_indi" name="img_indi" value="yes" style="width:25px">Upload new image </label><br><a href="#" id="tmp_img_viewer">Tap to view old Image</a></td>
    </tr>
    <tr>
      <td>Name<sup>*</sup></td>
      <td><input type="text"  id="p_name" placeholder="Product name"  name="p_name" ></td>
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
      <td><input type="number" name="stock"  id="stock" placeholder="Product Stock" min="0"  ></td>
    </tr>
    <tr>
      <td>Tag<sup>*</sup></td>
      <td><textarea placeholder="Enter keywords, Tags, Identity..."  id="tags" name="tags"></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="button" id="add_item_btn" value="Add Product" style="background:lightgreen;width:100px" onclick="add_item('')"></td>
    </tr>
  </table>
</form>
</section>
</center>
</body>
</html>
