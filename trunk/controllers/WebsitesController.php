<?php

namespace app\controllers;

use Yii;
use app\models\Website;
use yii\web\NotFoundHttpException;


class WebsitesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        // remove all sessions when come back list page
        Yii::$app->session->removeAll();

    	$websites = Website::find()
    			->orderBy('id DESC')
    			->all();

        return $this->render('index', [
        		'websites' => $websites
        	]);
    }

    public function actionCreate()
    {
    	$website =  new Website();

    	if ($website->load(Yii::$app->request->post()) && $website->save()) {

    		return $this->redirect(['/websites']);
    	}
    	return $this->render('create', [
    			'website' => $website
    		]);
    }

    public function actionEdit($id) 
    {
    	$website = $this->findModel($id);
    	if ($website->load(Yii::$app->request->post()) && $website->save()) {

    		return $this->redirect(['/websites']);
    	}
    	return $this->render('create', [
    			'website' => $website
    		]);
    }

    /**
     * Deletes an existing Website model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        Yii::$app->response->format = 'json';
        return  ['errors' => ''];
    }

    /**
     * Finds the Website model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Website the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Website::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
