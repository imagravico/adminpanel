<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_064751_message_table extends Migration
{
    public function up()
    {
    	$this->createTable('messages', [
			'id'         => 'pk',
			'subject'    => Schema::TYPE_STRING,
			'from_name'  => Schema::TYPE_STRING,
			'from_email' => Schema::TYPE_STRING,
			'content'    => Schema::TYPE_TEXT,
			'active'     => Schema::TYPE_SMALLINT,
            'created_at' => Schema::TYPE_DATETIME,
            'updated_at' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('messages');
    }
}
