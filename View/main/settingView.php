<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'];?></title>
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="Script/action.js"></script>
    <script src="Script/components.js"></script>
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <link rel="stylesheet" href="Style/global.css">


    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background:linear-gradient(#fffa,#fffa),url('assets/common-images/bg.png');
        background-position: center;
        background-attachment: fixed;
        background-size:300px;
    }

    .container {
        position: relative;
        max-width: 700px;
        width: 100%;
        background: #fff;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .container header {
        font-size: 1.5rem;
        color: #333;
        font-weight: 500;
        text-align: center;
    }

    .container .form {
        margin-top: 30px;
    }

    .form .input-box {
        width: 100%;
        margin-top: 20px;
    }

    .input-box label {
        color: #333;
    }

    .form :where(.input-box input, .select-box) {
        position: relative;
        height: 50px;
        width: 100%;
        outline: none;
        font-size: 1rem;
        color: #707070;
        margin-top: 8px;
        border: 1px solid #ddd;
        border-radius: 6px;
        padding: 0 15px;
    }

    .input-box input:focus {
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
    }

    .form .column {
        display: flex;
        column-gap: 15px;
    }

    .form .gender-box {
        margin-top: 20px;
    }

    .gender-box h3 {
        color: #333;
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;
    }

    .form :where(.gender-option, .gender) {
        display: flex;
        align-items: center;
        column-gap: 50px;
        flex-wrap: wrap;
    }

    .form .gender {
        column-gap: 5px;
    }

    .gender input {
        accent-color: rgb(130, 106, 251);
    }

    .form :where(.gender input, .gender label) {
        cursor: pointer;
    }

    .gender label {
        color: #707070;
    }

    .address :where(input, .select-box) {
        margin-top: 15px;
    }

    .select-box select {
        height: 100%;
        width: 100%;
        outline: none;
        border: none;
        color: #707070;
        font-size: 1rem;
    }

    .form #btn {
        height: 55px;
        width: 100%;
        color: #fff;
        font-size: 1rem;
        font-weight: 400;
        margin-top: 30px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        background: cornflowerblue;
        ;
    }

    .form #btn:hover {
        background: purple;
    }

    #dis_profile {
        height: 150px;
        width: 150px;
        border: 2px solid #555a;
        border-radius: 100px;
    }

    .profile_layer {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        padding: 10px;
    }

    .profile_layer img {
        border: 1px solid rgba(0, 0, 0, .5);
        height: 50px;
        width: 50px;
        border-radius: 100px;
    }

    .imp {
        color: red
    }

    /*Responsive*/
    @media screen and (max-width: 500px) {
        .form .column {
            flex-wrap: wrap;
        }

        .form :where(.gender-option, .gender) {
            row-gap: 15px;
        }
    }
    </style>
</head>

<body>
    <?php
    if(count($data['data']['data']) !==0){
      $cusData = $data['data']['data'][0];
    }else{
      die('Oops, Invaild user !.');
    }
    
    
    ?>
    <section class="container">
        <div style="text-align:right;">
            <a style="background:cornflowerblue;padding:10px;font-size:12pt;text-decoration:none;color:#123;border-radius:5px;"
                href="#" onclick="history.back()" class="fa fa-arrow-left"></a>&nbsp;|&nbsp;<a
                style="background:lightgreen;padding:10px;font-size:12pt;text-decoration:none;color:#123;border-radius:5px;"
                href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
                class="fa fa-home"></a>
        </div>
        <header>Account Edit</header>
        <form class="form" id="frm">
            <center>
                <img src="assets/common-images/profiles/<?php echo $cusData['profile'].'.jpg';?>" alt=""
                    id="dis_profile">
                <p style="padding:5px 0px;">Select Profile</p>
                <div class="profile_layer">
                    <img src="assets/common-images/profiles/pro1.jpg" alt="" onclick="changeProfile('pro1')">
                    <img src="assets/common-images/profiles/pro2.jpg" alt="" onclick="changeProfile('pro2')">
                    <img src="assets/common-images/profiles/pro3.jpg" alt="" onclick="changeProfile('pro3')">
                    <img src="assets/common-images/profiles/pro4.jpg" alt="" onclick="changeProfile('pro4')">
                    <img src="assets/common-images/profiles/pro5.jpg" alt="" onclick="changeProfile('pro5')">
                    <img src="assets/common-images/profiles/pro6.jpg" alt="" onclick="changeProfile('pro6')">
                </div>

            </center>
            <div class="input-box">
                <label>Full Name<sup class="imp">*</sup></label>
                <input type="text" placeholder="Enter full name" name="c_name" value="<?php echo $cusData['c_name'];?>"
                    required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contact Number<sup class="imp">*</sup></label>
                    <input type="number" placeholder="Enter phone number" name="ph_num" min="1"
                        value="<?php echo $cusData['ph_num'];?>" required />
                </div>
                <div class="input-box">
                    <label>Whatspp Number<sup class="imp">*</sup></label>
                    <input type="number" placeholder="Enter whatspp number"
                        value="<?php echo $cusData['whatsapp_num'];?>" name="whatsapp_num" min="1" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Email Address<sup class="imp">*</sup></label>
                    <input type="email" name="email" value="<?php echo $cusData['email'];?>"
                        placeholder="Enter email ID" />
                </div>
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <?php 
                $mchecked = '';
                $fchecked = '';
                $tbdchecked = '';
                if($cusData['c_gender'] == 'male'){
                  $mchecked = 'checked';
                }else if($cusData['c_gender'] == 'female'){
                  $fchecked = 'checked';
                }else{
                  $tbdchecked = 'checked';
                }
                ?>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" value="male" name="c_gender" <?php echo $mchecked;?> />
                        <label for="check-male">male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" value="female" name="c_gender" <?php echo $fchecked;?> />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" value="TBD" name="c_gender" <?php echo $tbdchecked;?> />
                        <label for="check-other">prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address<sup class="imp">*</sup></label>
                <input type="text" name="address_1" value="<?php echo $cusData['address_1'];?>"
                    placeholder="Enter street address" required />
                <input type="text" name="address_2" value="<?php echo $cusData['address_2'];?>"
                    placeholder="Enter street address line 2" required />
                <div class="column">
                    <input type="text" value="<?php echo $cusData['country'];?>" placeholder="Enter your Country"
                        name="country" />
                    <input type="text" value="<?php echo $cusData['state'];?>" placeholder="Enter your State"
                        name="state" />
                </div>
                <div class="column">
                    <input type="text" value="<?php echo $cusData['city'];?>" placeholder="Enter your city" name="city"
                        required />
                    <input type="number" value="<?php echo $cusData['pin_code'];?>" placeholder="Enter postal code"
                        min="1" name="pin_code" required />
                </div>
            </div>

            <br>
            <span style="padding:10px 0px" id="dis_err"></span>
            <input type="button" value="Save changes" id="btn" onclick="updtSetting()">
            <br><br>
            <input type="text" id="profile" name="profile" value="default" hidden>
        </form>
    </section>
    <script>
    function changeProfile(img_name) {
        $('#dis_profile').attr('src', 'assets/common-images/profiles/' + img_name + '.jpg');
        $('#profile').val(img_name);
    }
    </script>
</body>

</html>