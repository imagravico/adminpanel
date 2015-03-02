<?php
use app\models\Checklist;

$this->registerJsFile('/web/js/editable-checklist.js', ['depends' => [\app\assets\AppAsset::className()]]);
?>

<div class="block">
    <!-- Checklist Title -->
   	<div class="block-title dropdown">
        <div class="block-options pull-right">
            <button class="btn btn-sm btn-alt btn-default dropdown-toggle" type="button" id="dropdownChecklist" data-toggle="dropdown" aria-expanded="true">
                Choose Checklist
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownChecklist" id="choose-checklists">
            <?php
            
                $checklists = Checklist::getChecklistBelong($belong_to);
                if ($checklists) {

                    foreach ($checklists as $key => $checklist) {
                        if (!empty($checklist->cschedule)) {

            ?>

                <li role="presentation">
                    <a data-toggle="modal" href="#modal-checklist-edit" class="btn-edit-checklist" data-checklist-id="<?= $checklist->id ?>"><?= $checklist->title; ?></a>
                </li>

            <?php
                        }
                    }
                } 
            ?>
            </ul>
        </div>
        <!-- <div class="block-options pull-right">
			<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-website-edit">Add Checklist <i class="fa fa-plus"></i></a>
        </div> -->
	   <h2><i class="fa fa-list"></i> Checklists</h2>
    </div>
    <!-- END Checklist Title -->

    <!-- Checklist Content -->
	<style>
		#checklist tr td .checklist-buttons {display:none;}
		#checklist tr:hover td .checklist-buttons {display:initial;}
	</style>
	<div id="cl-list">
        <?= $this->render('_list', ['belong_to' => $belong_to]);?>
    </div>
</div>
<?= $this->render('_edit_checklist_modal') ?>



