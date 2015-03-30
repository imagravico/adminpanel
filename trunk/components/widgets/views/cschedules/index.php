<div class="block">
    <!-- Reminder Title -->
   <div class="block-title">
        <div class="block-options pull-right">
			<a class="btn btn-sm btn-alt btn-default" id="add-cschedule-btn" data-toggle="modal" href="#modal-schedules-checklist-edit">Add Schedule <i class="fa fa-plus"></i></a>
        </div>
        <h2><i class="fa fa-bell-o"></i> Schedules</h2>
    </div>
    <!-- END Reminder Title -->

	<span class="help-block">The AdminPanel sends automatically an email reminder to the Sysadmin in the defined cycle.</span>
	
    <!-- Reminder Content -->
    <div id="list-cschedules">
        <?= $this->render('_list', ['checklists_id' => $checklists_id]);?>
    </div>
    <!-- END Reminder Content -->
</div>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-schedules-checklist-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-bell-o"></i> Schedule</h2>
            </div>
            <!-- END Modal Header -->
            <!-- Modal Body -->
            <div class="modal-body" id="mschedule-form">
            <?=
                $this->render('_form', [
                        'checklists_id' => $checklists_id
                    ])
            ?>
            </div>
        </div>
    </div>
</div>
<!-- END User Settings -->
