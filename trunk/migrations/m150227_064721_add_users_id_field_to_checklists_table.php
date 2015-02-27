<?php

use yii\db\Schema;
use yii\db\Migration;

class m150227_064721_add_users_id_field_to_checklists_table extends Migration
{
    public function up()
    {
    	$this->addColumn('checklists', 'users_id', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('checklists', 'users_id');
    }
}
