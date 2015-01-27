<?php include 'inc/config.php'; ?>
<?php include 'inc/template_start.php'; ?>
<?php include 'inc/page_head.php'; ?>

<!-- Page content -->
<div id="page-content">
	<!-- Forms General Header -->
    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-list" style="margin:-14px 0 0 0;"></i>Checklists</h1>
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
			<!-- Courses Content -->
            <div class="row">
                <!-- Course Widget -->
                <div class="col-sm-4">
                    <div class="widget">
                        <div class="widget-advanced">
                            <!-- Widget Header -->
                            <div class="widget-header text-center themed-background-dark-default">
                                <div class="widget-options"></div>
                                <h3 class="widget-content-light">
                                    <a href="panel_checklist_edit.php" class="themed-color-default">Project Initiation</a><br>
                                    <?php /*<small>Client Name</small>*/ ?>
                                </h3>
                            </div>
                            <!-- END Widget Header -->

                            <!-- Widget Main -->
                            <div class="widget-main ">
                                <a href="panel_checklist_edit.php" class="widget-image-container animation-fadeIn">
                                    <span class="widget-icon themed-background-default"><i class="fa fa-list"></i></span>
                                </a>
                            </div>
                            <!-- END Widget Main -->
                        </div>
                    </div>
                </div>
                <!-- END Course Widget -->

            </div>
            <!-- END Courses Content -->
        </div>
		
		<!-- START Stats Block -->
		<div class="col-lg-2">
			
			<div class="row text-center">
				<div class="col-xs-12">
					<a href="panel_checklist_edit.php" class="widget widget-hover-effect2">
						<div class="widget-extra themed-background-success">
							<h4 class="widget-content-light"><strong>Add New</strong> Checklist</h4>
						</div>
						<div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
					</a>
				</div>
				<div class="col-xs-12">
					<a href="javascript:void(0)" class="widget widget-hover-effect2">
						<div class="widget-extra themed-background-dark">
							<h4 class="widget-content-light">Total <strong>Checklists</strong></h4>
						</div>
						<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">1</span></div>
					</a>
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