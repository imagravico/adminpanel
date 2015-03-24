<?php 
use app\models\Group;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<?php
    $form = ActiveForm::begin([
        'id'      => 'form-note',
        'action' => '#',
        'enableClientValidation' => true,
        'validateOnSubmit' => true,
        'enableAjaxValidation' => false,
        'options' => [
            'class'   => 'form-bordered',
            'data-update' => '.notes-list'
        ],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'control-label',
            ],
        ],
    ]); 
?>
<?=
    $form->field($note, 'content')->textArea(['rows' => '6', 'class' => 'form-control textarea-editor', 'id' => 'textarea-wysiwyg'])
    ->label(false)

?>
<?php
    echo Html::activeHiddenInput($note, 'type_area', [
                'value' => $type_area
        ]);
?>
<?php
    echo Html::activeHiddenInput($note, 'belong_to', [
                'value' => $belong_to
        ]);
?>

    <div class="form-group form-actions" style="overflow:hidden">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
        </div>
    </div>
</form>
           