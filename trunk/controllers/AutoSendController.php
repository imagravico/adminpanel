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
					if ($mschedule->type == 1) {
						foreach ($settings as $key => $setting) {
							$this->cur_setting = $setting;
							$cur_cow = $this->cur_setting->cow;

							// get time setting from db and merge with at_time in schedule table
							$time_set = $cur_cow->getTimeSend($this->event) . ' ' . $mschedule->at_time;
							$time_compare = date('m/d H:i');
							if ($this->_compare($time_set, $time_compare)) {
								$this->_send();
							}
						}
					}
					elseif ($mschedule->type == 2) {
						switch ($mschedule->type_periodically) {
							case 'day':
								$time_set     = $mschedule->time_periodically;
								$time_compare = date('H:i');
								break;

							case 'week':
								$time_set     = $mschedule->time_periodically;
								$time_compare = date('w H:i');
								break;

							case 'month':
								$time_set     = $mschedule->time_periodically;
								$time_compare = date('j H:i');
								break;

							case 'year':
								$time_set     = $mschedule->time_periodically;
								$time_compare = date('j n H:i');
								break;
						}

						// send email including messages information
						if ($this->_compare($time_set, $time_compare)) {
							$this->_send();
						}

					}
					
				}
			}
		}
		// send checklist
	}

	private function _compare($needed, $compare)
	{
		if ($needed === $compare)
			return true;
		else
			return false;
	}

	private function _send()
	{
		echo "send duoc roi ne >__<"; die('123');
	}
}