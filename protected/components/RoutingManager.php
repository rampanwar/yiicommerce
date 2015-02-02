<?php
class RoutingManager extends CUrlManager
{
	public function init(){
		parent::init();
	}
	
	public function createUrl($route, $params = array(), $ampersand = '&'){
		// if(isset(Yii::app()->session['SUBSITE_TITLE']) && Yii::app()->session['SUBSITE_TITLE']!=''){
		// 	$route = Yii::app()->session['SUBSITE_TITLE'].'/'.$route;
		// }
		return parent::createUrl($route, $params, $ampersand);
	}
}
?>