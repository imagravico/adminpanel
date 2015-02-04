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
		$notes = Note::find()->orderBy('id DESC')->all();
		return $this->render('notes/index', [
				'notes' => $notes
			]);
	}
}