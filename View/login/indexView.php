<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title><?=$data['title']?></title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require_once 'sections/msg_bot.php';
    ?>

     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="Script/action.js"></script>
    <script src="Script/commonScript.js"></script>
     <style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
html, body{
  display: grid;
  height: 100vh;
  width: 100%;
  place-items: center;
background:linear-gradient(rgba(256,256,256,.8),rgba(256,256,256,.8)),url('assets/common-images/bg.png');
background-position: center;
background-attachment: fixed;
        background-size: 200px;
}
::selection{
  background: #ff80bf;

}
.container{
  background: #fff;
  max-width: 350px;
  width: 100%;
  padding: 25px 30px;
  border-radius: 5px;
  border:1px solid rgba(0,0,0,.3);
  box-shadow: 0 10px 10px rgba(0, 10, 0, 0.15);
}
.container form .title{
  font-size: 30px;
  font-weight: 600;
  margin: 20px 0 10px 0;
  position: relative;
}
.container form .title:before{
  content: '';
  position: absolute;
  height: 4px;
  width: 33px;
  left: 0px;
  bottom: 3px;
  border-radius: 5px;
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
}
.container form .input-box{
  width: 100%;
  height: 45px;
  margin-top: 25px;
  position: relative;
}
.container form .input-box input{
  width: 100%;
  height: 100%;
  outline: none;
  font-size: 16px;
  border: none;
}
.container form .underline::before{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  background: #ccc;
  left: 0;
  bottom: 0;
}
.container form .underline::after{
  content: '';
  position: absolute;
  height: 2px;
  width: 100%;
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
  left: 0;
  bottom: 0;
  transform: scaleX(0);
  transform-origin: left;
  transition: all 0.3s ease;
}
.container form .input-box input:focus ~ .underline::after,
.container form .input-box input:valid ~ .underline::after{
  transform: scaleX(1);
  transform-origin: left;
}
/* .container form .button{
  margin: 40px 0 20px 0;
} */
/* .container .input-box input[type="submit"]{
  background: linear-gradient(to right, #99004d 0%, #ff0080 100%);
  font-size: 17px;
  color: #fff;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s ease;
}
.container .input-box input[type="submit"]:hover{
  letter-spacing: 1px;
  background: linear-gradient(to left, #99004d 0%, #ff0080 100%);
} */
.container .option{
  font-size: 14px;
  text-align: center;
}
.container .facebook a,
.container .twitter a{
  display: block;
  height: 45px;
  width: 100%;
  font-size: 15px;
  text-decoration: none;
  padding-left: 20px;
  line-height: 45px;
  color: #fff;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.container .facebook i,
.container .twitter i{
  padding-right: 12px;
  font-size: 20px;
}
.container .twitter a{
  background: linear-gradient(to right,  #00acee 0%, #1abeff 100%);
  margin: 20px 0 15px 0;
}
.container .twitter a:hover{
  background: linear-gradient(to left,  #00acee 0%, #1abeff 100%);
  margin: 20px 0 15px 0;
}
.container .facebook a{
  background: linear-gradient( to right,  #3b5998 0%, #476bb8 100%);
  margin: 20px 0 50px 0;
}
.container .facebook a:hover{
  background: linear-gradient( to left,  #3b5998 0%, #476bb8 100%);
  margin: 20px 0 50px 0;
}

     </style>
  </head>
  <body>
    <div class="container">
      <div style="text-align:right;">
      <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;" href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6" class="fa fa-home"></a>
      |
      <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;" href="index.php?key=7ab9f0816f33d9932efd3468b387bd287546f9ee276cc0d53f75336761a9959d&controller=home" class="fa fa-user-plus"></a>
      </div>
      <?=$data['data']['form']?>
      <!-- <form action="#" class="form" id="frm">
        <div class="title">Login</div>
        <br>
        <p style="color:tomato" id="dis_err"></p>
        <div class="input-box underline">
          <input type="text" name="cus_idnty" id="cus_idnty" placeholder="Enter CID or Email or Name or ph num" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" name="pwd" id="pwd" placeholder="Enter Your Password" required>
          <div class="underline"></div>
        </div>
        <br>
        <div class="option"><a href="">Forgot password</a></div>
        <div class="input-box button">
          <input type="button" style="background:cornflowerblue" class="btn" value="Login" onclick="login()">
        </div>
                <br>
                <div class="option">New user? Please <a href="index.php?key=7ab9f0816f33d9932efd3468b387bd287546f9ee276cc0d53f75336761a9959d&controller=home">Signup</a></div>
      </form> -->
      
    </div>
  </body>
</html>