<?php


class commonModel
{
    private $table;
    public $query;
    
    public function generateQuery($arData){
        $this->arColVal = $arData;

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
                    $sql = $this->connection->prepare($q);
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
        $action = (isset($this->arColVal['action']) == 1) ? $this->arColVal['action'] : 0;
        if (!$action) {
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Action field is must'];
        }

        //FIND COLUMNS TO ACCESS THE DATA
        if (isset($this->arColVal['data']) == 1) {
            if (count($this->arColVal['data']) == 0) {
                $data = '*'; //IF COLUMNS NAME ARAY IS EMPTY, IT'S TAKES DEFAULT (*) 
            } else {
                $data = $this->dataSep('sep', $this->arColVal['data']); //MAKING COLUMN LIST SEPARATED BY (,)    
            }
        }else{
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Data field is must'];
        }

        //GENERATING CONDITIONS
        

        if(isset($this->arColVal['condition']) == 1 && (count($this->arColVal['condition']) != 0)){
            if(isset($this->arColVal['condition']['manual'])){
                $condition = 'WHERE ' . $this->arColVal['condition']['manual'][0];
            }else if(isset($this->arColVal['condition']['auto'])){
                $condition = 'WHERE ' . $this->dataSep('con', $this->arColVal['condition']['auto']);
            }else{
                $condition = 'WHERE ' . $this->dataSep('con', $this->arColVal['condition']);
            }
        }
//        $condition = (isset($this->arColVal['condition']) == 1 && (count($this->arColVal['condition']) != 0)) ? 'WHERE ' . $this->dataSep('con', $this->arColVal['condition']) : '';

        //GENERATE RESULT ARRANGEMENT(ASC,DESC)
        if (isset($this->arColVal['order']) == 1) {
                if(count($this->arColVal['order']) !== 0){
                    $order = 'ORDER BY `' . $this->arColVal['order'][0] . '` ' . strtoupper($this->arColVal['order'][1]);
                }else{
                $order = '';
                }
            } else {
                $order = '';
        }

        //GET LIMIT VALUE
        if (isset($this->arColVal['limit']) == 1) {
            if (count($this->arColVal['limit']) == 0) {
                $limit = '';
            } else {
                $limit = 'LIMIT ' . $this->arColVal['limit'][0];
            }
        } else {
            $limit = '';
            $order = '';
        }


        //QUERY GENERATION BASED ON ACTION VALUE    
        if (strtoupper($this->arColVal['action']) == 'INSERT') {
            $insertcolname = '(' . $this->getSepKey($this->arColVal['data']) . ') ';
            $insertColVal = 'VALUES (' . $this->getSepVal($this->arColVal['data']) . ')';
            $this->query = $action . ' INTO ' . $this->table . ' ' . $insertcolname . ' ' . $insertColVal;
        } else if (strtoupper($this->arColVal['action']) == 'SELECT') {
            $this->query = $action . ' ' . $data . ' FROM ' . $this->table . ' ' . $condition . ' ' . $order . ' ' . $limit;
        } else if (strtoupper($this->arColVal['action']) == 'UPDATE') {
            $this->query = $action . ' ' . $this->table . ' SET ' . $data = $this->dataSep('up_sep', $this->arColVal['data']) . ' ' . $condition;
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


        /*
         *   IF DEBUGING IS ENABLE
         *
         */
        if(isset($_REQUEST['DEBUG_INFO']) && strtoupper($_REQUEST['DEBUG_INFO']) == 'YES'){
            echo json_encode(['DEBUG_STATUS'=>true,'DEBUG_MSG'=>'DEBUG_VIEW Enabled','DEBUG_QUERY_STATUS'=>'Query generated successfully.','DEBUG_QUERY'=>$this->query]);
            exit;            
        }else if (isset($_REQUEST['DEBUG_MODE']) && strtoupper($_REQUEST['DEBUG_MODE']) == 'YES') {
            echo "<table border='1'><tr><th>Data Field</th><th>Data</th></tr><tr><td>DEBUG_MODE</td><td>true</td></tr><tr><td>DEBUG_MSG</td><td>DEBUG_MODE Enabled.</td></tr><tr><td>Query Status</td><td>Query generated successfully</td></tr><tr><td>Query</td><td>{$this->query}</td></tr></table>";exit;
        }

        //PREPARE QUERY
        $sql = $this->connection->prepare($this->query);
        
        //RUNNING QUERY
        if ($sql->execute()) {
            if (strtoupper($this->arColVal['action']) == 'SELECT' || strtoupper($this->arColVal['action']) == 'JOIN') {
                //IF ACTION IS FETCHING SOME VALUES IT'S RETURN DATA IN RESPONSE.
                $res = $sql->fetchAll(PDO::FETCH_ASSOC);//GETTING ALL DATA
                    return $this->outPut((isset($this->arColVal['type']) == 1 && count($this->arColVal['type']) !== 0) ? $this->arColVal['type'][0] : 'array', $res);
                
            } else {
                    return $this->outPut((isset($this->arColVal['type']) == 1 && count($this->arColVal['type']) !== 0) ? $this->arColVal['type'][0] : 'array', '');                
            }
        } else {
            return ['status' => 'failed', 'data' => [], 'msg' => 'Err : Query Exec Failed','details'=>['code'=>$sql->errorInfo()[1],'message'=>$sql->errorInfo()[2]]];
        }
    }

    public function createJoins($primary_tbl,$joins){
        $joinIdentity = ['LEFT_JOIN'=>'LEFT JOIN','RIGHT_JOIN'=>'RIGHT JOIN','FULL_JOIN'=>'JOIN','JOIN'=>'JOIN'];
            $qr = '';
            for($i=0;$i<count($joins);$i++){
                $qr.= ' '.$joinIdentity[strtoupper($joins[$i][1])].' '.$joins[$i][0].' ON '.$primary_tbl.'.'.$joins[$i][2].' = '.$joins[$i][0].'.'.$joins[$i][3].' ';
            }
            return $qr;
    }

    public function outPut($outPutType, $qResult)
    {
        if ($outPutType == 'json' || $outPutType == 'JSON') {
            return json_encode(['status' => 'success', 'data' => $qResult, 'msg' => 'Query Successfuly Executed']);
        } else {
            return ['status' => 'success', 'data' => $qResult, 'msg' => 'Query Successfuly Executed'];
        }
    }
    
    public function dataSep($type, $arData)
    { //COLUMN VALUE SEPARATER OR LIST MAKER (It's generating values based on $type variable(sep -> (,) and con -> (sql AND)))

        //INIT Combine Operator START
        if(isset($this->arColVal['conditionCombineOpt'])){
            if(str_replace(' ','',$this->arColVal['conditionCombineOpt']) == 0){
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
                    if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(AND)
                        $data .= "`" . str_replace(' ','',$sepCalVal[0]) . "` $expression ". str_replace(' ','',$sepCalVal[1]);
                    } else {
                        $data .= "`" . str_replace(' ','',$sepCalVal[0]) . "` $expression " . str_replace(' ','',$sepCalVal[1]) . " ".$combineOpt." ";
                    }
                }

            } elseif ($type == 'up_sep') { //UPDATE SEP
                $sepCalVal = explode('=', $arData[$i]);                
                    if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                        $data .= "`" . $sepCalVal[0] . "`=" . $sepCalVal[1];
                    } else {
                        $data .= "`" . $sepCalVal[0] . "`=" . $sepCalVal[1] . ",";
                    }

            } else {
                if (($i + 1) == count($arData)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                    $data .= "`" . $arData[$i] . "`";
                } else {
                    $data .= "`" . $arData[$i] . "`,";
                }
            }
        }
        return $data;
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
            if (($itr + 1) == count($arr)) { //FINDING LAST VALUE TO AVOID SEPARETION ENTRY(,)
                $sepValueData .= $sepVal[1];
            } else {
                $sepValueData .= $sepVal[1] . ",";
            }
        }
        return $sepValueData;

    }
    public function genArAssocToColSep($assocArr)
    {
        $arKeys = array_keys($assocArr);
        $arVals = array_values($assocArr);
        $data = [];
        for ($i = 0; $i < count($assocArr); $i++) {
            array_push($data, (is_numeric($arVals[$i]) == 1) ? $arKeys[$i] . "=" . $arVals[$i] : $arKeys[$i] . "='" . $arVals[$i] . "'");
        }
        return $data;
    }

}



?>