<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/**
 * @var yii\web\View $this
 * @var mdm\admin\models\AuthItem $model
 */
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-view">
    <div class="content-header">
        <div class="header-section">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
    </div>

    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?php
        echo Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]);
        ?>
    </p>

    <?php
    echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'ruleName',
            'data:ntext',
        ],
    ]);
    ?>
    <div class="col-lg-5">
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-text-input"><?= Yii::t('rbac-admin', 'Avaliable') ?>
            </label>
            <div class="col-md-9">
                <?php
                    echo Html::textInput('search_av', '', ['class' => 'role-search form-control', 'data-target' => 'avaliable']) . '<br>';
                    echo Html::listBox('roles', '', $avaliable, [
                        'id' => 'avaliable',
                        'multiple' => true,
                        'size' => 20,
                        'style' => 'width:100%']);
                ?>
            </div>
        </div>
        
    </div>
    <div class="col-lg-1">
        &nbsp;<br><br>
        <?php
        echo Html::a('>>', '#', ['class' => 'btn btn-success', 'data-action' => 'assign']) . '<br>';
        echo Html::a('<<', '#', ['class' => 'btn btn-success', 'data-action' => 'delete']) . '<br>';
        ?>
    </div>
    <div class="col-lg-5">
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-text-input"><?= Yii::t('rbac-admin', 'Avaliable') ?>
            </label>
            <div class="col-md-9">
                <?php
                    echo Html::textInput('search_asgn', '', ['class' => 'role-search form-control','data-target' => 'assigned']) . '<br>';
                    echo Html::listBox('roles', '', $assigned, [
                        'id' => 'assigned',
                        'multiple' => true,
                        'size' => 20,
                        'style' => 'width:100%']);
                ?>
            </div>
        </div>
        
    </div>
</div>
<?php
$this->render('_script',['name'=>$model->name]);
