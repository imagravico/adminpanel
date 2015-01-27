<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-user" style="margin:-14px 0 0 0;"></i>Clients</h1>
        </div>
    </div>
    <!-- END Forms General Header -->
    
	<div class="row">
        <div class="col-lg-12">
			
			<!-- A-Z -->
			<div class="block-options" style="margin:0 0 12px 0;">
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">A</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">B</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">C</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">D</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">E</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">F</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">G</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">H</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">I</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">J</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">K</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">L</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">M</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">N</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">O</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">P</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">Q</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">R</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">S</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">T</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">V</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">U</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">W</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">X</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">Y</a>
				<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default">Z</a>
			</div>
			<!-- END A-Z -->
			
		</div>
	</div>
	
	
	<!-- Main Row -->
    <div class="row">
        <div class="col-lg-10">
			
			<div class="row">
				<?php for ($i = 0; $i < 30; $i++) { ?>
				<!-- Contact Widget -->
				<div class="col-sm-6 col-lg-4">
					<div class="widget">
						<div class="widget-simple">
							<a href="panel_client_edit.php">
								<img src="img/placeholders/avatars/avatar<?php echo rand(1, 16); ?>.jpg" alt="avatar" class="widget-image img-circle pull-left animation-fadeIn">
							</a>
							<h4 class="widget-content text-right">
								<a href="panel_client_edit.php"><strong>Company Name</strong></a><br>
								<small>First Last Name</small>
							</h4>
						</div>
					</div>
				</div>
				<!-- END Contact Widget -->

				<?php } ?>
			</div>
        </div>
		
		<!-- START Stats Block -->
		<div class="col-lg-2">
			
			<div class="row">
				<div class="col-lg-12 text-center">
					<a href="panel_client_edit.php" class="widget widget-hover-effect2">
						<div class="widget-extra themed-background-success">
							<h4 class="widget-content-light"><strong>Add New</strong> Client</h4>
						</div>
						<div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
					</a>
				</div>
				
				<div class="col-lg-12">
					<div class="block full">
						<div class="block-title">
							<h2><i class="fa fa-users"></i> Groups</h2>
							<div class="block-options pull-right">
								<a class="btn btn-sm btn-alt btn-default" href="#modal-groups-edit" data-toggle="modal"><i class="fa fa-cogs"></i></a>
							</div>
						</div>
						<ul class="nav nav-pills nav-stacked">
							<li class="active"><a href="javascript:void(0)"><span class="badge pull-right">271</span>All</a></li>
							<li><hr></li>
							<li><a href="javascript:void(0)"><span class="badge pull-right">56</span>Business</a></li>
							<li><a href="javascript:void(0)"><span class="badge pull-right">60</span>Freelancer</a></li>
							<li><a href="javascript:void(0)"><span class="badge pull-right">75</span>Private</a></li>
						</ul>
					</div>
				</div>
			</div>
        </div>
		<!-- END Stats Block -->
		
    </div>
    <!-- END Main Row -->
			
</div>
<!-- END Page Content -->

<?php include 'inc/page_footer.php'; ?>
<?php include 'inc/template_scripts.php'; ?>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/ecomProducts.js"></script>
<script>$(function(){ EcomProducts.init(); });</script>

<?php include 'inc/template_end.php'; ?>

<!-- Send, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
<div id="modal-groups-edit" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center themed-background">
                <h2 class="modal-title gi-white"><i class="fa fa-users"></i> Groups</h2>
            </div>
            <!-- END Modal Header -->

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="index.php" method="post" enctype="multipart/form-data" class="form-bordered" onsubmit="return false;">
                    <div class="form-group form-group-sm">
						<label class="control-label" for="product-id">Group Name</label>
						<div class="input-group">
							<input type="text" id="product-id" name="product-id" class="form-control" value="">
							<span class="input-group-btn"><button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Add</button></span>
						</div>
					</div>

					<div style="padding:0 15px;">
						<table class="table table-striped table-vcenter">
							<tbody>
								<tr>
									<td>Business</td>
									<td class="text-right">
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
									</td>
								</tr>
								<tr>
									<td>Freelancer</td>
									<td class="text-right">
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
									</td>
								</tr>
								<tr>
									<td>Private</td>
									<td class="text-right">
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i> Edit</a>
										<a data-toggle="modal" href="javascript:void(0)" class="btn btn-xs btn-default"><i class="fa fa-times"></i> Delete</a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>

					
					<div class="form-group form-actions">
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
					
                </form>
            </div>
            <!-- END Modal Body -->
        </div>
    </div>
</div>
<!-- END Send -->