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
					<div class="form-group">
						<label class="col-md-3 control-label" for="example-chosen-multiple">Groups</label>
						<div class="col-md-9">
							<select id="example-chosen-multiple" name="example-chosen-multiple" class="select-chosen" data-placeholder="Choose some Groups.." multiple>
								<option value="United States">Business</option>
								<option value="United States">Freelancer</option>
								<option value="United States">Private</option>
							</select>
						</div>
					</div>
                </form>
                <!-- END General Data Content -->
            </div>
            <!-- END General Data Block -->
			
			<!-- Activity Block -->
            <div class="block">
                <!-- Activity Title -->
               <div class="block-title">
                    <div class="block-options pull-right">
						<a class="btn btn-sm btn-alt btn-default" data-toggle="modal" href="#modal-activity-edit">Add Activity <i class="fa fa-plus"></i></a>
                    </div>
				   <h2><i class="fa fa-clock-o"></i> Activity</h2>
                </div>
                <!-- END Activity Title -->

				<!-- Timeline Style Content -->
                <!-- You can remove the class .block-content-full if you want the block to have its regular padding -->
                <div class="timeline block-content-full">
					
					<style>
						.timeline-list:after { left:195px; }
						.timeline-list .timeline-icon { left:180px; }
						.timeline-list .timeline-time { width:170px; text-align:center; }
						.timeline-list .timeline-content { margin-left:220px; }
					</style>
					
                    <ul class="timeline-list">
                        <li>
                            <div class="timeline-icon"><i class="fa fa-info"></i></div>
                            <div class="timeline-time"><span class="badge" data-toggle="tooltip" data-original-title="12. January 2015 - 18:20"><i class="fa fa-bell"></i></span> 12. November 2014<br><small>by User First Last</small></div>
                            <div class="timeline-content">
                                <p class="push-bit"><strong>Breakfast</strong></p>
                                <p class="push-bit">An awesome breakfast will wait for you at the lobby!</p>
                                <div class="row push">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="img/placeholders/photos/photo6.jpg" data-toggle="lightbox-image">
                                            <img src="img/placeholders/photos/photo6.jpg" alt="image">
                                        </a>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <a href="img/placeholders/photos/photo7.jpg" data-toggle="lightbox-image">
                                            <img src="img/placeholders/photos/photo7.jpg" alt="image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="active">
                            <div class="timeline-icon"><i class="fa fa-info"></i></div>
                            <div class="timeline-time">12. March 2014<br><small>by User First Last</small></div>
                            <div class="timeline-content">
                                <p class="push-bit"><strong>Web Design Session</strong></p>
                                A1 Conference Room
                            </div>
                        </li>
                        <li>
                            <div class="timeline-icon"><i class="fa fa-info"></i></div>
                            <div class="timeline-time">12. March 2014<br><small>by User First Last</small></div>
                            <div class="timeline-content">
                                <strong>Coffee Break</strong>
                            </div>
                        </li>
                        <li class="active">
                            <div class="timeline-icon"><i class="fa fa-info"></i></div>
                            <div class="timeline-time">12. March 2014<br><small>by User First Last</small></div>
                            <div class="timeline-content">
                                <p class="push-bit"><strong>Web Development Session</strong></p>
                                B6 Conference Room
                            </div>
                        </li>
						<li class="media text-center">
							<a class="btn btn-xs btn-default push" href="javascript:void(0)">View more..</a>
						</li>
                    </ul>
                </div>
                <!-- END Timeline Style Content -->

            </div>
            <!-- END Activity Block -->
			
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
								Project Initiation<br>
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
                    <h2><i class="fa fa-envelope"></i> Messages</h2>
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
                    <h2><i class="fa fa-bell"></i> Reminders</h2>
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

<!-- Activity, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-activity-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-clock-o"></i> Activity</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-horizontal form-bordered" onsubmit="return false;">
                    <div class="form-group">
						<label class="col-md-3 control-label" for="product-id">Title</label>
						<div class="col-md-9">
							<input type="text" id="product-id" name="product-id" class="form-control" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label" for="product-short-description">Text</label>
						<div class="col-md-9">
							<textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="10" class="form-control textarea-editor"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label">Set Reminder?</label>
						<div class="col-md-9">
							<label class="switch switch-primary">
								<input type="checkbox" id="product-status" name="product-status" checked><span></span>
							</label>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-md-3 control-label" for="event" >Select Date</label>
						<div class="col-md-5">
							<input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
						</div>
						<div class="col-md-4">
							<div class="input-group bootstrap-timepicker">
								<input type="text" id="example-timepicker24" name="example-timepicker24" class="form-control input-timepicker24">
								<span class="input-group-btn">
									<a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-clock-o"></i></a>
								</span>
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
<!-- END Activity -->

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