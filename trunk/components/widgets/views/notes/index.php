<?php
use app\models\Note;
?>
<div class="block full notes">
    <!-- Notes Title -->
    <div class="block-title">
        <div class="block-options pull-right">
            <a class="btn btn-sm btn-alt btn-default btn-add-note" data-toggle="modal" href="#modal-note-edit">Add Note <i class="fa fa-plus"></i></a>
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
    <div class="notes-list">
        <?php echo $this->render('_list', ['area' => $area, 'belong_to' => $belong_to, 'disViewMore' => $disViewMore]) ?>
    </div>
    <!-- END Notes Content -->
</div>
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
            <div class="modal-body" id="wrap-form-note">
                <?php echo $this->render('_form', [
                        'note'      => new Note(),
                        'area'      => $area,
                        'belong_to' => $belong_to
                ]) ?>
             </div>
        <!-- END Modal Body -->
        </div>
    </div>
</div>


