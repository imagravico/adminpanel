<?php

use yii\db\Schema;
use yii\db\Migration;

class m150205_025859_activity_table extends Migration
{
    public function up()
    {
    	$this->createTable('activities', [
			'id'         => 'pk',
			'title'      => Schema::TYPE_STRING,
			'content'    => Schema::TYPE_TEXT,
			'users_id'   => Schema::TYPE_INTEGER,
			'reminder'   => Schema::TYPE_SMALLINT,
			'come_date'  => Schema::TYPE_DATETIME,
			'come_time'  => Schema::TYPE_DATETIME,
			'created_at' => Schema::TYPE_DATETIME,
			'updated_at' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('activities');
    }
}
