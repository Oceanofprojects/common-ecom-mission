<?php

namespace MW;


class ReqMiddleWare{
	public static function validReq($req,$actKeys,$optionaArgs=[]){
		$pre_req = [];
		foreach ($actKeys as $key) {			
			$pre_req[] = $key;
		}		
		return $unsetVals = array_diff(array_keys($req),$pre_req);
	}

	public static function unsetReqArgs($unReq,$request){
		foreach ($unReq as $value) {
			if(isset($request[$value])){
				unset($request[$value]);
			}
		}
		return $request;
	}

}


?>