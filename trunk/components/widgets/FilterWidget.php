<?php
namespace app\components\widgets;

use yii\base\Widget;


class FilterWidget extends Widget
{
	public $model;
	public $update_selector;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		return $this->render('filter/index', [
				'model'  => $this->model,
				'update_selector' => $this->update_selector
			]);
	}
}