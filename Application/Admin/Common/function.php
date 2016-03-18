<?php
// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
 function check_verify($code, $id = ''){ 
    $verify = new \Think\Verify();   
    return $verify->check($code, $id);
}
//递归重组节点信息为多维数组
function node_merge($node,$access = null,$pid = 0){
	$arr = array();
	foreach ($node as $v) {
		if (is_array($access)) {
			$v['access'] = in_array($v['id'],$access) ? 1:0;
		}
		if ($v['pid'] == $pid) {
			$v['child'] = node_merge($node,$access,$v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}
function writeArr($arr, $filename) {
    return file_put_contents($filename, "<?php\r\nreturn " . var_export($arr, true) . ";");
}

 
?>