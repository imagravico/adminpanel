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
use app\components\widgets\MschedulesWidget;

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
                		<?= date('j. F Y', strtotime($message->created_at)) ?>
                	</a>
                </td>
            </tr>
            <tr>
                <td><strong>Updated</strong></td>
                <td>
                	<a href="javascript:void(0)">
                		<?= User::getRealName();?><br><?= date('j. F Y', strtotime($message->updated_at)) ?>
                	</a>
            	</td>
            </tr>
        </tbody>
    </table>
    <!-- END Info Content -->
	
    <!-- Actions Content -->
    <div class="form-group form-actions clearfix block-actions">
        <div class="col-md-6 text-left">
            <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-floppy-o"></i> 
                <?php echo ($message->isNewRecord) ? "Create" : "Update";?>
            </button>
            <a href="/messages" class="btn btn-sm btn-primary cancel" ><i class="fa fa-times"></i> Cancel</a>
        </div>
        <?php 
                if (!$message->isNewRecord) {
            ?>
                    <div class="col-md-6 text-right">
                        <button type="reset" class="btn btn-sm btn-danger del" data-redirect="/messages" data-to="/messages/delete/<?= $message->id?>" 'data-method'='post' ><i class="fa fa-trash" onclick="return confirm('Are you sure?')"></i> Delete</button>
                    </div>
            <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>
<!-- messages schedules -->

<?php 
    if (!$message->isNewRecord) {
        echo MschedulesWidget::widget(['message_id' => $message->id]); 
    }
?>
<!-- Notes widget -->
<?php 
    $message_id = \Yii::$app->request->get('id');
    if ($message_id)
        echo NotesWidget::widget(['type_area' => 2, 'belong_to' => $message_id]); 
?>