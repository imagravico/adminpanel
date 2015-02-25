<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\MessageSchedule;
use app\models\Message;


class CSchedulesWidget extends Widget
{
	public $checklists_id;
	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		return $this->render('cschedules/index', [
					'checklists_id' => $this->checklists_id
			]);
	}
}