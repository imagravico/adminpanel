<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="content-header">
        <div class="header-section">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <?php  
        Pjax::begin([
            'enablePushState'=>false,
        ]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'export'       => false,
            'columns'      => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'username',
                'lastname',
                'firstname',
                'email:email',
                // 'password',
                // 'token',
                // 'auth_key',
                // 'active',
                // 'created_at',
                // 'updated_at',

                ['class' => 'yii\grid\ActionColumn'],
            ],
            'panel' => [
                'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create', ['create'], ['class' => 'btn btn-success']),
                'footer' => true
            ],
        ]); 
        Pjax::end();
    ?>

</div>
