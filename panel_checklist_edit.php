<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-list" style="margin:-14px 0 0 0;"></i>Edit Checklist</h1>
        </div>
    </div>
    <!-- END Forms General Header -->

    <!-- Product Edit Content -->
    <div class="row">
        <div class="col-lg-8">
			<!-- General Data Block -->
            <div class="block">
                <!-- General Data Title -->
                <div class="block-title">
                    <h2><i class="fa fa-pencil"></i> General</h2>
                </div>
                <!-- END General Data Title -->

                <!-- General Data Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
					<div class="form-group">
						<label class="col-md-3 control-label">Active?</label>
						<div class="col-md-9">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">Title</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="Monthly Report">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">Subtitle</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="Berg Informatik">
                        </div>
                    </div>
                </form>
                <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->
			
            <!-- Message Block -->
            <div class="block">
                <!-- Message Title -->
                <div class="block-title">
                    <h2><i class="fa fa-list"></i> Checklist</h2>
                </div>
                <!-- END Message Title -->
					
				<!-- Navigation Tabs Content -->
				<a href="javascript:void(0)" id="cl-title" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Title</a>
				<a href="javascript:void(0)" id="cl-subtitle" class="btn btn-alt btn-default"><i class="fa fa-header"></i> Subtitle</a>
				<a href="javascript:void(0)" id="cl-text" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Text</a>
				<a href="javascript:void(0)" id="cl-textarea" class="btn btn-alt btn-default"><i class="fa fa-code-fork  themed-color-dark"></i> Textarea</a>
				<a href="javascript:void(0)" id="cl-checkbox" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Checkbox</a>
				<a href="javascript:void(0)" id="cl-switch" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Switch</a>
				<a href="javascript:void(0)" id="cl-rating" class="btn btn-alt btn-default"><i class="fa fa-code-fork themed-color-dark"></i> Rating</a>

				<div id="InputsWrapper"></div>
            </div>
            <!-- END Message Block -->
        </div>
        <div class="col-lg-4">
			
			<!-- Actions Block -->
            <div class="block">
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
                            <td><a href="javascript:void(0)">John Doe<br>5. February 2015</a></td>
                        </tr>
                        <tr>
                            <td><strong>Updated</strong></td>
                            <td><a href="javascript:void(0)">John Doe<br>12. February 2015</a></td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
				
                <!-- Actions Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group form-actions">
                        <div class="col-md-6 text-left">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Save</button>
							<button type="reset" class="btn btn-sm btn-primary"><i class="fa fa-times"></i> Cancel</button>
                        </div>
						<div class="col-md-6 text-right">
							<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
						</div>
                    </div>
                </form>
                <!-- END Actions Content -->
            </div>
            <!-- END Actions Block -->
			
			<!-- Reminder Block -->
            <div class="block">
                <!-- Reminder Title -->
               <div class="block-title">
                    <div class="block-options pull-right">
						<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-website-edit">Add Schedule <i class="fa fa-plus"></i></a>
                    </div>
                    <h2><i class="fa fa-bell-o"></i> Schedules</h2>
                </div>
                <!-- END Reminder Title -->

				<span class="help-block">The AdminPanel sends automatically an email reminder to the Sysadmin in the defined cycle.</span>
				
                <!-- Reminder Content -->
                <table class="table table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td>
								<small data-toggle="tooltip" data-original-title="Client"><span class="label label-default"><i class="fa fa-fw fa-user"></i></span></small>
								<small data-toggle="tooltip" data-original-title="Active"><span class="label label-default"><i class="fa fa-fw fa-bell"></i></span></small>
								Monthly Report
							</td>
                            <td class="text-right" style="width:140px;">
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
                            </td>
                        </tr>
						<tr>
                            <td>
								<small data-toggle="tooltip" data-original-title="Client"><span class="label label-default"><i class="fa fa-fw fa-user"></i></span></small>
								<small data-toggle="tooltip" data-original-title="Active"><span class="label label-default"><i class="fa fa-fw fa-bell"></i></span></small>
								Other Message sTitle
							</td>
                            <td class="text-right" style="width:140px;">
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
                            </td>
                        </tr>
						<tr>
                            <td>
								<small data-toggle="tooltip" data-original-title="Website"><span class="label label-default"><i class="fa fa-fw fa-globe"></i></span></small>
								<small data-toggle="tooltip" data-original-title="Not active"><span class="label label-default"><i class="fa fa-fw fa-bell-slash"></i></span></small>
								Other Message Title
							</td>
                            <td class="text-right" style="width:140px;">
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
								<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Reminder Content -->
            </div>
            <!-- END Reminder Block -->
			
			<!-- Notes Block -->
            <div class="block full">
                <!-- Notes Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-note-edit">Add Note <i class="fa fa-plus"></i></a>
                    </div>
                    <h2><i class="fa fa-quote-right"></i> Notes</h2>
                </div>
                <!-- END Notes Title -->
				
                <!-- Notes Content -->
				<style>
					.media-list { margin:0; }
					.media-list .media .link-hover {min-width:120px; min-height:50px;}
					.media-list .media .link-hover a {display:none;}
					.media-list .media:hover .link-hover a {display:initial;}
				</style>
                <ul class="media-list">
                    <li class="media clearfix">
                        <a href="page_ready_user_profile.php" class="pull-left">
                            <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                        </a>
                        <div class="media-body">
                            <span class="text-muted text-right pull-right link-hover">
								<small><em>30 min ago</em></small><br>
								<a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
								<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
							</span>
                            <a href="page_ready_user_profile.php"><strong>John Doe</strong></a>
                            <p>In hac <a href="javascript:void(0)">habitasse</a> platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend.</p>
                        </div>
                    </li>
                    <li class="media clearfix">
                        <a href="page_ready_user_profile.php" class="pull-left">
                            <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="img-circle">
                        </a>
                        <div class="media-body">
                            <span class="text-muted text-right pull-right link-hover">
								<small><em>30 min ago</em></small><br>
								<a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> Edit</a>
								<a href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
							</span>
                            <a href="page_ready_user_profile.php"><strong>John Doe</strong></a>
                            <p>Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                        </div>
                    </li>
                </ul>
                <!-- END Notes Content -->
            </div>
            <!-- END Notes Block -->
			
        </div>
    </div>
    <!-- END Product Edit Content -->
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
<script src="js/ckeditor/ckeditor.js"></script>

<?php include 'inc/template_end.php'; ?>

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-website-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-bell-o"></i> Schedule</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
				
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">

					<div class="form-group">
						<label class="col-md-3 control-label">Active?</label>
						<div class="col-md-9">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="product-id">Subject</label>
						<div class="col-md-9">
							<input type="text" id="product-id" name="product-id" class="form-control" value="Monthly Report">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="product-short-description">Message</label>
						<div class="col-md-9">
							<textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="10" class="form-control textarea-editor"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="relation">Relation?</label>
						<div class="col-md-9">
							<select id="mark" name="mark" class="form-control">
								<option value="">--</option>
								<option value="r1">Client</option>
								<option value="r2">Website</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-3">
							<ul class="nav nav-tabs tabs-left">
							  <li class="active"><a href="#tab-event-based" data-toggle="tab">Event based</a></li>
							  <li><a href="#tab-periodically" data-toggle="tab">Periodically</a></li>
							</ul>
						</div>

						<div class="col-xs-9">
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active" id="tab-event-based">
									<div style="margin-bottom:10px;">
										<label class="control-label" for="event" style="font-weight:normal;">Which event?</label>
										<select id="series" name="series" class="form-control">
											<option value="">--</option>
											<option value="rs1" class="r1">Client Birthday</option>
											<option value="rs2" class="r1">Client Date Created</option>
											<option value="rs3" class="r1">Client Date Updated</option>
											<option value="rs4" class="r2">Website Online Date</option>
											<option value="rs5" class="r2">Website Date Created</option>
											<option value="rs6" class="r2">Website Date Updated</option>
										</select>
									</div>
									<div>
										<label class="control-label" for="model" style="font-weight:normal;">Send message on?</label>
										<select id="model" name="model" class="form-control">
											<option value="">--</option>
											<option value="rsm1" class="rs1 rs2 rs3 rs4 rs5 rs6">Half anniversary</option>
											<option value="rsm2" class="rs1 rs2 rs3 rs4 rs5 rs6">Anniversary</option>
										</select>
									</div>
								</div>
								<div class="tab-pane" id="tab-periodically">
									<div class="cron-select"></div>
								</div>
							</div>
						</div>
					</div>

                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END User Settings -->

<!-- Notes, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-note-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-quote-right"></i> Note</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
						<div class="col-xs-12">
							<textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="10" class="form-control textarea-editor"></textarea>
						</div>
					</div>
					
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Notes -->

<script>
$(document).ready(function() {
			
	/* cron select */
	$('.cron-select').cron();
	
	/* chained select */
	$("#series").chained("#mark");
	$("#model").chained("#series");
	
	/* form generator */
	var MaxInputs = 100; //Maximum input boxes allowed
				
	var InputsWrapper = $("#InputsWrapper"); //Input box wrapper ID
	var MaxInputsCount = InputsWrapper.length; //Initial field count
                
	/*------------------
	to get fields button ID
	------------------*/
	var clTitle = $('#cl-title');
	var clTitleCount = 0;

	var clSubtitle = $('#cl-subtitle');
	var clSubtitleCount = 0;

	var clText = $('#cl-text');
	var clTextCount = 0;

	var clTextarea = $('#cl-textarea');
	var clTextareaCount = 0;

	$(InputsWrapper).sortable();  		// to make added fields sortable
				
	/*------------------------------------------------
	Add Title field 
	-------------------------------------------------*/
	$(clTitle).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<h1 class="cl-title" data-type="text">Title</h1>');
			returnAccess();
			
			clTitleCount++;
			MaxInputsCount++;
		}
		
		return false;
	});


	/*------------------------------------------------
	Add Subtitle field 
	-------------------------------------------------*/
	$(clSubtitle).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<h2 class="cl-subtitle" data-type="text">Subtitle</h2>');
			returnAccess();
			
			clSubtitleCount++;
			MaxInputsCount++;
		}
		
		return false;
	});

	/*------------------------------------------------
	Add Text field 
	-------------------------------------------------*/
	$(clText).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text">Text</label><input type="text"></input></div>');
			returnAccess();
			
			clTextCount++;
			MaxInputsCount++;
		}
		return false;
	});

	/*------------------------------------------------
	Add Text textarea 
	-------------------------------------------------*/
	$(clTextarea).click(function()  		
	{
		if(MaxInputsCount <= MaxInputs)
		{
			$(InputsWrapper).append('<div class="form-group"><label class="cl-label" data-type="text">Text</label><textarea></textarea></div>');
			returnAccess();
			
			clTextareaCount++;
			MaxInputsCount++;
		}
		return false;
	});

	function returnAccess()
	{
		$('.cl-title, .cl-subtitle, .cl-label').editable();
	}
    
    // trigger function in the beginning
    returnAccess();

	/*------------------------------------------------
	 Remove Element
	 -------------------------------------------------*/
	$("body").on("click", ".cl-remove-element", function(e)
	{
		e.preventDefault();

		if(confirm('Really remove this element?'))
		{
			$(this).closest('fieldset').remove();
			MaxInputsCount--;
		}

		return true;
	});
	
});
</script>