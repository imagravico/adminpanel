<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-globe" style="margin:-14px 0 0 0;"></i>Edit Website</h1>
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
						<label class="col-md-3 control-label" for="val_website">Domain <span class="text-danger">*</span></label>
						<div class="col-md-9">
							<div class="input-group">
								<input type="text" id="val_website" name="val_website" class="form-control" value="">
								<span class="input-group-addon"><i class="gi gi-globe"></i></span>
							</div>
						</div>
					</div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-category">Online since <span class="text-danger">*</span></label>
                        <div class="col-md-9">
							<div class="input-group">
								<input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="dd.mm.yyyy" placeholder="dd.mm.yyyy">
								<span class="input-group-addon"><i class="gi gi-calendar"></i></span>
							</div>
                        </div>
                    </div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="example-select2">Client <span class="text-danger">*</span></label>
						<div class="col-md-9">
							<select id="example-select2" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one..">
								<option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
								<option value="HTML">A Client Name</option>
								<option value="CSS">B Client Name</option>
							</select>
						</div>
					</div>
                </form>
                <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->
			
			<!-- Checklist Block -->
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
				
                <table id="checklist" class="table table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td>
								Monthly Report<br>
								<small>
									<span class="badge"><i class="fa fa-clock-o"></i> Created: 12. December 2012</span>
									<span class="badge"><i class="fa fa-user"></i> By: User First Last</span>
									<span class="badge"><i class="fa fa-envelope"></i> E-Mail: 12. December 2012</span>
								</small>
                            </td>
                            <td class="text-right">
								<div class="checklist-buttons">
									<a data-toggle="modal" href="#modal-send-edit" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i> Send to Client</a>
									<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Download</a>
									<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
								</div>
                            </td>
                        </tr>
						<tr>
                            <td>
								Other Checklist<br>
								<small>
									<span class="badge"><i class="fa fa-clock-o"></i> Created: 12. December 2012</span>
									<span class="badge"><i class="fa fa-user"></i> By: User First Last</span>
								</small>
                            </td>
                            <td class="text-right">
								<div class="checklist-buttons">
									<a data-toggle="modal" href="#modal-send-edit" class="btn btn-xs btn-default"><i class="fa fa-mail-forward"></i> Send to Client</a>
									<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-download"></i> Download</a>
									<a data-toggle="modal" href="#modal-website-edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
									<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
								</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Checklist Content -->
            </div>
            <!-- END Checklist Block -->
			
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
			
			<!-- Message Block -->
            <div class="block">
                <!-- Message Title -->
                <div class="block-title">
                    <h2><i class="fa fa-envelope"></i> Messages</h2>
                </div>
                <!-- END Message Title -->

				<span class="help-block">Activate automatically messages which will be sent to the client email address.</span>
				
                <!-- Message Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Anniversary Day</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
                </form>
                <!-- END Message Content -->
            </div>
            <!-- END Message Block -->
			
			<!-- Reminder Block -->
            <div class="block">
                <!-- Reminder Title -->
                <div class="block-title">
                    <h2><i class="fa fa-bell"></i> Reminders</h2>
                </div>
                <!-- END Reminder Title -->

				<span class="help-block">Send reminder messages to inform the sysadmin about the maturity of associated checklists.</span>
				
                <!-- Reminder Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Project Initiation?</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-6 control-label">Other Checklist?</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-6 control-label">Other Checklist?</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
                </form>
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

<!-- Send, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-send-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-envelope"></i> Send to Client</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
						<label class="col-md-3 control-label" for="product-id">Subject</label>
						<div class="col-md-9">
							<input type="text" id="product-id" name="product-id" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="product-short-description">Message</label>
						<div class="col-md-9">
							<textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="10" class="form-control textarea-editor"></textarea>
						</div>
					</div>
                    <div class="form-group form-actions">
                        <div class="col-xs-12 text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Send -->

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

<!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-website-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-list"></i> Checklist</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    
					<div class="form-group">
						<img src="demo/title.JPG" class="img-responsive" style="width:80%;"><br /><br />
						<img src="demo/date.JPG" class="img-responsive" style="width:80%;"><br /><br />
						<img src="demo/backup.JPG" class="img-responsive" style="width:100%;"><br /><br />
						<img src="demo/general.JPG" class="img-responsive" style="width:100%;"><br /><br />
						<img src="demo/plugins.JPG" class="img-responsive" style="width:100%;"><br /><br />
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