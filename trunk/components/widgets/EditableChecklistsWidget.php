<?php
namespace app\components\widgets;

use yii\base\Widget;

class EditableChecklistsWidget extends Widget
{
	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		return $this->render('editablechecklists/index');
	}
}