<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;

Class CommonController extends Controller {

   Public function _initialize () {
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->redirect(MODULE_NAME.'/Login/index');
		}

	    $notAuth = in_array(MODULE_NAME,explode(',', C('NOT_AUTH_MODULE')))||in_array(ACTION_NAME,explode(',',C('NOT_AUTH_ACTION')));

		if(C('USER_AUTH_ON')) {
			Rbac::AccessDecision()||$this->error('没有权限');
		}
	}

}	
?>