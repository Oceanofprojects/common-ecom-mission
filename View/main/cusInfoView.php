<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
        <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <title><?php echo $data['title'];?></title>
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
<style type="text/css">
    table{
        width:90%;
        min-width:200px;
    }
    td{
        border-bottom:1px solid #000a;
        padding:10px 0px;
        font-weight:  bolder;
    }
</style>
</head>

<body>
    <?php
    // print_r($data);
    if(count($data['data']['data'])!==0){
        $cusdata = $data['data']['data'][0];
    }else{
        die("Invaild customer");
    }
    ?>
    <br>
        <a href="#" onclick="history.back()"
        style="margin:10px;background:cornflowerblue;color:#fff;text-decoration:none;padding:10px;border-radius:5px;border:1px solid #555;">Back</a>
    <br><br>

    <center>
        <h2>User Details</h2>
        <br><br>
        <form id="frm">
            <table>
                <tr>
                    <td>Type</td>
                    <td><?php echo $cusdata['role'];?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo $cusdata['c_name'];?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $cusdata['email'];?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><?php echo $cusdata['address_1'].' '.$cusdata['address_2'];?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $cusdata['ph_num'];?></td>
                </tr>
                <tr>
                    <td>Whatsapp</td>
                    <td><?php echo $cusdata['whatsapp_num'];?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td><?php echo $cusdata['country'];?></td>
                </tr>
                <tr>
                    <td>State</td>
                    <td><?php echo $cusdata['state'];?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><?php echo $cusdata['city'];?></td>
                </tr>
                <tr>
                    <td>Pin code</td>
                    <td><?php echo $cusdata['pin_code'];?>
                    <input type="hidden" value="<?php echo base64_decode($_GET['cid']);?>" name="cusid">     
                </td>
                </tr>
                <tr>
                    <td>Account IN</td>
                    <td>
                        <select name="role">
                        <?php
                            echo "<option value=\"\">Select Role</option><option value=\"".$cusdata['role']."\">Admin</option>
                            <option value=\"customer\">Customer</option><option value=\"block\">Block</option>";                         
                        ?>
                        </select>        
                    </td>
                </tr>
                <tr>
                    <td>Account Pwd (tmp-c)</td>
                    <td><input type="text" name="pwd" placeholder="Enter New password"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="button" style="background:lightgreen;color:#000;border:1px solid #000a;padding:5px 10px;border-radius:5px;" value="Update" onclick="updateCusFAdmin()"></td>
                </tr>
            </table>
        </form>
    </center>
    <br><br><br>
    <script>
         function updateCusFAdmin() {
            performAjx('index.php', 'get','key=dd429394ab115426a0942880d4652f3a4c355038601099f96dad3c63707cf630&controller=admin&'+$('#frm').serialize(), (res) => {
    d = JSON.parse(res);
    if(d.status){
      alert(d.message);
    }else{
      alert(d.message);
    }
  });
        }
    </script>   
</body>

</html>