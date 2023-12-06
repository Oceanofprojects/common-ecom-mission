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
    ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#jquery-datatable-example-no-configuration').DataTable();
    });
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
        <h2>My Products</h2>
        <section style="width:100%;overflow:scroll">
            <table id="jquery-datatable-example-no-configuration" class="display" style="width:100vw">
                <thead>
                    <tr>
                        <th>P-ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Stock</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                if($data['data']['data'] !==0){
                    $res = $data['data']['data']; 
                    for($i=0;$i<count($res);$i++){
                        echo "<tr><td>".$res[$i]['p_id']."</td><td>".$res[$i]['p_name']."</td><td><a href='index.php?cate_id=8M3GKFG6&controller=product&action=index&key=ad2b90dede1c27608c507b022e625e0438288dd764529ec92be67f1f531aa6b7&cate_id=".$res[$i]['cate_id']."'>".$res[$i]['cate_id']."</a></td><td>".$res[$i]['price']."</td><td>".$res[$i]['unit']."</td><td>".$res[$i]['stock']."</td><td><a class='fa fa-edit' style='text-decoration:none;color:#555;' href='index.php?key=38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9&autofill=true&controller=product&p_id=".$res[$i]['p_id']."'></a>&nbsp;|&nbsp;<a class='fa fa-trash' style='text-decoration:none;color:#555;' href='index.php?key=38995a9cbf149b6a419df041c712461588b48044896138242e8df4efc48540c9&autofill=true&controller=product&p_id=".$res[$i]['p_id']."'></a></td></tr>";
                    }
                }else{
                    echo "<tr><td>Zero fetch !</td></tr>";
                }
                ?>

                </tbody>
            </table>
        </section>
    </center>
    <script>
    function chOrderStatus(status, orderID) {
        D_date = '';
        if (status == 'Arriving') {
            d = prompt("Please enter delivery date.");
            D_date = '&Ddate=' + d;
        }
        performAjx('index.php', 'get', 'controller=admin&status=' + status + '&oid=' + orderID +
            '&key=7c35d887870e6b7d6a0d6f4a2d4df801896957514ebe82ef0c20e34e4a114a58' + D_date, (res) => {
                d = JSON.parse(res)
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
//    require_once 'sections/footer.php';
    ?>
</body>

</html>