<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\MessageSchedule;
use app\models\Message;


class MSchedulesWidget extends Widget
{
	public $message;
	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		$schedules = MessageSchedule::find()
    		->orderBy('id DESC')
    		->limit(5)
			->offset(0)
    		->all();

		return $this->render('mschedules/index', [
				'schedules' => $schedules,
				'message'   => $this->message
			]);
	}
}