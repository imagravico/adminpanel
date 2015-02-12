<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Group;
use app\models\GroupClient;


class GroupsWidget extends Widget
{
	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		$total = [];
		foreach (Group::find()->all() as $key => $group) {
			$total[$group->name] = GroupClient::find()
								->where(['groups_id' => $group->id])
								->count();
		}

		return $this->render('groups/index', [
				'group' => new Group(),
				'total' => $total
			]);
	}
}