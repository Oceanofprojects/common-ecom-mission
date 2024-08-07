<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/common-images/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/common-images/logo.png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Customers Registration Form</title>
    <script src="Script/action.js"></script>
    <script src="Script/commonScript.js"></script>
    <script src="Script/jquery.min.js"></script>
    <link rel="stylesheet" href="Style/global.css">
    <?php
    require_once 'sections/msg_bot.php';
    ?>

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
      background:rgba(0,0,0,.3);

        background-position: center;
        background-attachment: fixed;
        background-size: 200px;
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
    #video-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  z-index: -1;
}
    </style>
</head>

<body>
<video id="video-background" autoplay loop muted>
  <source src="assets/videos/bg/flower_garden.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
    <section class="container">
        <div style="text-align:right;">
            <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;"
                href="index.php?controller=home&key=723502982ca5d2790c1f9464af3613117a3bd4e55ee0a68b6c29ab76d23b71b6"
                class="fa fa-home" id="signup-btn"></a>
            |
            <a style="font-size:12pt;text-decoration:none;color:#123;padding:0px 5px;"
                href="index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home"
                class="fa fa-sign-in"></a>
        </div>
        <header>Registration Form</header>
        <?=$data['data']['form'];?>
    </section>
    <script>
    function changeProfile(img_name) {
        $('#dis_profile').attr('src', 'assets/common-images/profiles/' + img_name + '.jpg');
        $('#profile').val(img_name);
    }
    </script>
</body>

</html>