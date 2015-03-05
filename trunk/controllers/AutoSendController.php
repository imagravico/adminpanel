<?php
namespace app\controllers;

use app\models\Checklist;
use app\models\User;
use app\models\CSetting;
use app\models\MSetting;
use app\models\MessageSchedule;



class AutoSendController extends \yii\web\Controller 
{
	
	public $cur_setting;
	public $event;

	/**
	 * this action will trigger every minute
	 * @return avoid
	 */
	public function actionIndex()
	{
		// send message
		$mschedules = MessageSchedule::find()
					->all();
		// echo "<pre>"; var_dump($mschedules->msettings); die('$mschedules->msettings->cow');
		// foreach ($mschedules->msettings as $key => $setting) {
		// 	echo "<pre>"; print_r($setting->cow); die('$setting->cow');
		// }
		if ($mschedules) {
			foreach ($mschedules as $key => $mschedule) {

				$settings = $mschedule->msettings;
				$this->event = $mschedule->event;

				if ($settings) {
					foreach ($settings as $key => $setting) {
						$this->cur_setting = $setting;
						if ($this->_check()) {
							$this->_send();
						}
					}
				}
				
				
			}
		}
		
	}

	/**
	 * parse 
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	private function _parseTime() 
	{
		
		// if ($this->schedule->type == 1) {
			
		// }
		// else {
		// 	$this->_getTimeSend()
		// }
	}

	/**
	 * check current time and schedule time of specific message or checklist
	 * @param  mix checklist's and message's object
	 * @return bool 
	 */
	private function _check() 
	{
		$time_send = 0;
		echo "<pre>"; print_r($this->_getTimeSend()); die('$this->_getTimeSend()');
		return $this->_compare($this->_getTimeSend(), time());
	}

	private function _send()
	{

	}

	private function _getTimeSend()
	{
		if ($this->cur_setting) {
			$cur_user = $this->cur_setting->cow;
			return $cur_user->getTimeSend($this->event);
		}
	}

	private function _compare($needed, $current)
	{
		if ($needed === $current)
			return true;
		else
			return false;
	}
}