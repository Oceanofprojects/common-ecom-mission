<?php 
class commonController{
    /**
    * Create the view that we pass to it with the indicated data.
    *
    */
    public function view($view,$data){
        $data = $data;
        require_once  __DIR__ . "/../View/" . $view . "View.php";
    }

    public function autoValidate($data,$validateArgs){
        if(count($validateArgs)){
            $vaildateResponse = $this->validate($data,$validateArgs);
            if($vaildateResponse[0]['status']){
                 return $this->validateResults;//OVER VALIDATION ARRAYS
            }else{
                return $vaildateResponse;//VALIDATION RESPONSE(IF FALSE)
            }
        }else{
            return [['status'=>true,'msg'=>'Condition arr empty','validateFlag'=>true]];
        }
    }
    
        public function validate($data,$validateArgs){
                for($j = 0;$j < count($validateArgs);$j++){
                    /*VALIDATE ARGS
                        validateArgs - 0 //FIELD
                        validateArgs - 1//VALIDATE ARGS
                        validateArgs - 2//VALIDATE ARGS VALUE 
                        */
                        if($validateArgs[$j][1] == 'checkMinLength'){
                            if(strlen(str_replace(' ','',$data[$validateArgs[$j][0]])) < $validateArgs[$j][2]){//CHECKING SIZE
                                return [['status'=>false,'msg'=>'Please Enter '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]).', Min length '.$validateArgs[$j][2].' characters','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }else{
                                array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }
                        }
                        else if($validateArgs[$j][1] == 'checkMaxLength'){
                            if(strlen(str_replace(' ','',$data[$validateArgs[$j][0]])) > $validateArgs[$j][2]){//CHECKING SIZE
                                return [['status'=>false,'msg'=>'Please Enter '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]).', Max length','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }else{
                                array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }
                        }else if($validateArgs[$j][1] == 'checkLengthMust'){//LENGTH MUST
                            if(strlen(str_replace(' ','',$data[$validateArgs[$j][0]])) >= $validateArgs[$j][2]){
                                array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }else{
                            return [['status'=>false,'msg'=>'Please Enter '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]).', Required Must '.$validateArgs[$j][2].' Characters/Digit.','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }
                        }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isStr'){//isStr
                            if(preg_match('@[0-9]@',str_split(str_replace(' ','',$data[$validateArgs[$j][0]]))[0]) || preg_match('@[^\w]@',str_split(str_replace(' ','',$data[$validateArgs[$j][0]]))[0]) || preg_match('@[_]@',str_split(str_replace(' ','',$data[$validateArgs[$j][0]]))[0])){
                            return [['status'=>false,'msg'=>$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]).', Please check first character (0-9, Special chars) not allowed','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }else{
                                array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }
                        }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isNotContainSpecialChars'){//IS HAVING ANY SEPCIAL CHARACTERS
                        if(!preg_match('@[^\w]@', $data[$validateArgs[$j][0]])){
                        array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                        }else{
                        return [['status'=>false,'msg'=>'Please Remove Special characters/Spaces '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isNum'){//IS NUMBER??
                            if(is_numeric($data[$validateArgs[$j][0]])){
                                array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }else{
                                return [['status'=>false,'msg'=>'Please Enter valid number for '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isEmail'){//IS EMAIL??
                        if(strpos($data[$validateArgs[$j][0]],'@') !== false && strpos($data[$validateArgs[$j][0]],'.com') !== false){
                          array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                        }else{
                          return [['status'=>false,'msg'=>'Please Enter valid [@.com] '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isBloodGroup'){//IS BLOOD GROUP??
                        if(strpos($data[$validateArgs[$j][0]],'+') !== false || strpos($data[$validateArgs[$j][0]],'-') !== false){
                          array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                        }else{
                          return [['status'=>false,'msg'=>'Please Enter '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isConPwd'){//IS PASSWORD
                        if($data['pwd'] == $data['con_pwd']){
                            array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :con-PWD','validateFlag'=>true]);
                        }else{
                          return [['status'=>false,'msg'=>'Password not match with confirm password','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isPwd'){//IS PASSWORD
                        $upperCase = preg_match('@[A-Z]@', $data[$validateArgs[$j][0]]);
                        $lowerCase = preg_match('@[a-z]@', $data[$validateArgs[$j][0]]);
                        $numbers = preg_match('@[0-9]@', $data[$validateArgs[$j][0]]);
                        $specialChars = preg_match('@[^\w]@', $data[$validateArgs[$j][0]]);
                        if(strlen($data[$validateArgs[$j][0]]) > 8 && $upperCase && $lowerCase && $numbers && $specialChars){
                            array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                        }else{
                          return [['status'=>false,'msg'=>'Please Enter Password Must 8-16 characters [A-Z][a-z][0-9] and Special characters)','validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'check' && $validateArgs[$j][2] == 'isNotEmpty'){//IS NOT EMPTY
                        if(strlen($data[$validateArgs[$j][0]]) > 0){
                            array_push($this->validateResults,['status'=>true,'msg'=>'Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                        }else{
                          return [['status'=>false,'msg'=>'Please Enter '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }
                    }else if($validateArgs[$j][1] == 'restrict'){//CHECKING RESTRICT WORD IS PRESENT OR NOT
                        //Check input type
                        if(is_array($validateArgs[$j][2])){
                            $restrictWords = $validateArgs[$j][2];
                        }else{//str type
                            $restrictWords = explode(',',$validateArgs[$j][2]);
                        }

                        //Original data - check
                        if(in_array(str_replace(' ','',$data[$validateArgs[$j][0]]),$restrictWords)){
                            return [['status'=>false,'details'=>'Restrict word founded in (Original arr)','msg'=>'Restricted word used in '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                        }else{
                            //Original data converted into caps - check
                            if(in_array(strtoupper(str_replace(' ','',$data[$validateArgs[$j][0]])),array_map('strtoupper',$restrictWords))){
                                return [['status'=>false,'details'=>'Restrict word founded in (Caps converted arr)','msg'=>'Restricted word used in '.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>false,'attr'=>$validateArgs[$j][0]]];
                            }else{
                                array_push($this->validateResults,['status'=>true,'msg'=>'(RestrictArrCapsCheck)Condition Passed for :'.$this->removeUniqueWordForLabel($validateArgs,$validateArgs[$j][0]),'validateFlag'=>true]);
                            }
                        }
                    }
              }
              return $this->validateResults;
        }

        public function removeUniqueWordForLabel($validateArrs,$arrData){
            for($i = 0;$i < count($validateArrs);$i++){
                if($validateArrs[$i][1] == "remove"){
                    return strtoupper(str_replace($validateArrs[$i][0],'',str_replace('_',' ',$arrData)));
                }
            }
            return strtoupper(str_replace('_',' ',$arrData));
        }

}


?>