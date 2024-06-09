<?php


//session_start();

class form
{
    public $form_type;
    public $mask_params;
    public function __construct()
    {
        $this->mask_params = [
            'login_form' => [
                'mask_param' => [
                    'data-plate-1' => 'cus_idnty',
                    'data-plate-2' => 'pwd',
                ],
                'param' => [
                    'cus_idnty' => 'data-plate-1',
                    'pwd' => 'data-plate-2',
                ]
            ],
            'signin_form' => [
                'mask_param' => [
                    'data-plate-1' => 'c_name',
                    'data-plate-2' => 'ph_num',
                    'data-plate-3' => 'whatsapp_num',
                    'data-plate-4' => 'email',
                    'data-plate-5' => 'c_gender',
                    'data-plate-6' => 'address_1',
                    'data-plate-7' => 'address_2',
                    'data-plate-8' => 'country',
                    'data-plate-9' => 'state',
                    'data-plate-10' => 'city',
                    'data-plate-11' => 'pin_code',
                    'data-plate-12' => 'pwd',
                    'data-plate-13' => 'con_pwd',
                    'data-plate-14' => 'profile'                    
                ],
                'param' => [
                    'c_name'=>'data-plate-1',
                    'ph_num'=>'data-plate-2',
                    'whatsapp_num'=>'data-plate-3',
                    'email'=>'data-plate-4',
                    'c_gender'=>'data-plate-5',
                    'address_1'=>'data-plate-6',
                    'address_2'=>'data-plate-7',
                    'country'=>'data-plate-8',
                    'state'=>'data-plate-9',
                    'city'=>'data-plate-10',
                    'pin_code'=>'data-plate-11',
                    'pwd'=>'data-plate-12',
                    'con_pwd'=>'data-plate-13',
                    'profile'=>'data-plate-14'
                ]
            ]

        ];
    }

    public function field_lock($value)
    {
        if (isset($this->mask_params[$this->form_type]['param'][$value])) {
            return $this->mask_params[$this->form_type]['param'][$value];
        } else {
            die("undefined data-plates ($value)");
        }
    }
    public function form_templates()
    {
        $ele = null;
        switch ($this->form_type) {
            case 'login_form':
                $ele =  '<form action="#" class="form" id="frm">
                <div class="title">Login</div>
                <br>
                <p style="color:tomato" id="dis_err"></p>
                <div class="input-box underline">
                  <input type="text" name="'.$this->field_lock('cus_idnty').'" id="cus_idnty" placeholder="Enter CID or Email or Name or ph num" required>
                  <div class="underline"></div>
                </div>
                <div class="input-box">
                  <input type="password" name="'.$this->field_lock('pwd').'" id="pwd" placeholder="Enter Your Password" required>
                  <div class="underline"></div>
                </div>
                <br>
                <div class="option"><a href="">Forgot password</a></div>
                <div class="input-box button">
                  <input type="button" style="background:cornflowerblue" class="btn" value="Login" onclick="login()">
                </div>
                        <br>
                        <div class="option">New user? Please <a href="index.php?key=7ab9f0816f33d9932efd3468b387bd287546f9ee276cc0d53f75336761a9959d&controller=home">Signup</a></div>
              </form>';
                break;
            case 'signin_form':
                $ele = '<form class="form" id="frm">
                <center>
                    <img src="assets/common-images/profiles/default.jpg" alt="" id="dis_profile">
                    <p style="padding:5px 0px;">Select Profile</p>
                    <div class="profile_layer">
                        <img src="assets/common-images/profiles/pro1.jpg" alt="" onclick="changeProfile(\'pro1\')">
                        <img src="assets/common-images/profiles/pro2.jpg" alt="" onclick="changeProfile(\'pro2\')">
                        <img src="assets/common-images/profiles/pro3.jpg" alt="" onclick="changeProfile(\'pro3\')">
                        <img src="assets/common-images/profiles/pro4.jpg" alt="" onclick="changeProfile(\'pro4\')">
                        <img src="assets/common-images/profiles/pro5.jpg" alt="" onclick="changeProfile(\'pro5\')">
                        <img src="assets/common-images/profiles/pro6.jpg" alt="" onclick="changeProfile(\'pro6\')">
                    </div>
    
                </center>
                <div class="input-box">
                    <label>Full Name<sup class="imp">*</sup></label>
                    <input type="text" placeholder="Enter full name" name="'.$this->field_lock('c_name').'" required />
                </div>
    
                <div class="column">
                    <div class="input-box">
                        <label>Contact Number<sup class="imp">*</sup></label>
                        <input type="number" placeholder="Enter phone number" name="'.$this->field_lock('ph_num').'" min="1" required />
                    </div>
                    <div class="input-box">
                        <label>Whatspp Number<sup class="imp">*</sup></label>
                        <input type="number" placeholder="Enter whatspp number" name="'.$this->field_lock('whatsapp_num').'" min="1" />
                    </div>
                </div>
    
                <div class="column">
                    <div class="input-box">
                        <label>Email Address<sup class="imp">*</sup></label>
                        <input type="email" name="'.$this->field_lock('email').'" placeholder="Enter email ID" />
                    </div>
                </div>
    
                <div class="gender-box">
                    <h3>Gender</h3>
                    <div class="gender-option">
                        <div class="gender">
                            <input type="radio" id="check-male" value="male" name="'.$this->field_lock('c_gender').'" checked />
                            <label for="check-male">male</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-female" value="female" name="'.$this->field_lock('c_gender').'" />
                            <label for="check-female">Female</label>
                        </div>
                        <div class="gender">
                            <input type="radio" id="check-other" value="TBD" name="'.$this->field_lock('c_gender').'" />
                            <label for="check-other">prefer not to say</label>
                        </div>
                    </div>
                </div>
                <div class="input-box address">
                    <label>Address<sup class="imp">*</sup></label>
                    <input type="text" name="'.$this->field_lock('address_1').'" placeholder="Enter street address" required />
                    <input type="text" name="'.$this->field_lock('address_2').'" placeholder="Enter street address line 2" required />
                    <div class="column">
                        <input type="text" placeholder="Enter your Country" name="'.$this->field_lock('country').'" />
                        <input type="text" placeholder="Enter your State" name="'.$this->field_lock('state').'" />
                    </div>
                    <div class="column">
                        <input type="text" placeholder="Enter your city" name="'.$this->field_lock('city').'" required />
                        <input type="number" placeholder="Enter postal code" min="1" name="'.$this->field_lock('pin_code').'" required />
                    </div>
                </div>
    
                <div class="column">
                    <div class="input-box">
                        <label>Password<sup class="imp">*</sup></label>
                        <input type="password" name="'.$this->field_lock('pwd').'" placeholder="Enter new password for account" required />
                    </div>
                    <div class="input-box">
                        <label>Confirm password<sup class="imp">*</sup></label>
                        <input type="password" name="'.$this->field_lock('con_pwd').'" placeholder="Enter confirm password for account" required />
                    </div>
                </div><br>
                <span style="padding:10px 0px" id="dis_err"></span>
                <input type="button" value="Signup" id="btn" onclick="signup()">
                <br><br>
                <p align="center">Already resgistered?, Please <a
                        href="index.php?key=f01f773c6da80db08b2b3150fe2f0dcdb68ab5d8c0caa5fa9517e75b7896fdc3&controller=home">login</a>
                </p>
                <input type="text" id="profile" name="'.$this->field_lock('profile').'" value="default" hidden>
            </form>';    
            break;
        }
        return $ele;//Return form UI
    }

    public function makeForm()
    {
        return $this->form_templates();
    }

    public function getForm()
    {
        if (isset($_SESSION['FRM_SESSION'])) {
            if (!$this->is_form_expired($_SESSION['FRM_SESSION'])) {
                return $this->makeForm();
            } else {
                unset($_SESSION['FRM_SESSION']);
                return 'Form token expired!, Please refresh the page !.';
            }
        } else {
            $_SESSION['FRM_SESSION'] = date('Y-m-d H:i:s');
            return $this->makeForm();
        }
    }

    private function is_form_expired($time)
    {
        $date = date_create($time);
        $date1 = date_create(date('Y-m-d H:i:s'));
        $diff = date_diff($date, $date1);
        if ($diff->i >= 30) {//Form valid for 10 minutes
            return true;
        } else {
            return false;
        }
    }

    public function validate_form_field($req)
    {
        if (isset($_SESSION['FRM_SESSION'])) {
            if ($this->is_form_expired($_SESSION['FRM_SESSION'])) {
                unset($_SESSION['FRM_SESSION']);
                return 'Form token expired!, Please refresh the page !.';
            }
        }

        $myreq = [];
        $data_plate = [];
        $req_form_key = array_keys($req);
        $plate_form_key = array_keys($this->mask_params[$this->form_type]['mask_param']);

        foreach ($req_form_key as $key => $val) {
            if (isset($this->mask_params[$this->form_type]['mask_param'][$val])) {
                $ab_val = $this->mask_params[$this->form_type]['mask_param'][$val];
                $data_plate[] = $val;
                $myreq = array_merge($myreq, [$ab_val => $req[$val]]);
            }
        }
        if (count($data_plate) == count($this->mask_params[$this->form_type]['mask_param'])) {
            return $myreq;
        } else {
            die('Form chain broked some where, Missing::'.implode(',',array_diff($plate_form_key,$data_plate)));
        }
    }
}

