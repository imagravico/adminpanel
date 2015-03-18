<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\Note;


class NotesWidget extends Widget
{
	public $area;
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() {
		$disViewMore = false;
		$notes = Note::find()
                ->where(['type_area' => $this->area, 'belong_to' => $this->belong_to])
                ->orderBy('id DESC')
                ->all();
        if (count($notes) <= 5)
        {
        	$disViewMore = true;
        }

		return $this->render('notes/index', [
				'area'        => $this->area,
				'belong_to'   => $this->belong_to,
				'disViewMore' => $disViewMore
			]);
	}
}