<?php
use yii\helpers\Url;
use app\components\widgets\GroupsWidget;
?>
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
			<?php 
				if (!empty($clients)) { 
					foreach ($clients as $key => $client) {
			?>
						<!-- Contact Widget -->
						<div class="col-sm-6 col-lg-4">
							<div class="widget">
								<div class="widget-simple">
									<a href="#">
										<?php if (isset($client->avatar) && $client->avatar != '') { ?>
										<img width="64" height="64" src="web/upload/avatar/<?= $client->avatar?>" alt="avatar" class="widget-image img-circle pull-left animation-fadeIn">
										<?php } else { ?>
										<img width="64" height="64" src="web/upload/avatar/noavatar.jpg" alt="avatar" class="widget-image img-circle pull-left animation-fadeIn">
										<?php } ?>
									</a>
									<h4 class="widget-content text-right">
										<a href="/clients/edit/<?= $client->id; ?>"><strong><?= $client->company;?></strong></a><br>
										<small><?= $client->firstname . ' ' . $client->lastname; ?></small>
									</h4>
								</div>
							</div>
						</div>
			<?php } } ?>
			<!-- END Contact Widget -->
		</div>
    </div>
	<!-- START Stats Block -->
	<div class="col-lg-2">
		
		<div class="row">
			<div class="col-lg-12 text-center">
				<a href="<?= Url::to(['clients/create']);?>" class="widget widget-hover-effect2">
					<div class="widget-extra themed-background-success">
						<h4 class="widget-content-light"><strong>Add New</strong> Client</h4>
					</div>
					<div class="widget-extra-full"><span class="h2 text-success animation-expandOpen"><i class="fa fa-plus"></i></span></div>
				</a>
			</div>
			
			<div class="col-lg-12">
				<?php echo GroupsWidget::widget(); ?>
			</div>
		</div>
    </div>
	<!-- END Stats Block -->
</div>
<!-- END Main Row -->


