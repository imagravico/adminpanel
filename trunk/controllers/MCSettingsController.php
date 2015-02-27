<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Csetting;


class MCSettingsController extends \yii\web\Controller
{
	/**
	 * create a session queue when switch button of each item in messages list
	 * or checklist to on
	 * @param  string $model name of corresponding model
	 * @return mix
	 */
	public function create($model)
	{
		if ($model === 'Csetting') {
			$session_name = 'csetting';
			$field        = 'checklists_id';
		}
		elseif ($model === 'Msetting') {
			$session_name = 'msetting';
			$field        = 'messages_id';
		}

		$session = Yii::$app->session;

		if (empty($session->get($session_name))) {
			$settings = [];
		}
		else {
			$settings = $session->get($session_name);
		}
		
		$csetting_post = Yii::$app->request->post($model);

		if (!empty($csetting_post) && !$this->in_array_r($csetting_post[$field], $settings)) 
			array_push($settings, Yii::$app->request->post($model));

		$session->set($session_name, $settings);

	}

	/**
	 * remove a session item in queue when switch button of each item in messages list
	 * or checklist to off
	 * @param  string $model name of corresponding model
	 * @return mix
	 */
	public function remove($model)
	{
		if ($model === 'Csetting') {
			$session_name = 'csetting';
			$field        = 'checklists_id';
		}
		elseif ($model === 'Msetting') {
			$session_name = 'msetting';
			$field        = 'messages_id';
		}

		$session = Yii::$app->session;

		$csetting_post    = Yii::$app->request->post($model);
		$csetting_session = $session->get($session_name);

		if (!empty($csetting_post) && !empty($csetting_session) && $this->in_array_r($csetting_post[$field], $csetting_session)) {
			$csetting_session = $this->array_recursive_diff($csetting_session, $csetting_post, $field);
			$session->set($session_name, $csetting_session);
		}
	}

	public function array_recursive_diff($arr_1, $arr_2, $offset) 
	{
	  	$arr_return = array();
	  	foreach ($arr_1 as $key => $value) {
	  		if ($value[$offset] == $arr_2[$offset]) {
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