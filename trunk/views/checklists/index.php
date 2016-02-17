<?php
use app\components\widgets\FilterWidget;

?>

<!-- Forms General Header -->
<div class="content-header">
    <div class="header-section">
        <h1><i class="fa fa-list" style="margin:-14px 0 0 0;"></i>Checklists</h1>
    </div>
</div>
<!-- END Forms General Header -->

<div class="row">
    <div class="col-lg-12">
		<?= FilterWidget::widget(['model' => 'checklist', 'update_selector' => 'checklists-list'  ]); ?>
	</div>
</div>

<!-- Main Row -->
<div class="row">
    <div class="col-lg-10">
		<!-- Courses Content -->
        <div class="row" id="checklists-list">
            <!-- Course Widget -->
            <?php 
            	if (!empty($checklists)) { 
            		$i = 0;
            		foreach ($checklists as $key => $checklist) {
            			$class = [
            					'themed-background-dark-default',
            					'themed-background-dark-fire',
            					'themed-background-dark-forest',
            					'themed-background-dark-autumn'
            				];
            			$class_icons = [
            					'themed-background-default',
            					'themed-background-fire',
            					'themed-background-forest',
            					'themed-background-autumn'
            				];
            			$class_colors = [
            				'themed-color-default',
            				'themed-color-fire',
        					'themed-color-forest',
        					'themed-color-autumn'
            			];

            			if ($i > 3) {
            				$i = 0;
            			}
            ?>
						<div class="col-sm-4">
			                <div class="widget">
			                    <div class="widget-advanced">
			                        <!-- Widget Header -->
			                        <div class="widget-header text-center <?= $class[$i] ?>">
			                            <div class="widget-options"></div>
			                            <h3 class="widget-content-light">
			                                <a href="/checklists/edit/<?= $checklist->id ?>" class="<?= $class_colors[$i]?>"><?= $checklist->title ?></a><br>
			                            </h3>
			                        </div>
			                        <!-- END Widget Header -->

			                        <!-- Widget Main -->
			                        <div class="widget-main ">
			                            <a href="/checklists/edit/<?= $checklist->id ?>" class="widget-image-container animation-fadeIn">
			                                <span class="widget-icon <?= $class_icons[$i] ?>"><i class="fa fa-list"></i></span>
			                            </a>
			                        </div>
			                        <!-- END Widget Main -->
			                    </div>
			                </div>
			            </div>
            <?php
            	$i++;
            		}
            	} else {
           	?>
					<p>No checklist is available</p>
           	<?php
            	}
            ?>
            
            <!-- END Course Widget -->
        </div>
        <!-- END Courses Content -->
    </div>
	
	<!-- START Stats Block -->
	<div class="col-lg-2">
		
		<div class="row text-center">
			<div class="col-xs-12">
				<a href="/checklists/create" class="widget widget-hover-effect2">
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
					<div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen"><?= count($checklists); ?></span></div>
				</a>
			</div>
		</div>
    </div>
	<!-- END Stats Block -->
	
</div>
<!-- END Main Row -->
			
