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
	
    <?= $this->render('_list', ['belong_to' => $belong_to]);?>
</div>