<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */

$this->title = Yii::t('rbac-admin', 'Assignments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assignment-index row">
    <div class="content-header">
        <div class="header-section">
            <h1><?= Yii::t('rbac-admin', 'Edit') ?>: <?= $model->{$usernameField} ?></h1>
        </div>
    </div>
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
                    echo Html::textInput('search_asgn', '', ['class' => 'role-search form-control', 'data-target' => 'assigned']) . '<br>';
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
$this->render('_script',['id'=>$model->{$idField}]);
