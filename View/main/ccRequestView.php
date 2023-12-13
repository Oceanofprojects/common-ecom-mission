<!DOCTYPE html>
<html lang="en" dir="ltr">

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <?php

    require_once 'Model/productModel.php';
    $productMdl = new products();
        if(isset($_GET['adDefCid']) && !empty($_GET['adDefCid'])){
            $id = $_GET['adDefCid'];
            $cusCart = $productMdl->mycart(base64_decode($_GET['adDefCid']));
            if($cusCart['status']){
                   $cusCart = $cusCart['data'];
            }else{
                $cusCart = [];
            }
        }else{
            $cusCart = [];
        }
    ?>
     <div class="mycart">
    <h4 style="text-align:right;background:red;padding:10px;margin:10px;color:#fff" class="fa fa-close"
        onclick="cls_my_cart()"></h4>
    <h1 align="center">Products</h1>
    <br>
    <center>

    &nbsp;&nbsp;<span>C-ID : <a href="#"><?php echo base64_decode($id);?></a></span><br>
    <br><input type="number" min="1" name="" placeholder="Enter Courier price" style="outline: none;"><input type="button" value="CC Price" name="" style="background:lightgreen;color:#000;border:.2px solid #555a;padding:0px 5px;outline: none;">
    <br>
    <br>
        <table id="jquery-datatable-example-no-configuration" class="display" style="width:90vw">
                <thead>
                    <tr>
                        <th>P-ID</th>
                        <th>Product</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for($i=0;$i<count($cusCart);$i++){
                        echo "<tr>
                    <td>{$cusCart[$i]['p_id']}</td><td>{$cusCart[$i]['p_name']}</td><td>{$cusCart[$i]['quantity']}</td>
                </tr>";
                    }


                    ?>

                </tbody>
    </table>
    </center>
</div>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#jquery-datatable-example-no-configuration').DataTable();
    });
$('.mycart').fadeIn(100);
    </script>


   
    <!-- Common message box  -->
    <div id="common_dis_msg_box">
        <div id="msg_content_to_display"></div>
    </div>
    <!-- Common message box  -->
    <br>
    <a href="#" onclick="history.back()"
        style="margin:10px;background:cornflowerblue;color:#fff;text-decoration:none;padding:10px;border-radius:5px;border:1px solid #555;">Back</a>

    <a href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
        style="margin:10px;background:cornflowerblue;color:#fff;text-decoration:none;padding:10px;border-radius:5px;border:1px solid #555;">Home</a>
    <br><br><br>
    <center>
        <h2>Customers Orders</h2>
        <section style="width:100%;overflow:scroll">
            <table id="jquery-datatable-example-no-configuration" class="display" style="width:100vw">
                <thead>
                    <tr>
                        <th>C-ID</th>
                        <th>CC Request</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if($data['data']['data'] !==0){
                    $res = $data['data']['data']; 
                    for($i=0;$i<count($res);$i++){
                          echo "<tr><td><a href='#'>{$res[$i]['cid']}</a></td><td><a href='#' onclick='getCusCart(document.URL,{$res[$i]['cid']})'>Product Details</a></td><td>{$res[$i]['req_date']}</td></tr>";
                    }
                }
                // controller=admin&cid={$res[$i]['cid']}&key=459a868460381fdf9a2bbb902e8bbc38cbd52f91860be724dafdec2a3fea415c
                ?>

                </tbody>
            </table>
        </section>
    </center>
    <script>
    function getCusCart(url,id){
        location.href= url.replace('key','&adDefCid='+btoa(id)+'&key');
    }
    </script>
</body>

</html>