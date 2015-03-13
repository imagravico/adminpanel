<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\Activity;


class ActivitiesWidget extends Widget
{
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		$activities = Activity::find()
			->where(['belong_to' => $this->belong_to])
    		->orderBy('id DESC')
    		->limit(5)
			->offset(0)
    		->all();

		return $this->render('activities/index', [
				'activities' => $activities,
				'belong_to' => $this->belong_to
			]);
	}
}