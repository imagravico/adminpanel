<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\User;
use app\components\widgets\NotesWidget;
use app\components\widgets\MSettingsWidget;
use app\components\widgets\CSettingsWidget;

?>
<div class="block clearfix">
    <!-- Actions Title -->
    <div class="block-title">
        <h2><i class="fa fa-pencil"></i> Actions</h2>
    </div>
    <!-- END Actions Title -->

	<!-- Info Content -->
    <table class="table table-borderless table-striped">
        <tbody>
            <tr>
                <td><strong>Created</strong></td>
                <td>
                	<a href="javascript:void(0)">
                		<?= User::getRealName();?><br>
                		<?= date('j. F Y', strtotime($website->created_at)) ?>
                	</a>
                </td>
            </tr>
            <tr>
                <td><strong>Updated</strong></td>
                <td>
                	<a href="javascript:void(0)">
                		<?= User::getRealName();?><br><?= date('j. F Y', strtotime($website->updated_at)) ?>
                	</a>
            	</td>
            </tr>
        </tbody>
    </table>
    <!-- END Info Content -->
	
    <!-- Actions Content -->
    <div class="form-group form-actions block-actions clearfix">
        <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-floppy-o"></i> 
                <?= ($website->isNewRecord) ? "Create" : "Update";?>
            </button>
			<a href="/websites" class="btn btn-sm btn-primary" data-redirect="/websites"><i class="fa fa-times"></i> Cancel</a>
        </div>
        <?php 
                if (!$website->isNewRecord) {
            ?>
                    <div class="col-md-6 text-right">
                        <a href="/websites/delete/<?= $website->id?>" class="btn btn-sm btn-danger del" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                    </div>
            <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>
<!-- Checklists settings -->
<?= CSettingsWidget::widget(['belong_to' => 2]); ?>
<!-- Messages settings -->
<?= MSettingsWidget::widget(['belong_to' => 2]); ?>

<!-- Notes widget -->
<?php 
    $website_id = \Yii::$app->request->get('id');
    if ($website_id)
        echo NotesWidget::widget(['area' => 1, 'belong_to' => $website_id]); 
?>