<?php 
	if (!empty($results)) { 
		foreach ($results as $key => $client) {
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