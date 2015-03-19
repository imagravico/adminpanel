<?php

use yii\db\Schema;
use yii\db\Migration;

class m150319_020118_create_table_checklists_time_sent extends Migration
{
    public function up()
    {
    	$this->createTable('checklists_time_sent', [
			'id'                 => 'pk',
			'checklists_id'      => Schema::TYPE_INTEGER,
			'belong_to'          => Schema::TYPE_SMALLINT,
			'clients_or_webs_id' => Schema::TYPE_INTEGER,
			'time_sent'          => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('checklists_time_sent');
    }
}
