<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title><?php echo $data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

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
    <br><br><br>
    <center>
        <h2>Customers Orders</h2>
        <section>
            <table id="jquery-datatable-example-no-configuration" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>C-ID</th>
                        <th>Customer</th>
                        <th>Or ID</th>
                        <th>Amt-Proof</th>
                        <th>Date</th>
                        <th>P-Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    function getStatusDP($status){
                        $s  ='';
                        $pending = $s;
                        $confirmed = $s;
                        $arriving = $s;
                        $completed = $s;
                        $cancel = $s;
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

                    return "<select style=\"padding:5px;border-radius:5px; border:.3px solid rgba(0,0,0,.2)\"><option value=\"Pending\" $pending>Pending</option><option value=\"Confirmed\" $confirmed>Confirmed</option><option value=\"Arriving\" $arriving>Arriving</option><option value=\"Completed\" $completed>Completed</option><option value=\"Cancel\" $cancel>Cancel</option></select>";
                    }
                if($data['data'] !==0){
                    $res = $data['data']; 
                    for($i=0;$i<count($res);$i++){
                        echo "<tr><td><a href='index.php?key=1037d9ea3af16d70f0ce197f737e4ca6a3d1f436ce0365689334069ea9772565&cid=".$res[$i]['cid']."&controller=admin'>".$res[$i]['cid']."</a></td><td>".$res[$i]['name']."</td><td>".$res[$i]['order_id']."</td><td><a href=\"assets/payment_proof_images/".$res[$i]['pay_proof']."\">Image link</a></td><td>".$res[$i]['cart_date']."</td><td>".getStatusDP($res[$i]['status'])."</td></tr>";
                    }
                }else{
                    echo "<tr><td>Zero fetch !</td></tr>";
                }
                ?>

                </tbody>
            </table>
        </section>
    </center>
    <br><br><br>
    <?php
//    require_once 'sections/footer.php';
    ?>
</body>

</html>