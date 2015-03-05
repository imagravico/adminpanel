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
	public $type_time;
	public $cur_mschedule;

	/**
	 * this action will trigger every minute
	 * @return avoid
	 */
	public function actionIndex()
	{
		// send message
		$mschedules = MessageSchedule::find()
					->all();
		if ($mschedules) {
			foreach ($mschedules as $key => $mschedule) {

				$settings            = $mschedule->msettings;
				$this->event         = $mschedule->event;
				$this->type_time     = $mschedule->type;
				$this->cur_mschedule = $mschedule;

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
		// send checklist
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
		return $this->_compare($this->_getTimeSend(), time());
	}

	private function _send()
	{

	}

	private function _getTimeSend()
	{
		if ($this->type_time == 1) {
			if ($this->cur_setting) {
				$cur_user = $this->cur_setting->cow;
				return $cur_user->getTimeSend($this->event);
			}
		} else {

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