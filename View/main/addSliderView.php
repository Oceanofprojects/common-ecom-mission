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

</head>
  <body>
    <?php
    require_once 'sections/header.php';
    ?>
    <br><br><br>
    <style media="screen">
      .file{
        width:100px;
        position: relative;
        top:0px;left:0px;
        margin: 10px 0px;
        padding:10px;
      }
      .file:after {
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
      .file input{
        opacity:0;
      }
      form{
        background: #fff;
        border:.2px solid #ddda;
        box-shadow: 0px 0px 15px 0px rgba(0,0,0,.2);
        border-radius: 5px;
        width:50%;
        min-width: 200px;
      }
.btn{
  background:darkorange
}


    </style>
    <center>

<form id="frm">
  <br>
  <h1>Select 5 Images</h1><br>
  <p>That's displayed on main page slider</p>
  <br>
    <table>
      <tr>
        <td>
            <input class="file" type="file" id="file1" name="file1" onchange="chFileBg(1)">
            &nbsp;<span style="color:green" id="fileInd1"></span>
        </td>
      </tr>

      <tr>
        <td>
            <input class="file" type="file" id="file2" name="file2" onchange="chFileBg(2)">
            &nbsp;<span style="color:green" id="fileInd2"></span>
        </td>
      </tr>

      <tr>
        <td>
            <input class="file" type="file" id="file3" name="file3" onchange="chFileBg(3)">
            &nbsp;<span style="color:green" id="fileInd3"></span>
        </td>
      </tr>

      <tr>
        <td>
            <input class="file" type="file" id="file4" name="file4" onchange="chFileBg(4)">
            &nbsp;<span style="color:green" id="fileInd4"></span>
        </td>
      </tr>

      <tr>
        <td>
            <input class="file" type="file" id="file5" name="file5" onchange="chFileBg(5)">
            &nbsp;<span style="color:green" id="fileInd5"></span>
        </td>
      </tr>
      <tr>
        <td>
            <input type="button"  class="btn" value="Upload slides" onclick="addSlider()">
        </td>
      </tr>

    </table><br>
  </form>
  <script type="text/javascript">
  var emty=true;
    function addSlider(){
        if(document.getElementById('file1').value.trim()=='' && document.getElementById('file2').value.trim()=='' && document.getElementById('file3').value.trim()=='' && document.getElementById('file4').value.trim()=='' && document.getElementById('file5').value.trim()==''){
          alert('please select image')
        }else{
          performAjxForFiles('index.php', '#frm','?controller=product&key=06cf9d50a03b1b7d984c648462117691f8701fe1db50a5ccb27372e81fcc5fb4', (res) => {
            d = JSON.parse(res)
            if(d.status){
              dis_msg_box('#000','lightgreen',d.message);
            }else{
              dis_msg_box('#000','tomato',d.message);
            }
          });
        }
    }
  </script>
  </center>
    <br><br><br>
    <?php
    require_once 'sections/footer.php';
    ?>
  </body>
</html>
