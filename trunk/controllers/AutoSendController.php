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
	public $cur_schedule;

	/**
	 * this action will trigger every minute
	 * @return avoid
	 */
	public function actionIndex()
	{
		// send message
		$mschedules = MessageSchedule::find()
					->all();
		$this->_run($mschedules);
		// send checklist
		$cschedules = ChecklistSchedule::find()
					->all();
		$this->_run($cschedules);

	}

	private function _run($schedules)
	{
		if ($schedules) {
			foreach ($schedules as $key => $schedule) {
				if ($schedule instanceof MessageSchedule)
					$settings = $schedule->msettings;
				else
					$settings = $schedule->csettings;

				$this->event        = $schedule->event;
				$this->type_time    = $schedule->type;
				$this->cur_schedule = $schedule;

				if ($settings) {
					if ($schedule->type == 1) {
						foreach ($settings as $key => $setting) {
							$this->cur_setting = $setting;
							$cur_cow = $this->cur_setting->cow;

							// get time setting from db and merge with at_time in schedule table
							$time_set = $cur_cow->getTimeSend($this->event) . ' ' . $schedule->at_time;
							$time_compare = date('m/d H:i');
							$time_send = [$time_set, $time_compare];

							if ($this->_compare($time_send)) {
								$this->_send();
							}
						}
					}
					elseif ($schedule->type == 2) {
						$time_send = $schedule->parseTime($schedule);
						// send email including messages information
						if ($this->_compare($time_send)) {
							$this->_send();
						}
					}
				}
			}
		}
	}

	private function _compare($time)
	{
		if (is_array($time) && $time) {
			if ($time[0] === $time[1])
				return true;
			else
				return false;
		}
		return false;
	}

	private function _send()
	{
		echo "<pre>"; print_r('send dc roi ne` >__< '); echo "<br/>"; die("'send dc roi ne` >__< '");
	}
}