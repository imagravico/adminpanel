<ul class="media-list">
    <?php 
        if (!empty($notes)):
            foreach ($notes as $key => $note):
    ?>
                <li class="media clearfix">
                    <a href="page_ready_user_profile.php" class="pull-left">
                        <img src="/web/upload/avatar/noavatar.jpg" alt="Avatar" class="img-circle">
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
                            <a data-toggle="modal" href="#modal-note-edit" class="btn btn-xs btn-default btn-edit-note" data-to="/notes/edit/<?= $note->id ?>" ><i class="fa fa-edit"></i> Edit</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-default btn-del-note" data-to="/notes/delete/<?= $note->id ?>" data-update=".notes-list" ><i class="fa fa-times" ></i> Delete</a>
                        </span>
                        <a href="#">
                            <strong>n<?= $note->user->fullname; ?></strong>
                        </a>
                        <p><?= $note->content ?></p>
                    </div>
                </li>
    <?php endforeach; endif; ?>
</ul>