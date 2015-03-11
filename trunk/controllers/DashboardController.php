<?php
namespace app\controllers;
use app\models\Client;
use app\models\Website;
use app\models\Checklist;
use app\models\Message;


class DashboardController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$count = [
			'clients'    => count(Client::find()->all()),
			'websites'   => count(Website::find()->all()),
			'checklists' => count(Checklist::find()->all()),
			'messages'   => count(Message::find()->all())
    	];
        return $this->render('index', [
        		'count' => $count
        	]);
    }

}
