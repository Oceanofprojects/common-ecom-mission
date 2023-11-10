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
//    require_once 'sections/header.php';
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
                        <th>Order ID</th>
                        <th>Amt-Proof</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12904</td>
                        <td>Edinburgh</td>
                        <td>128921h</td>
                        <td><a href="#">Image link</a></td>
                        <td>Complete</td>
                    </tr>
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