<?php
namespace app\components\widgets;

use yii\base\Widget;
use app\models\Message;

class MSettingsWidget extends Widget
{
	// = 1 for client, = 2 for website
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		return $this->render('msettings/index', ['belong_to' => $this->belong_to]);
	}
}