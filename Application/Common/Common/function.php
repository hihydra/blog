<?php
/** 
* @method 多维数组转字符串 
* @param type $array 
* @return type $srting 
* @author yanhuixian 
*/  
function arrayToString($arr) {  
   if (is_array($arr)){  
	return implode(',', array_map('arrayToString', $arr));  
   }  
    return $arr;  
}  
 
?>