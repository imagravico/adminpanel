<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\Note;


class NotesWidget extends Widget
{
	public function init() 
	{
		parent::init();
	}
	
	public function run() {

		return $this->render('groups/index', [
				
			]);
	}
}