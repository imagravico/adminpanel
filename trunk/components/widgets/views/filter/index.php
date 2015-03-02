<!-- A-Z -->

<div class="block-options" style="margin:0 0 12px 0;" id="filter">
	<?php
		foreach (range('A', 'Z') as $char) {
		    echo '<a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-model="' . $model . '" data-update="#' . $update_selector . '" data-keyword="' . $char . '">' . $char . '</a>';
		}
	?>
</div>
<!-- END A-Z -->