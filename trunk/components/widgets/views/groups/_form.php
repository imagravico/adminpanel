<?php 
use yii\bootstrap\ActiveForm;
?>
<?php 
    $form = ActiveForm::begin([
        'id'      => 'form-add-group',
        'enableClientValidation' => true,
        'validateOnSubmit' => true,
        'options' => [
            'class'   => 'form-bordered',
        ],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'control-label',
            ],
        ],
    ]); 
?>
    <?= 
        $form->field($group, 'name', [
            'template' => "{label}
                <div class='input-group form-actions'>{input}
                    <span class='input-group-btn'>
                        <button class='btn btn-sm btn-primary add' id='add-group'>
                            <i class='fa fa-plus'></i> Add
                        </button>
                    </span>
                </div>\n{hint}\n{error}"
        ])->textInput((array('placeholder' => 'Name', 'class' => 'form-control')))
    ?>  


    <div id="list-group">
        <?php echo $this->render('_list') ?>
        
    </div>

    <div class="form-group form-actions">
        <div class="text-right">
            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
    </div>
    
<?php ActiveForm::end() ?>
