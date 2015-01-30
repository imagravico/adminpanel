<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/**
 * @var yii\web\View $this
 */
$this->title = Yii::t('rbac-admin', 'Routes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content-header">
    <div class="header-section">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
</div>
<p>
    <?= Html::a(Yii::t('rbac-admin', 'Create route'), ['create'], ['class' => 'btn btn-success']) ?>
</p>

<div>
    <div class="col-lg-5">
        <div class="form-group">
            <label class="col-md-3 control-label" for="example-text-input"><?= Yii::t('rbac-admin', 'Avaliable') ?>
            </label>
            <div class="col-md-9">
                <?php
                    echo Html::textInput('search_av', '', ['class' => 'role-search form-control', 'data-target' => 'new']).' ';
                    echo Html::a('<span class="glyphicon glyphicon-refresh"></span>', '', ['id'=>'btn-refresh']);
                    echo '<br>';
                    echo Html::listBox('routes', '', $new, [
                        'id' => 'new',
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
                    echo Html::textInput('search_asgn', '', ['class' => 'role-search form-control', 'data-target' => 'exists']) . '<br>';
                    echo Html::listBox('routes', '', $exists, [
                        'id' => 'exists',
                        'multiple' => true,
                        'size' => 20,
                        'style' => 'width:100%',
                        'options' => $existsOptions]);
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->render('_script');
