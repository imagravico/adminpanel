<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\Message;
use yii\web\Request;
use app\models\Msetting;

class MSettingsWidget extends Widget
{
	// = 1 for client, = 2 for website
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		$idcow = Yii::$app->request->get('id');
		return $this->render('msettings/index', ['belong_to' => $this->belong_to, 'idcow' => $idcow]);
	}
}