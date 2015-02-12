<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_020538_create_websites_table extends Migration
{
    public function up()
    {
    	$this->createTable('websites', [
			'id'          => 'pk',
			'domain'      => Schema::TYPE_STRING . ' NOT NULL',
			'online_date' => Schema::TYPE_DATE,
			'active'      => Schema::TYPE_SMALLINT,
			'created_at'  => Schema::TYPE_DATETIME,
			'updated_at'  => Schema::TYPE_DATETIME,
			'clients_id'  => Schema::TYPE_INTEGER
        ]);
    }

    public function down()
    {
        $this->dropTable('websites');
    }
}
