<?php
namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\Client;
use app\models\Website;


class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	$keywords = Yii::$app->request->get('k');
    	if ($keywords) {

    		$sql_c = 'SELECT * FROM clients WHERE company LIKE "%' . $keywords .'%" OR firstname LIKE "%' . $keywords .'%" OR lastname LIKE "%' . $keywords .'%"';

    		$clients = new ActiveDataProvider([
	            'query' => Client::findBySql($sql_c, [':key' => $keywords]),
	            'pagination' => [
	                'pageSize' => 10,
	            ],
	        ]);

    		$sql_w = 'SELECT * FROM websites WHERE domain LIKE "%' . $keywords .'%"';
	        $websites = new ActiveDataProvider([
	            'query' => Website::findBySql($sql_w, [':key' => $keywords]),
	            'pagination' => [
	                'pageSize' => 10,
	            ],
	        ]);

    		return $this->render('index', [
				'clients'  => $clients,
				'websites' => $websites
        	]);
    	}
        
    }

}
