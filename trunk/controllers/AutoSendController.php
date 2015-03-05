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
		$time_send = 0;
		// in the case type == 1
		if ($model->type == 1) {
			$this->_getTimeSend($model->event)
		}
		else {
			$this->_getTimeSend($model->type_periodically)
		}
		
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


	public function _getTimeSend($type_time_send)
	{
		
	}

}