<?php

use app\models\Note;

?>
<ul class="media-list">
    <?php
        // by default value of disViewMore is false
        $disViewMore = false;
        $allNotes = Note::find()
                ->where(['type_area' => $type_area, 'belong_to' => $belong_to])
                ->orderBy('id DESC')
                ->all();

        if (count($allNotes) <= count($notes)) {
            $disViewMore = true;
        }

        if (!empty($notes)):
            foreach ($notes as $key => $note):
    ?>
                <li class="media clearfix">
                    <a href="page_ready_user_profile.php" class="pull-left">
                        <img src="/web/upload/avatar/<?= $note->user->avatar ?>" width="64" height="64" alt="Avatar" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted text-right pull-right link-hover">
                            <small>
                                <?php if (strtotime($note->updated_at) > 0) { ?>
                                <em><?= $note->timeAgo(strtotime($note->updated_at)) ?></em>
                                <?php } else { ?>
                                <em><?= $note->timeAgo(strtotime($note->created_at)) ?></em>
                                <?php } ?>
                            </small><br>
                            <a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default btn-edit-note" data-to="/notes/edit/<?= $note->id ?>" data-load="/notes/load/<?= $note->id ?>" data-area=<?= $type_area ?> data-belong-to=<?= $note->belong_to; ?> ><i class="fa fa-edit"></i> Edit</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default btn-del-note" data-to="/notes/delete/<?= $note->id ?>" data-update=".notes-list" data-area=<?= $type_area ?> data-belong-to=<?= $belong_to; ?>><i class="fa fa-times" ></i> Delete</a>
                        </span>
                        <a href="#">
                            <strong>n<?= $note->user->fullname; ?></strong>
                        </a>
                        <p><?= $note->content ?></p>
                    </div>
                </li>
    <?php endforeach; ?>
            <?php if (isset($disViewMore) && !$disViewMore) {?>
            <li class="media text-center">
                <a class="btn btn-xs btn-default push view-more" data-to="/notes/more/" href="javascript:void(0)" data-area=<?= $type_area ?> data-belong-to=<?= $belong_to; ?> >View more..</a>
            </li>
            <?php } ?>
    <?php 
        else: 
            echo "No note is available";
    endif; ?>
</ul>