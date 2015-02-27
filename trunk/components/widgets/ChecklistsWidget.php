<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;


class ChecklistsWidget extends Widget
{
	// if = 1 for client, = 2 for website
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		return $this->render('checklists/index', ['belong_to' => $this->belong_to]);
	}
}