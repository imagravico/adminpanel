<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\Assignment */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index">
    <div class="content-header">
        <div class="header-section">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>
    <div class="col-lg-8">
        <!-- General Data Block -->
        <div class="block">
            <!-- General Data Title -->
            <div class="block-title">
                <h2><i class="fa fa-pencil"></i> General</h2>
            </div>
            <!-- END General Data Title -->
        </div>
        <table id="general-table" class="table table-striped table-vcenter">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Subscription</th>
                    <th style="width: 150px;" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><a href="page_ready_user_profile.php">client1</a></td>
                    <td>client1@example.com</td>
                    <td><a href="javascript:void(0)" class="label label-warning">Trial</a></td>
                    <td class="text-center">
                        <div class="btn-group btn-group-xs">
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="javascript:void(0)" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Delete"><i class="fa fa-times"></i></a>
                        </div>
                    </td>
                </tr>
                
            </tbody>
            
        </table>
        <!-- END General Data Block -->
    </div>
	<?php
    Pjax::begin([
        'enablePushState'=>false,
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'options' => [
            'class' => 'aaa'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\DataColumn',
                'attribute' => $usernameField,
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{view}'
            ],
        ],
    ]);
    Pjax::end();
    ?>

</div>
