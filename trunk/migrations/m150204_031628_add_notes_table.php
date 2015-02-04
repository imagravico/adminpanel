<?php

use yii\db\Schema;
use yii\db\Migration;

class m150204_031628_add_notes_table extends Migration
{
    public function up()
    {
    	$this->createTable('notes', [
			'id'         => 'pk',
			'content'    => Schema::TYPE_TEXT,
			'users_id'   => Schema::TYPE_INTEGER,
			'created_at' => Schema::TYPE_DATETIME,
			'updated_at' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('notes');
    }
}
