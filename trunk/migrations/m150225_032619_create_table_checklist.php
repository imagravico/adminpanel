<?php

use yii\db\Schema;
use yii\db\Migration;

class m150225_032619_create_table_checklist extends Migration
{
    public function up()
    {
    	$this->createTable('checklists', [
			'id'         => 'pk',
			'title'      => Schema::TYPE_STRING . ' NOT NULL',
			'subtitle'   => Schema::TYPE_STRING,
			'content'    => Schema::TYPE_TEXT,
			'active'     => Schema::TYPE_SMALLINT,
			'created_at' => Schema::TYPE_DATETIME,
			'updated_at' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('checklists');
    }
}
