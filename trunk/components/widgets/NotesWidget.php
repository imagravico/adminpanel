<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\Note;


class NotesWidget extends Widget
{
	public $area;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		return $this->render('notes/index', [
				'area'  => $this->area
			]);
	}
}