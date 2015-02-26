<?php

namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Csetting;


class MCSettingsController extends \yii\web\Controller
{
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