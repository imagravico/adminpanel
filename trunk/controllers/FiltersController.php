<?php namespace app\controllers;

use Yii;
use yii\web\Session;
use app\models\Client;
use app\models\Checklist;
use app\models\Message;
use app\models\Website;
use app\models\Group;
use app\models\GroupClient;


class FiltersController extends \yii\web\Controller
{
	/**
	 * create a session queue when switch button of each item in messages list
	 * or checklist to on
	 * @param  string $model name of corresponding model
	 * @return mix
	 */
	public function actionIndex()
	{
		$post = Yii::$app->request->post();

		if ($post) {
			switch ($post['model']) {
				case 'client':
					$model = new Client();
					$view  = '_clients';
					$field_search = 'company';

					break;

				case 'message':
					$model = new Message();
					$view  = '_messages';
					$field_search = 'subject';

					break;

				case 'checklist':
					$model = new Checklist();
					$view  = '_checklists';
					$field_search = 'title';

					break;

				case 'website':
					$model = new Website();
					$view  = '_websites';
					$field_search = 'domain';

					break;

				default:
					$model = null;
					break;
			}
			
			$results = [];
			if ($post['keyword'] != 'all') {
				$results = $model->find()
					->where('left(' . $field_search . ', 1) = "' . $post['keyword'] . '"')
					->all();
			}
			elseif ($post['keyword'] === 'all') {
				$results = $model->find()->all();
			}
			
			Yii::$app->response->format = 'json';

			return [
				'errors' => '',
				'data'   => $this->renderPartial($view, ['results' => $results])
			];
			
		}
	}

	/**
	 * filter for group
	 * @return array json
	 */
	public function actionGroup()
    {
        $fil = Yii::$app->request->post()['name'];
		Yii::$app->response->format = 'json';

        if ($fil && $fil !== 'all') 
        {
        	$group = Group::find()
        		->where(['name' => trim($fil)])
        		->one();

        	if ($group) 
        	{
        		if (!empty($group->groupsClients)) 
        		{
        			$clients = [];
        			foreach ($group->groupsClients as $key => $gc) 
        			{
        				array_push($clients , $gc->client);
        			}
        			return [
						'errors' => '',
						'data'   => $this->renderPartial('_clients', ['results' => $clients])
					];
        		}
        	}
        	return [
				'errors' => '',
				'data'   => ''
			];
        }
        elseif ($fil && $fil === 'all')
        {
        	return [
					'errors' => '',
					'data'   => $this->renderPartial('_clients', [
							'results' => Client::find()->all(),
						])
				];
        }   
    }
}