<?php

use yii\db\Schema;
use yii\db\Migration;

class m150209_082149_message_schedules extends Migration
{
    public function up()
    {
    	$this->createTable('message_schedules', [
			'id'                => 'pk',
			'descriptions'      => Schema::TYPE_STRING,
			'relation'          => Schema::TYPE_SMALLINT,
			'type'              => Schema::TYPE_SMALLINT,
			'event'             => Schema::TYPE_SMALLINT,
			'sendon'            => Schema::TYPE_SMALLINT,
			'type_periodically' => Schema::TYPE_STRING,
			'time_periodically' => Schema::TYPE_STRING,
            'message_id'        => Schema::TYPE_INTEGER
        ]);
    }

    public function down()
    {
        $this->dropTable('message_schedules');
    }
}
