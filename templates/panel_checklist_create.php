<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-user" style="margin:-14px 0 0 0;"></i>Edit Client</h1>
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
                        <label class="col-xs-3 control-label">
                            <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
                        </label>
                        <div class="col-xs-9">
                            <i class="fa fa-fw fa-upload"></i> <a href="javascript:void(0)">Upload New Avatar</a><br>
                            <i class="fa fa-fw fa-picture-o"></i> <a href="javascript:void(0)">Choose from Library</a><br><br>
                            <i class="fa fa-fw fa-times"></i> <a href="javascript:void(0)" class="text-danger">Remove Avatar</a>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">Company</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="Company Name">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-id">First Name</label>
                        <div class="col-md-9">
                            <input type="text" id="product-id" name="product-id" class="form-control" value="Peter">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="product-name">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" id="product-name" name="product-name" class="form-control" placeholder="Muster">
                        </div>
                    </div>
					 <div class="form-group">
                        <label class="col-md-3 control-label" for="product-name">E-Mail</label>
                        <div class="col-md-9">
                            <input type="text" id="product-name" name="product-name" class="form-control" placeholder="peter.muster@undefiniert.ch">
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-3 control-label" for="product-category">Birthday</label>
                        <div class="col-md-9">
                            <input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="dd.mm.yyyy" placeholder="dd.mm.yyyy">
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
						<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-website-edit">Create Report <i class="fa fa-plus"></i></a>
                    </div>
				   <h2><i class="fa fa-globe"></i> Client <strong>Reports</strong></h2>
                </div>
                <!-- END Checklist Title -->

                <!-- Checklist Content -->
                <table class="table table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td>
                                <a href="http://www.undefiniert.ch" target="_blank">undefiniert.ch</a><br>
								<small>Online since: 12.12.2012<br>
                                <span class="badge">Monthly Report</span></small>
                            </td>
                            <td class="text-center" style="width: 70px;">
                                <div class="btn-group btn-group-xs">
                                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-default"><i class="fa fa-pencil"></i> Edit</a>
                                </div>
                            </td>
                        </tr>
						<tr>
                            <td>
                                <a href="http://www.berginformatik.ch" target="_blank">berginformatik.ch</a><br>
								<small>Online since: 12.12.2012<br>
                                <span class="badge">Monthly Report</span></small>
                            </td>
                            <td class="text-center" style="width: 70px;">
                                <div class="btn-group btn-group-xs">
                                    <a data-toggle="modal" href="#modal-website-edit" class="btn btn-default"><i class="fa fa-pencil"></i> Edit</a>
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
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Update</button>
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
                    <h2><i class="fa fa-pencil"></i> Messages</h2>
                </div>
                <!-- END Message Title -->

				<span class="help-block">Activate automatically messages which will be sent to the client email address.</span>
				
                <!-- Message Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Happy Birthday?</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-6 control-label">Merry Christmas?</label>
                        <div class="col-md-6">
                            <label class="switch switch-primary">
                                <input type="checkbox" id="product-status" name="product-status" checked><span></span>
                            </label>
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-md-6 control-label">Happy New Year?</label>
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
                    <h2><i class="fa fa-pencil"></i> Reminders</h2>
                </div>
                <!-- END Reminder Title -->

				<span class="help-block">Send reminder messages to inform the sysadmin about the maturity of associated checklists.</span>
				
                <!-- Reminder Content -->
                <form action="page_ecom_product_edit.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
                        <label class="col-md-6 control-label">Monthly Report?</label>
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

<!-- Notes, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-note-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-pencil"></i> Edit Note</h2>
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
            <div class="modal-header text-center">
                <h2 class="modal-title"><i class="fa fa-pencil"></i> Edit Website</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                        
					<div class="form-group">
						<label class="col-md-4 control-label" for="val_website">Website <span class="text-danger">*</span></label>
						<div class="col-md-6">
							<div class="input-group">
								<input type="text" id="val_website" name="val_website" class="form-control" value="http://">
								<span class="input-group-addon"><i class="gi gi-globe"></i></span>
							</div>
						</div>
					</div>

					<div class="form-group">
                        <label class="col-md-4 control-label" for="product-category">Online since</label>
                        <div class="col-md-6">
                            <input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="dd.mm.yyyy" placeholder="dd.mm.yyyy">
                        </div>
                    </div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Monthly Report?</label>
						<div class="col-md-8">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">Semiannual Report?</label>
						<div class="col-md-8">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-4 control-label">Send Website Anniversary Message?</label>
						<div class="col-md-8">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
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