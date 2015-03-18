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
	
	public function run() 
	{
		$disViewMore = false;
		$activities = Activity::find()
			->where(['belong_to' => $this->belong_to])
    		->orderBy('id DESC')
    		->limit(5)
			->offset(0)
    		->all();

    	$allActivities = Activity::find()
			->where(['belong_to' => $this->belong_to])
    		->orderBy('id DESC')
    		->all();

    	if (count($allActivities) <= 5)
    		$disViewMore = true;

		return $this->render('activities/index', [
				'activities' => $activities,
				'belong_to' => $this->belong_to,
				'disViewMore' => $disViewMore
			]);
	}
}