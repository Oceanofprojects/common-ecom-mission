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

        <a href="index.php?controller=admin&key=f76543c3830696dbcdb775d38ebe9b6a763086d2a86be47c449c7b5a55f8d3e9"
        style="margin:10px;background:cornflowerblue;color:#fff;text-decoration:none;padding:10px;border-radius:5px;border:1px solid #555;">CC Request</a>

    <br><br><br>
    <center>
        <h2>Customers Orders</h2>
        <section style="width:100%;overflow:scroll">
            <table id="jquery-datatable-example-no-configuration" class="display" style="width:100vw">
                <thead>
                    <tr>
                        <th>C-ID</th>
                        <th>Customer</th>
                        <th>O-ID</th>
                        <th>Proof</th>
                        <th>Date</th>
                        <th>P-Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getStatusDP($status,$id){
                        $s  ='';
                        $pending = $s;
                        $confirmed = $s;
                        $arriving = $s;
                        $completed = $s;
                        $cancel = $s;
                        if(strpos($status,"Arriving") !== false){
                            $status = "Arriving";
                        }
                        switch($status){
                            case 'Pending':
                                $pending = 'selected';
                                break;
                            case 'Confirmed':
                                $confirmed = 'selected';    
                                break;
                            case 'Arriving':
                                $arriving = 'selected';   
                                break;
                            case 'Completed':    
                                $completed = 'selected';
                                break;
                            case 'Cancel':
                                $cancel = 'selected';    

                        }

                    return "<select onchange=\"chOrderStatus(this.value,$id)\" style=\"padding:5px;border-radius:5px; border:.3px solid rgba(0,0,0,.2)\"><option value=\"Pending\" $pending>Pending</option><option value=\"Confirmed\" $confirmed>Confirmed</option><option value=\"Arriving\" $arriving>Arriving</option><option value=\"Completed\" $completed>Completed</option><option value=\"Cancel\" $cancel>Cancel</option></select>";
                    }
                if($data['data'] !==0){
                    $res = $data['data']; 
                    for($i=0;$i<count($res);$i++){
                        echo "<tr><td><a href='index.php?key=1037d9ea3af16d70f0ce197f737e4ca6a3d1f436ce0365689334069ea9772565&cid=".base64_encode($res[$i]['cid'])."&controller=admin'>".$res[$i]['cid']."</a></td><td>".$res[$i]['name']."</td><td><a href='Invoice?invoice_id=".$res[$i]['order_id']."'>".$res[$i]['order_id']."</a></td><td><a href=\"assets/payment_proof_images/".$res[$i]['pay_proof']."\">Image link</a></td><td>".$res[$i]['cart_date']."</td><td>".getStatusDP($res[$i]['status'],"'".$res[$i]['order_id']."'")."</td></tr>";
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