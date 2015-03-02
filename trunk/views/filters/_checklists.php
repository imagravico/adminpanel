<?php 
            	if (!empty($results)) { 
            		$i = 0;
            		foreach ($results as $key => $checklist) {
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