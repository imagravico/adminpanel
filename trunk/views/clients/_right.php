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
                		<?= date('j. F Y', $client->created_at) ?>
                	</a>
                </td>
            </tr>
            <tr>
                <td><strong>Updated</strong></td>
                <td>
                	<a href="javascript:void(0)">
                		<?= User::getRealName();?><br><?= date('j. F Y', $client->updated_at) ?>
                	</a>
            	</td>
            </tr>
        </tbody>
    </table>
    <!-- END Info Content -->
	
    <!-- Actions Content -->
    <div class="form-group form-actions clearfix">
        <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-floppy-o"></i> 
                <?php echo ($client->isNewRecord) ? "Create" : "Update";?>
            </button>
			<button type="reset" class="btn btn-sm btn-primary cancel" data-redirect="/clients"><i class="fa fa-times"></i> Cancel</button>
        </div>
        <?php 
                if (!$client->isNewRecord) {
            ?>
                    <div class="col-md-6 text-right">
                        <button type="reset" class="btn btn-sm btn-danger del" data-to="/clients/delete/<?= $client->id?>" data-redirect="/clients"><i class="fa fa-trash"></i> Delete</button>
                    </div>
            <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>
<?php echo MSettingsWidget::widget(['belong_to' => 1]); ?>
<!-- Notes widget -->
<?php echo NotesWidget::widget(['area' => 0]); ?>