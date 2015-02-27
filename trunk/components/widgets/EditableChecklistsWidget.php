<?php
namespace app\components\widgets;

use yii\base\Widget;

class EditableChecklistsWidget extends Widget
{
	// current model
	public $checklist;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		return $this->render('editablechecklists/index', ['checklist' => $this->checklist]);
	}
}