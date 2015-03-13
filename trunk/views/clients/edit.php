<?php
use yii\bootstrap\ActiveForm;
use app\models\Activity;
use app\components\widgets\ActivitiesWidget;
use app\components\widgets\ChecklistsWidget;
?>

<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-user" style="margin:-14px 0 0 0;"></i>Edit Client</h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-8">
		<?php echo $this->render('_form', [
				'client' => $client,
				'groups' => $groups
		]); ?>
		<?php
			echo ActivitiesWidget::widget(['belong_to' => \Yii::$app->request->get('id')]);
		?>
		<?= ChecklistsWidget::widget(['belong_to' => 1]);?>
	</div>

	<div class="col-lg-4 col-xs-12">
		<?php echo $this->render('_right', [
				'client' => $client
		]); ?>
	</div>
</div>

<!-- Load some popup -->
<div id="modal-activity-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-clock-o"></i> Activity</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body" id="wrap-form-activity">
				<?= $this->render('@widget/views/activities/_form', [
						'model' => new Activity(),
						'belong_to' => \Yii::$app->request->get('id')
					]);
				?>
			</div>	
		</div>
	</div>
</div>

<?= $this->render('@widget/views/checklists/_sendmail_modal_form');?>

