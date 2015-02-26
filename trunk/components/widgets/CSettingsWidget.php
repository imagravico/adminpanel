<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\MessageSchedule;
use app\models\Message;


class CSettingsWidget extends Widget
{
	public $belong_to;
	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		$idcow = Yii::$app->request->get('id');
		return $this->render('csettings/index', [
					'belong_to' => $this->belong_to,
					'idcow'     => $idcow
			]);
	}
}