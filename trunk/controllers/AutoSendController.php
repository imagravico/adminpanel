<?php
namespace app\controllers;

use app\models\Checklist;
use app\models\User;
use app\models\CSetting;
use app\models\MSetting;
use app\models\MessageSchedule;



class AutoSendController extends \yii\web\Controller 
{
	/**
	 * this action will trigger every minute
	 * @return avoid
	 */
	public function actionIndex()
	{
		// send message
		$mschedules = MessageSchedule::findOne(1);
		// echo "<pre>"; var_dump($mschedules->msettings); die('$mschedules->msettings->cow');
		// foreach ($mschedules->msettings as $key => $setting) {
		// 	echo "<pre>"; print_r($setting->cow); die('$setting->cow');
		// }


		if ($mschedules) {
			foreach ($mschedules as $key => $mschedule) {
				if ($this->_check($mschedule)) {
					$this->_send();
				}
			}
		}
		
	}

	/**
	 * parse 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function _parseTime($model) 
	{
		// in the case type == 1
		
	}

	/**
	 * check current time and schedule time of specific message or checklist
	 * @param  mix checklist's and message's object
	 * @return bool 
	 */
	private function _check($model) 
	{
		return $this->_parseTime($model);
	}

	public function _send()
	{

	}


}