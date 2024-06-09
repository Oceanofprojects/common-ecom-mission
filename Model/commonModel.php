<?php

trait ecomDataMine{
    public function getEcomData($tbl,$col='',$con){
        if(empty($tbl) || empty($con)){
            return ['status'=>false,'res'=>[],'message','Empty param in data fetcher'];
        }
        if(is_array($col)){
            $col = implode(',',$col);
        }else if(empty($col)){
            $col = '*';
        }
        $q = "SELECT $col FROM $tbl WHERE $con";
        $sql = $this->db->prepare($q);
        if ($sql->execute()) {
            $res = $sql->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($res) && count($res)!==0){
                return ['status'=>true,'res'=>$res,'message','Ecom -> Mine -> Data -> Success !'];
            }else{
                return ['status'=>false,'res'=>[],'message','Zero fetch :: ecom->mine'];
            }
        }else{
            return ['status'=>false,'res'=>[],'message','issue in data fetcher !'];
        }
    }
}


class commonModel
{
    use ecomDataMine;
    private $table;
    public $query;
    public $bind_values = [];

    public function generateQuery($arData = ''){
        if(is_array($arData)){
            $this->arColVal = $arData;
        }else{
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Zero params'];
        }

        //GETTING TABEL NAME
        if (isset($this->arColVal['tbl_name']) == 1) {
            $this->table = $this->arColVal['tbl_name'];
        } else {
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Table name must!, Please check.'];
            exit;
        }

        //GET AND CHECK PRE CONDITION
        if (isset($this->arColVal['pre_condition']) == 1) {
            //PREPARE QUERY
            if (isset($this->arColVal['pre_condition']['isDuplicate']) == 1) {
                for($preIndi=0;$preIndi<count($this->arColVal['pre_condition']['isDuplicate']);$preIndi++){
                    $colName = $this->arColVal['pre_condition']['isDuplicate'][$preIndi][0];
                    $colValue = $this->arColVal['pre_condition']['isDuplicate'][$preIndi][1];
                    $q = "SELECT * FROM {$this->table} WHERE `{$colName}` = {$colValue}";
                    $sql = $this->db->prepare($q);
                    //RUNNING QUERY
                    if ($sql->execute()) {
                        $res = $sql->fetchAll(PDO::FETCH_ASSOC);
                        if (count($res)) { //If duplicate founded
                            return ['status' => 'failed', 'data' => [], 'msg' => 'Duplicate value founded in ' . str_replace('_', ' ', $this->arColVal['pre_condition']['isDuplicate'][$preIndi][0])];
                        }
                    }
                }
            }
        }

        //GET ACTION(SELECT,INSERT,UPDATE,DELETE)
        $action = (isset($this->arColVal['action']) == 1) ? strtoupper($this->arColVal['action']) : 0;
        if (!$action) {
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Action field is must'];
        }

        //FIND COLUMNS TO ACCESS THE DATA
        if (isset($this->arColVal['data']) == 1) {
            if (count($this->arColVal['data']) == 0) {
                $data = '*'; //IF COLUMNS NAME ARAY IS EMPTY, IT'S TAKES DEFAULT (*)
            }else{
              if(isset($this->arColVal['data']['manual'])){
                $data = $this->arColVal['data']['manual'][0];
              }else if(isset($this->arColVal['data']['auto'])){
                $data = $this->dataSep('sep', $this->arColVal['data']['auto']); //MAKING COLUMN LIST SEPARATED BY (,)
              }else{
                $data = $this->dataSep('sep', $this->arColVal['data']); //MAKING COLUMN LIST SEPARATED BY (,)
              }
            }
        }else{
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Data field is must'];
        }

        //GENERATING CONDITIONS


        if(isset($this->arColVal['condition']) == 1 && (count($this->arColVal['condition']) != 0)){
            if(isset($this->arColVal['condition']['raw-manual'])){
                $condition = $this->arColVal['condition']['raw-manual'][0];
            }else if(isset($this->arColVal['condition']['manual'])){
                $condition = 'WHERE ' . $this->arColVal['condition']['manual'][0];
            }else if(isset($this->arColVal['condition']['auto'])){
                $make_param = $this->dataSep('con', $this->arColVal['condition']['auto']);
                // $this->preBindParam($make_param['bind_param']);
                // $this->bind_values = ($this->isBindParamEmpty())?$this->bind_values
                $this->preBindParam($make_param['bind_param']);
                $condition = 'WHERE ' . $make_param['column_bind'];
            }else{
                $make_param = $this->dataSep('con', $this->arColVal['condition']);
                $this->preBindParam($make_param['bind_param']);
                $condition = 'WHERE ' . $make_param['column_bind'];
            }
        }else{
            $condition = '';
        }
        //GENERATE RESULT ARRANGEMENT(ASC,DESC)
        if (isset($this->arColVal['order']) == 1) {
                if(count($this->arColVal['order']) !== 0){
                    $order = 'ORDER BY ' . $this->arColVal['order'][0] . ' ' . strtoupper($this->arColVal['order'][1]);
                }else{
                $order = '';
                }
            } else {
                $order = '';
        }

        //GET LIMIT VALUE
        if (isset($this->arColVal['limit']) == 1) {
            if (strlen(str_replace(' ','',$this->arColVal['limit'])) == 0) {
                $limit = '';
            } else {
                $limit = 'LIMIT ' . $this->arColVal['limit'];
            }
        } else {
            $limit = '';
        }

        // $bind_values = [];
        //QUERY GENERATION BASED ON ACTION VALUE
        if (strtoupper($this->arColVal['action']) == 'INSERT') {
            $insertcolname = '(' . $this->getSepKey($this->arColVal['data']) . ') ';
            $make_param = $this->getSepVal($this->arColVal['data']);
            // $this->bind_values = $make_param['bind_param'];
            $this->preBindParam($make_param['bind_param']);
            $insertColVal = 'VALUES (' . $make_param['column_bind'] . ')';
            $this->query = $action . ' INTO ' . $this->table . ' ' . $insertcolname . ' ' . $insertColVal;
        } else if (strtoupper($this->arColVal['action']) == 'SELECT') {
            $this->query = $action . ' ' . $data . ' FROM ' . $this->table . ' ' . $condition . ' ' . $order . ' ' . $limit;
        } else if (strtoupper($this->arColVal['action']) == 'UPDATE') {
            if(count($this->arColVal['data']) !== 0){
                $make_param = $this->dataSep('up_sep', $this->arColVal['data']);
                $this->preBindParam($make_param['bind_param']);
                $this->query = $action . ' ' . $this->table . ' SET ' . $make_param['column_bind'] . ' ' . $condition;
            }else{
                return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Data param empty!, Param must for UPDATE'];
            }
        } else if (strtoupper($this->arColVal['action']) == 'DELETE') {
            $this->query = $action . ' FROM ' . $this->table . ' ' . $condition;
        } else if (strtoupper($this->arColVal['action']) == 'JOIN') {
            if (isset($this->arColVal['join_param'])) {
                if(count($this->arColVal['join_param']) !== 0){
                    $this->query = 'SELECT ' . $data . ' FROM '.$this->table.' '.$this->createJoins($this->table,$this->arColVal['join_param']).$condition. ' ' . $order . ' ' . $limit;
                }else{
                    return ['status' => 'failed', 'data' => [], 'msg' => 'Err : join_param Attr values must for build JOIN query'];
                }
            } else {
                return ['status' => 'failed', 'data' => [], 'msg' => 'Err : join_param Attr must for JOIN query'];
            }
        }

        if(isset($this->arColVal['query-exc']) && $this->arColVal['query-exc'] == true){

          //PREPARE QUERY
          $sql = $this->db->prepare($this->query);
          //RUNNING QUERY

          if ($sql->execute($this->bind_values)) {
                $this->bind_values = [];//Reset params
                  $num = $sql->rowCount();
              if (strtoupper($this->arColVal['action']) == 'SELECT' || strtoupper($this->arColVal['action']) == 'JOIN') {
                  //IF ACTION IS FETCHING SOME VALUES IT'S RETURN DATA IN RESPONSE.
                  $res = $sql->fetchAll(PDO::FETCH_ASSOC);//GETTING ALL DATA
                      return $this->outPut((isset($this->arColVal['type']) == 1 && strlen($this->arColVal['type']) !== 0) ? $this->arColVal['type'] : 'array', $res,$num);
              } else {
                      return $this->outPut((isset($this->arColVal['type']) == 1 && strlen($this->arColVal['type']) !== 0) ? $this->arColVal['type'] : 'array', '',$num);
              }
          } else {
              return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Query Exec Failed','details'=>['code'=>$sql->errorInfo()[1],'message'=>$sql->errorInfo()[2]]];
          }
        }else{
          return $this->query;
        }
    }

    public function createJoins($primary_tbl,$joins){
        $joinIdentity = ['LEFT_JOIN'=>'LEFT JOIN','RIGHT_JOIN'=>'RIGHT JOIN','FULL_JOIN'=>'JOIN','JOIN'=>'JOIN'];
            $qr = '';
            for($i=0;$i<count($joins);$i++){
                if(isset($joins[$i][4])){
                    $extra_con = $joins[$i][4].' ';
                }else{
                    $extra_con = '';
                }
                $qr.= ' '.$joinIdentity[strtoupper($joins[$i][1])].' '.$joins[$i][0].' ON '.$primary_tbl.'.'.$joins[$i][2].' = '.$joins[$i][0].'.'.$joins[$i][3].' '.$extra_con;
            }
            return $qr;
    }

    public function outPut($outPutType, $qResult,$numrows)
    {
        if ($outPutType == 'json' || $outPutType == 'JSON') {
            return json_encode(['status' => 'success', 'data' => $qResult, 'msg' => 'Query Successfuly Executed','numrows'=>$numrows]);
        } else {
            return ['status' => 'success', 'data' => $qResult, 'msg' => 'Query Successfuly Executed','numrows'=>$numrows];
        }
    }

    public function dataSep($type, $arData)
    { //COLUMN VALUE SEPARATER OR LIST MAKER (It's generating values based on $type variable(sep -> (,) and con -> (sql AND)))

        //INIT Combine Operator START
        if(isset($this->arColVal['conditionCombineOpt'])){
            if(strlen(str_replace(' ','',$this->arColVal['conditionCombineOpt'])) == 0){
                $combineOpt = ' AND ';//If arr value empty
            }else{
                $combineOpt = ' '.$this->arColVal['conditionCombineOpt'].' ';
            }
        }else{
            $combineOpt = ' AND ';//DEFAULT
        }//Combine Opt END

        $expressions = ['<=','>=','!=','<','>','='];
        $data = '';
        for ($i = 0; $i < count($arData); $i++) {
            if ($type == 'con') { //WHERE CONDITION SEP
                for($y=0;$y<count($expressions);$y++){//Expression Handling (=,<=,>=,<,>,!=)
                    if(preg_match('@'.$expressions[$y].'@',$arData[$i])){
                         $expression = $expressions[$y];
                         break;
                    }
                    if(($y+1) == count($expressions)){
                        $expression = '=';
                    }
                }

                $sepCalVal = explode($expression, $arData[$i]);

                if(isset($this->arColVal['like'])){
                    if($this->arColVal['like']){
                        if(strlen(str_replace("'","",str_replace(' ','',$sepCalVal[1]))) !== 0){
                            $like_entry = true;
                                $data .= " `" . str_replace(' ','',$sepCalVal[0]) . "` LIKE '%".str_replace("'","",$sepCalVal[1])."%' ";
                        }else{
                            $like_entry = false;
                        }
                        if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(AND)
                            if(strlen(str_replace("'","",str_replace(' ','',$sepCalVal[1]))) !== 0){
                                $data .= " `" . str_replace(' ','',$sepCalVal[0]) . "` LIKE '%".str_replace("'"," ",$sepCalVal[1])."%'";
                            }else{
                                $pData = explode(' ',$data);
                                if($pData[count($pData)-1] == 'AND'){
                                    //echo "AND available";
                                    array_pop($pData);
                                    $data = '';
                                    //QUERY RE-ASSEMBLE
                                    for($k=0;$k<count($pData);$k++){
                                        $data.=' '.$pData[$k].' ';
                                    }
                                }
                            }
                        }else if($like_entry){
                            $data.=" AND";
                            $like_entry = false;
                        }
                    }
                }else{
                    $val = ':'.trim($sepCalVal[0]);
                    if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(AND)
                        $res[$val] = $sepCalVal[1];
                        $data .= trim($sepCalVal[0]).' '.$expression.' '.$val;
                    } else {
                        $res[$val] =$sepCalVal[1];
                        $data .= trim($sepCalVal[0]).' '.$expression.' '.$val.''.$combineOpt;
                    }
                }
                // return ['column_bind'=>$data,'bind_param'=>$res];

            } elseif ($type == 'up_sep') { //UPDATE SEP
                $sepCalVal = explode('=', $arData[$i]);
                        trim($sepCalVal[0]);
                        $val = ':'.trim($sepCalVal[0]);
                    if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                        $res[$val] = $sepCalVal[1];
                        $data .= trim($sepCalVal[0]) . " = ".$val;
                    } else {
                        $res[$val] = $sepCalVal[1];
                        $data .= trim($sepCalVal[0]) . " = " . $val . ",";
                    }
            } else {
                if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                    $data .= "`" . $arData[$i] . "`";
                } else {
                    $data .= "`" . $arData[$i] . "`,";
                }
            }
        }
        if($type == 'con' OR $type == 'up_sep'){
            return ['column_bind'=>$data,'bind_param'=>$res];            
        }else{
            return $data;
        }
}

    public function getSepKey($arr)
    { //MAKING KEY LIST (COLUMN NAME)
        $sepKeyData = '';
        for ($itr = 0; $itr < count($arr); $itr++) {
            if (($itr + 1) == count($arr)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                $sepKeyData .= "`" . explode('=', $arr[$itr])[0] . "`";
            } else {
                $sepKeyData .= "`" . explode('=', $arr[$itr])[0] . "`,";
            }
        }
        return $sepKeyData;
    }

    public function getSepVal($arr)
    { //MAKING VALUE LIST (COLUMN VALUE)
        $sepValueData = '';
        for ($itr = 0; $itr < count($arr); $itr++) {
            $sepVal = explode('=', $arr[$itr]);

            $val = ':'.trim($sepVal[0]);
            if (($itr + 1) == count($arr)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                $sepValueData .= $val;
                $res[$val] = trim($sepVal[1]);
            } else {
                $sepValueData .= $val . ",";
                $res[$val] = trim($sepVal[1]);
            }
        }
        return ['column_bind'=>$sepValueData,'bind_param'=>$res];

        // return $sepValueData;

    }
    public function genArAssocToColSep($assocArr)
    {
        $arKeys = array_keys($assocArr);
        $arVals = array_values($assocArr);
        $data = [];
        for ($i = 0; $i < count($assocArr); $i++) {
            array_push($data, $arKeys[$i] . "=" . $arVals[$i]);
        }
        return $data;
    }

    public function genRnd($cateV = 'numeric',$size = 5){
        if(is_string($cateV)){
            $cate = $cateV;
        }else{
            $cate = 'numeric';
            $size = $cateV;
        }

        $alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

        if($cate == 'numeric' || $cate == 'NUMERIC'){
            $fromDigi = $toDigi = null;
            for($i=0;$i<$size;$i++){
                $fromDigi.=($i == 0)?'1':'0';
                $toDigi.='9';
            }
            return rand(intval($fromDigi),intval($toDigi));
        }else if($cate == 'alpha' || $cate == 'ALPHA'){
            $al = null;
            for($i=0;$i<$size;$i++){
                $al.=$alpha[rand(0,25)];
            }
            return $al;
        }else if($cate == 'alpha_numeric' || $cate == 'ALPHA_NUMERIC'){
            $alNum = null;
            for($i=0;$i<$size;$i++){
                if(rand(0,1)){
                    $alNum.=$alpha[rand(0,25)];
                }else{
                    $alNum.=rand(0,9);
                }
            }
            return $alNum;
        }

    }

    public function inj_validate($x){
        return htmlspecialchars(addslashes($x));
    }

    public function preBindParam($params){
        if(is_array($params)){
            if(count($this->bind_values)){
                $this->bind_values = array_merge($params,$this->bind_values);
            }else{
                $this->bind_values = $params;
            }
        }else{
            $this->bind_values = $params;
        }
    }

}



?>