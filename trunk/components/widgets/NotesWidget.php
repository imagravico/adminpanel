<?php
namespace app\components\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\User;
use app\models\Note;


class NotesWidget extends Widget
{
	public $type_area;
	public $belong_to;

	public function init() 
	{
		parent::init();
	}
	
	public function run() 
	{
		$disViewMore = false;
		$notes = Note::find()
                ->where(['type_area' => $this->type_area, 'belong_to' => $this->belong_to])
                ->orderBy('id DESC');

        if (count($notes->all()) <= 5)
        {
        	$notes = $notes->all();
        	$disViewMore = true;
        }
        else
        {
        	$notes = $notes
        				->limit(5)
        				->all();
        }
        
		return $this->render('notes/index', [
				'type_area'   => $this->type_area,
				'belong_to'   => $this->belong_to,
				'disViewMore' => $disViewMore,
				'notes'       => $notes
			]);
	}
}