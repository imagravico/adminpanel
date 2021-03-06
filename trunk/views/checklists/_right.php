<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Group;
use kartik\file\FileInput;
use yii\helpers\Url;
use app\models\User;
use app\models\MessageSchedule;
use app\components\widgets\NotesWidget;
use app\components\widgets\CSchedulesWidget;

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
                		<?= date('j. F Y', strtotime($checklist->created_at)) ?>
                	</a>
                </td>
            </tr>
            <tr>
                <td><strong>Updated</strong></td>
                <td>
                	<a href="javascript:void(0)">
                		<?= User::getRealName();?><br><?= date('j. F Y', strtotime($checklist->updated_at)) ?>
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
                <?php echo ($checklist->isNewRecord) ? "Create" : "Update";?>
            </button>
            <a href="/checklists" class="btn btn-sm btn-primary cancel" ><i class="fa fa-times"></i> Cancel</a>
        </div>
        <?php 
                if (!$checklist->isNewRecord) {
            ?>
                    <div class="col-md-6 text-right">
                        <button type="reset" class="btn btn-sm btn-danger del" data-redirect="/checklists" data-to="/checklists/delete/<?= $checklist->id?>" 'data-method'='post' onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                    </div>
            <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>
<?php 
    if (!$checklist->isNewRecord) {
        echo CSchedulesWidget::widget(['checklists_id' => $checklist->id]); 
    }
?>

<!-- Notes widget -->
<?php 
    $checklist_id = \Yii::$app->request->get('id');
    if ($checklist_id)
        echo NotesWidget::widget(['type_area' => 3, 'belong_to' => $checklist_id]); 
?>
