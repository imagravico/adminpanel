<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Group;

class GroupsWidget extends Widget
{
	public $insuser;
	public function init() 
	{
		parent::init();
	}
	
	public function run() 
	{
		return $this->render('groups/index', [
				'group' => new Group()
			]);
	}
}