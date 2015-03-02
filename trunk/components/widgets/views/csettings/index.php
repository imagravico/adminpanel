<?php
use app\models\Checklist;
use app\models\CSetting;
?>
<div class="block">
    <!-- Reminder Title -->
    <div class="block-title">
        <h2><i class="fa fa-bell"></i> Reminders</h2>
    </div>
    <!-- END Reminder Title -->

	<span class="help-block">Send reminder messages to inform the sysadmin about the maturity of associated checklists.</span>
	
    <!-- Reminder Content -->
    <div class="form-horizontal form-bordered" id="checklists-settings">
        <?php
            $checklists = Checklist::getChecklistBelong($belong_to);
            foreach ($checklists as $key => $checklist) {
                if (!empty($checklist->cschedule)) {

                        $checked = FALSE;
                        $csetting = CSetting::find()
                                    ->where(['clients_or_webs_id' => $idcow, 'belong_to' => $belong_to, 'checklists_id' => $checklist->id])
                                    ->one();
                        if (isset($csetting))
                            $checked = TRUE;

        ?>

                <div class="form-group">
                    <label class="col-md-6 control-label"><?= $checklist->title ?></label>
                    <div class="col-md-6">
                        <label class="switch switch-primary">
                            <input type="checkbox" id="product-status" name="product-status" class="switch-action" <?php if ($checked) echo 'checked'?> data-checklists-id="<?= $checklist->id ?>" data-belong-to="<?= $belong_to ?>"><span></span>
                        </label>
                    </div>
                </div>
    
        <?php
                    }
                }
        ?>
        
    </div>
    <!-- END Reminder Content -->
</div>