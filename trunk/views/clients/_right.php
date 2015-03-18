<?php
use yii\bootstrap\ActiveForm;
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
			<a href="/clients" class="btn btn-sm btn-primary cancel" ><i class="fa fa-times"></i> Cancel</a>
        </div>
        <?php 
                if (!$client->isNewRecord) {
            ?>
                    <div class="col-md-6 text-right">
                        <a href="/clients/delete/<?= $client->id ?>" class="btn btn-sm btn-danger del" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</a>
                    </div>
            <?php } ?>
    </div>
    <?php ActiveForm::end(); ?>
    <!-- END Actions Content -->
</div>
<?php echo MSettingsWidget::widget(['belong_to' => 1]); ?>

<?= CSettingsWidget::widget(['belong_to' => 1]); ?>
<!-- Notes widget -->
<?php
    $client_id = \Yii::$app->request->get('id');
    if ($client_id) 
        echo NotesWidget::widget(['area' => 0, 'belong_to' => $client_id]); 
?>


