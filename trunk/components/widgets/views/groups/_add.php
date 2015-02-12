<?php
use app\models\Group;
echo $this->render('_form', [
        'group' => new Group()
    ]);
?>