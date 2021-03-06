<?php 
use app\models\Group;
use yii\bootstrap\ActiveForm;
?>
<?php 
    $form = ActiveForm::begin([
        'id'      => 'form-add-group',
        'action' => '#',
        'options' => [
            'class'   => 'form-bordered',
            'data-update' => '#update-group'
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
                        <button class='btn btn-sm btn-primary add' id='add-group' data-to='groups/create' data-form='#form-add-group' data-update='#update-group'>
                            <i class='fa fa-plus'></i> Add
                        </button>
                    </span>
                </div>\n{hint}\n{error}"
        ])->textInput((array('placeholder' => 'Name', 'class' => 'form-control')))
    ?>  

    <div style="padding:0 15px;" class="form-actions" id="update-group">
        <table class="table table-striped table-vcenter">
            <tbody>
                <?php 
                    $groups = Group::find()->orderBy('id DESC')->all();
                    foreach ($groups as $key => $group) 
                    {
                ?>
                        <tr>
                            <td class="text-left111"><?= $group->name ?></td>
                            <td class="text-right">
                                 <!-- Edit Button -->
                                <a data-toggle="collapse" href="javascript:void(0)" class="btn btn-xs btn-default" id="edit-group" data-target="#edit-input-<?= $group->id ?>">
                                    <i class="fa fa-pencil"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default del" data-to="/groups/delete/<?= $group->id?>">
                                    <i class="fa fa-times"></i> Delete
                                </a>

                                 <div id="edit-input-<?= $group->id ?>" class="collapse" style="margin-top:6px">
                                    <div class="input-group">
                                        <input type="text" id="edit-group-input-<?= $group->id ?>" class="form-control" value="">
                                        <span class="input-group-btn">
                                            <button class="btn btn-sm btn-primary edit" data-input="#edit-group-input-<?= $group->id ?>" data-to="/groups/edit/<?= $group->id?>">
                                                <i class="fa fa-plus"></i> Edit
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                <?php         
                    }
                ?>
            </tbody>
        </table>
    </div>

    <div class="form-group form-actions">
        <div class="text-right">
            <button type="button" class="btn btn-sm btn-default btn-close" data-dismiss="modal">Close</button>
        </div>
    </div>
    
<?php ActiveForm::end() ?>
