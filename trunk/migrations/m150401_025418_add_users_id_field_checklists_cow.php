<?php

use yii\db\Schema;
use yii\db\Migration;

class m150401_025418_add_users_id_field_checklists_cow extends Migration
{
    public function up()
    {
    	$this->addColumn('checklists_cow', 'users_id', Schema::TYPE_INTEGER);
    }

    public function down()
    {
    	$this->dropColumn('checklists_cow', 'users_id');
    }
}
