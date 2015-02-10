<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\MessageSchedule;


class MSchedulesWidget extends Widget
{
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

		return $this->render('schedules/index', [
				'schedules' => $schedules
			]);
	}
}