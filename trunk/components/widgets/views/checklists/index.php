<?php
    $this->registerJsFile('/web/js/editable-checklist.js', ['depends' => [\app\assets\AppAsset::className()]]);
?>
<div class="block">
    <!-- Checklist Title -->
   	<div class="block-title">
        <div class="block-options pull-right">
			<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-website-edit">Add Checklist <i class="fa fa-plus"></i></a>
        </div>
	   <h2><i class="fa fa-list"></i> Checklists</h2>
    </div>
    <!-- END Checklist Title -->

    <!-- Checklist Content -->
	<style>
		#checklist tr td .checklist-buttons {display:none;}
		#checklist tr:hover td .checklist-buttons {display:initial;}
	</style>
	
    <?= $this->render('_list', ['belong_to' => $belong_to]);?>
</div>
<!-- checklist edition modal -->
<div id="modal-checklist-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-list"></i> Checklist</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="checklist-content">
                
                    <div class="control">
                        <a href="javascript:void(0)" id="cl-title" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Title</a>
                        <a href="javascript:void(0)" id="cl-subtitle" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Subtitle</a>
                        <a href="javascript:void(0)" id="cl-text" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Text</a>
                        <a href="javascript:void(0)" id="cl-textarea" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Textarea</a>
                        <a href="javascript:void(0)" id="cl-checkbox" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Checkbox</a>
                        <a href="javascript:void(0)" id="cl-switch" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Switch</a>
                        <a href="javascript:void(0)" id="cl-rating" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Rating</a>
                    </div>
                    <div id="InputsWrapper">
                        
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default btn-cl-close" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-sm btn-primary save-checklist">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>

