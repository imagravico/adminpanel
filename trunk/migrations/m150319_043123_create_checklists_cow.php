<?php

use yii\db\Schema;
use yii\db\Migration;

class m150319_043123_create_checklists_cow extends Migration
{
    public function up()
    {
    	$this->createTable('checklists_cow', [
			'id'                 => 'pk',
			'checklists_id'      => Schema::TYPE_INTEGER,
			'content'            => Schema::TYPE_TEXT,
			'belong_to'          => Schema::TYPE_SMALLINT,
			'clients_or_webs_id' => Schema::TYPE_INTEGER,
			'created_at'         => Schema::TYPE_DATETIME,
			'updated_at'         => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('checklists_cow');
    }
}
