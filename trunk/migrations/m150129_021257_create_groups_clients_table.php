<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_021257_create_groups_clients_table extends Migration
{
    public function up()
    {
    	$this->createTable('groups_clients', [
			'id'         => 'pk',
			'clients_id' => Schema::TYPE_INTEGER,
			'groups_id'  => Schema::TYPE_INTEGER
        ]);
    }

    public function down()
    {
        $this->dropTable('groups_clients');
    }
}
