<?php
	$this->registerJsFile('/web/js/editable-checklist.js', ['depends' => [app\assets\AppAsset::className()]]);
?>
<!-- Message Block -->
<div class="block">
    <!-- Message Title -->
    <div class="block-title">
        <h2><i class="fa fa-list"></i> Checklist</h2>
    </div>
    <!-- END Message Title -->
	<div class="form-horizontal form-bordered">
		<div class="form-group control">
			<!-- Navigation Tabs Content -->
			<a href="javascript:void(0)" id="cl-title" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Title</a>
			<a href="javascript:void(0)" id="cl-subtitle" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Subtitle</a>
			<a href="javascript:void(0)" id="cl-text" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Text</a>
			<a href="javascript:void(0)" id="cl-textarea" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Textarea</a>
			<a href="javascript:void(0)" id="cl-checkbox" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Checkbox</a>
			<a href="javascript:void(0)" id="cl-switch" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Switch</a>
			<a href="javascript:void(0)" id="cl-rating" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Rating</a>
		</div>
		<div class="form-group control">
			<div id="InputsWrapper">
				<?= $checklist->content; ?>		
			</div>
		</div>
		
		<div class="form-group form-actions">
            <div class="col-xs-12 text-right">
                <button class="save-cl btn btn-sm btn-primary" style="margin:15px;" type="button">Save Changes</button>
            </div>
        </div>

		
	</div>
</div>
<!-- END Message Block -->