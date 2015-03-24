<?php namespace app\behaviors;

use yii\db\ActiveRecord;
use yii\base\Behavior;
use yii\base\View;


class LoadMoreBehavior extends Behavior
{
    public function events()
    {
        return [
            View::EVENT_BEFORE_RENDER => 'beforeRender',
        ];
    }

    public function beforeRender($event)
    {
        echo "<pre>"; var_dump($event); echo "<br/>"; die('123');
    }
}