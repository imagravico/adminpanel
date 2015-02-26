<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Msetting;


class MSettingsController extends \yii\web\Controller
{
	public function actionCreate()
	{
		$session = Yii::$app->session;

		if (empty($session->get('msetting'))) {
			$settings = [];
		}
		else {
			$settings = $session->get('msetting');
		}
		
		$msetting_post = Yii::$app->request->post('Msetting');

		if (!empty($msetting_post) && !$this->in_array_r($msetting_post['messages_id'], $settings)) 
			array_push($settings, Yii::$app->request->post('Msetting'));

		$session->set('msetting', $settings);
	}

	
	public function actionRemove()
	{
		$session = Yii::$app->session;

		$msetting_post = Yii::$app->request->post('Msetting');
		$msetting_session = $session->get('msetting');

		if (!empty($msetting_post) && !empty($msetting_session) && $this->in_array_r($msetting_post['messages_id'], $msetting_session)) {
			$msetting_session = $this->array_recursive_diff($msetting_session, $msetting_post);
			$session->set('msetting', $msetting_session);
		}
	}
	

	public function array_recursive_diff($arr_1, $arr_2) 
	{
	  	$arr_return = array();
	  	foreach ($arr_1 as $key => $value) {
	  		if ($value['messages_id'] == $arr_2['messages_id']) {
	  			unset($arr_1[$key]);
	  			$arr_return = $arr_1;
	  		}
	  	}
	  	return $arr_return;
	} 

	public function in_array_r($needle, $haystack, $strict = false) 
	{
		foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_r($needle, $item, $strict))) {
	            return true;
	        }
	    }

	    return false;
	}
}
