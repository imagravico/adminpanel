<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\User;
use app\components\widgets\NotesWidget;

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
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Create</button>
			<button type="reset" class="btn btn-sm btn-primary cancel" data-redirect="/clients"><i class="fa fa-times"></i> Cancel</button>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>

<!-- Notes widget -->
<?php echo NotesWidget::widget(); ?>