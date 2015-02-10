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
			'send_on'           => Schema::TYPE_SMALLINT,
			'type_periodically' => Schema::TYPE_SMALLINT,
			'time_periodically' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('message_schedules');
    }
}
