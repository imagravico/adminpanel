<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\components\widgets\ActivitiesWidget;

?>

<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-user" style="margin:-14px 0 0 0;"></i>Add Client</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<?php echo $this->render('_form', [
				'client' => $client,
				'groups' => $groups
		]); ?>
		<?= ActivitiesWidget::widget();?>
	</div> 
	<!-- END col-lg-8 -->
	
	<!-- LEFT -->
	<div class="col-lg-4 col-xs-12">
		<?php echo $this->render('_right', [
				'client' => $client
		]); ?>
	</div>
</div>
<!-- Load some popup -->

<?= $this->render('@widget/views/activities/_form');?>