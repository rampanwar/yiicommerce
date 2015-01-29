<?php
class StringFilter extends CFilter{
	protected function preFilter($filterChain){
		// logic being applied before the action is executed
		$_POST = Yii::app()->input->stripClean($_POST);
		$_GET = Yii::app()->input->stripClean($_GET);
		$filterChain->run();
		// return true; // false if the action should not be executed
	}
}