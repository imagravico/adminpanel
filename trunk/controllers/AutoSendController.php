<?php
namespace app\controllers;

use Yii;
use app\models\Checklist;
use app\models\User;
use app\models\MessageSchedule;
use app\models\ChecklistSchedule;


class AutoSendController extends \yii\web\Controller 
{
	
	public $cur_setting;
	public $event;
	public $type_time;
	public $cur_schedule;

	/**
	 * This action will trigger every 15 minute
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
				elseif ($schedule instanceof ChecklistSchedule)
					$settings = $schedule->csettings;

				if ($settings) {
					if ($schedule->type == 1) {
						foreach ($settings as $key => $setting) {
							$cur_cow = $setting->cow;
							// get time setting from db and merge with at_time in schedule table
							$time_set     = $cur_cow->getTimeSend($schedule->event) . ' ' . $schedule->at_time;
							$time_compare = date('m/d H:i');
							$time_send    = [$time_set, $time_compare];
							if ($this->_compare($time_send)) {
								$this->_send($setting->getInforSend());
							}
						}
					}
					elseif ($schedule->type == 2) {
						$time_send = $schedule->parseTime($schedule);
						// send email including messages information
						if ($this->_compare($time_send)) {
							foreach ($settings as $key => $setting) {
								$this->_send($setting->getInforSend());
							}
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

	private function _send($infor)
	{
		$mailer = Yii::$app->mailer->compose()
	                ->setFrom('softdevelop.kt@gmail.com')
	                ->setTo($infor['email'])
	                ->setSubject($infor['subject'])
	                ->setTextBody($infor['content']);

	    if (isset($infor['attach']) && $infor['attach'])
	        $mailer->attach($infor['attach']);

	    $mailer->send();
	}

	public function actionSendMail()
	{
		Yii::$app->mailer->compose()
		    ->setFrom('softdevelop.hn@gmail.com')
		    ->setTo('softdevelop.kt@gmail.com')
		    ->setSubject('Message subject')
		    ->setTextBody('Plain text content')
		    ->setHtmlBody('<b>HTML content</b>')
		    ->send();
	}
}