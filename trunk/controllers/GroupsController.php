<?php

namespace app\controllers;

use Yii;
use app\models\Group;
use yii\web\NotFoundHttpException;

class GroupsController extends \yii\web\Controller
{
    public function actionCreate()
    {
    	$group = new Group();
    	if ($group->load(Yii::$app->request->post()) && $group->save())
    	{
    		return $this->renderPartial('@widget/views/groups/_add', [
				'group' => $group
			]);	
    	}
    	return $this->renderPartial('@widget/views/groups/_add', [
				'group' => $group
			]);	
    }

    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $group = new Group();
        
        return $this->renderPartial('@widget/views/groups/_add', [
                'group'  => $group,
                'errors' => ''
            ]); 
    }

    /**
     * Edit an existing Group model
     * @param  integer $id
     * @return mixed
     */
    public function actionEdit($id) 
    {
        $group = $this->findModel($id);
        $group->name = Yii::$app->request->post()['name'];
        $group->save();

        return $this->renderPartial('@widget/views/groups/_add'); 
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        } 
        else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
