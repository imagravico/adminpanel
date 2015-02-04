<?php
use app\models\Note;
?>
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
    <div class="notes-list">
        <?php echo $this->render('_list', [
                'notes' => $notes
        ]) ?>
    </div>
    <!-- END Notes Content -->
</div>
<?php echo $this->render('_form', [
        'note' => new Note()
]) ?>

