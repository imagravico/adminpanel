<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\MessageSchedule;
use app\models\Message;


class MschedulesWidget extends Widget
{
	public $message_id;
	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		return $this->render('mschedules/index', [
					'message_id'   => $this->message_id
			]);
	}
}