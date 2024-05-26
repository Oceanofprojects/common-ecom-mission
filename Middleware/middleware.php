<?php

namespace MW;


class ReqMiddleWare{
	public static function validReq($req,$actKeys):array{
		$pre_req = [];
		foreach ($actKeys as $key) {			
			$pre_req[] = $key;
		}		
		return array_diff(array_keys($req),$pre_req);
	}

	public static function unsetReqArgs($unReq,$request):array{
		foreach ($unReq as $value) {
			if(isset($request[$value])){
				unset($request[$value]);
			}
		}
		return $request;
	}


	/**
	 * 
	 * Sanitize server request(Removing undefined request from users)
	 * 
	 * @params REQUEST(Server request) and FILTER_REQUEST(Predefine)
	 * 
	 * */

	public static function _sanitize($request,$filter_req){
	//Block sql injection
		$undefined_req = self::validReq($request,$filter_req);
		if(is_array($undefined_req) && count(($undefined_req)) > 0){
			return self::unsetReqArgs($undefined_req,$request);
		}
	}

}


?>