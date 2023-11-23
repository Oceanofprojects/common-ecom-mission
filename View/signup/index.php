<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Customers Registration Form</title>
    <script src="../../Script/action.js"></script>
    <script src="../../Script/commonScript.js"></script>
    <script src="../../Script/jquery.min.js"></script>
    <link rel="stylesheet" href="../../Style/global.css">


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
        background:linear-gradient(rgba(256,256,256,.8),rgba(256,256,256,.8)),url('../../assets/common-images/bg.png');
        background-position: center;
        background-attachment: fixed;
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
    <section class="container">
        <div style="text-align:right;">
            <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;"
                href="../../index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
                class="fa fa-home"></a>
            |
            <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;"
                href="../../index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home"
                class="fa fa-sign-in"></a>
        </div>
        <header>Registration Form</header>
        <form action="../../index.php" class="form" id="frm">
            <center>
                <img src="../../assets/common-images/profiles/default.jpg" alt="" id="dis_profile">
                <p style="padding:5px 0px;">Select Profile</p>
                <div class="profile_layer">
                    <img src="../../assets/common-images/profiles/pro1.jpg" alt="" onclick="changeProfile('pro1')">
                    <img src="../../assets/common-images/profiles/pro2.jpg" alt="" onclick="changeProfile('pro2')">
                    <img src="../../assets/common-images/profiles/pro3.jpg" alt="" onclick="changeProfile('pro3')">
                    <img src="../../assets/common-images/profiles/pro4.jpg" alt="" onclick="changeProfile('pro4')">
                    <img src="../../assets/common-images/profiles/pro5.jpg" alt="" onclick="changeProfile('pro5')">
                    <img src="../../assets/common-images/profiles/pro6.jpg" alt="" onclick="changeProfile('pro6')">
                </div>

            </center>
            <div class="input-box">
                <label>Full Name<sup class="imp">*</sup></label>
                <input type="text" placeholder="Enter full name" name="c_name" required />
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Contact Number<sup class="imp">*</sup></label>
                    <input type="number" placeholder="Enter phone number" name="ph_num" min="1" required />
                </div>
                <div class="input-box">
                    <label>Whatspp Number<sup class="imp">*</sup></label>
                    <input type="number" placeholder="Enter whatspp number" name="whatsapp_num" min="1" />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Email Address<sup class="imp">*</sup></label>
                    <input type="email" name="email" placeholder="Enter email ID" />
                </div>
            </div>

            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" value="male" name="c_gender" checked />
                        <label for="check-male">male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" value="female" name="c_gender" />
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" value="TBD" name="c_gender" />
                        <label for="check-other">prefer not to say</label>
                    </div>
                </div>
            </div>
            <div class="input-box address">
                <label>Address<sup class="imp">*</sup></label>
                <input type="text" name="address_1" placeholder="Enter street address" required />
                <input type="text" name="address_2" placeholder="Enter street address line 2" required />
                <div class="column">
                    <input type="text" placeholder="Enter your Country" name="country" />
                    <input type="text" placeholder="Enter your State" name="state" />
                </div>
                <div class="column">
                    <input type="text" placeholder="Enter your city" name="city" required />
                    <input type="number" placeholder="Enter postal code" min="1" name="pin_code" required />
                </div>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Password<sup class="imp">*</sup></label>
                    <input type="password" name="pwd" placeholder="Enter new password for account" required />
                </div>
                <div class="input-box">
                    <label>Confirm password<sup class="imp">*</sup></label>
                    <input type="password" name="con_pwd" placeholder="Enter confirm password for account" required />
                </div>
            </div><br>
            <span style="padding:10px 0px" id="dis_err"></span>
            <input type="button" value="Signup" id="btn" onclick="signup()">
            <br><br>
            <p align="center">Already resgistered?, Please <a
                    href="../../index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home">login</a>
            </p>
            <input type="text" id="profile" name="profile" value="default" hidden>
        </form>
    </section>
    <script>
    function changeProfile(img_name) {
        $('#dis_profile').attr('src', '../../assets/common-images/profiles/' + img_name + '.jpg');
        $('#profile').val(img_name);
    }
    </script>
</body>

</html>