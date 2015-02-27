<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\components\widgets\ActivitiesWidget;
use app\components\widgets\ChecklistsWidget;


?>

<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-globe" style="margin:-14px 0 0 0;"></i>Add Website</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<?php echo $this->render('_form', [
				'website' => $website,
		]); ?>
		<?= ChecklistsWidget::widget(['belong_to' => 2]);?>
	</div> 
	<!-- END col-lg-8 -->
	
	<!-- LEFT -->
	<div class="col-lg-4 col-xs-12">
		<?php echo $this->render('_right', [
				'website' => $website
		]); ?>
	</div>
</div>
