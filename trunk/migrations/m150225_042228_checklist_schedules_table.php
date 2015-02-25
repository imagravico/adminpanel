<?php

use yii\db\Schema;
use yii\db\Migration;

class m150225_042228_checklist_schedules_table extends Migration
{
    public function up()
    {
    	$this->createTable('checklist_schedules', [
			'id'                => 'pk',
			'subject'           => Schema::TYPE_STRING,
			'message'           => Schema::TYPE_TEXT,
			'relation'          => Schema::TYPE_SMALLINT,
			'type'              => Schema::TYPE_SMALLINT,
			'event'             => Schema::TYPE_SMALLINT,
			'sendon'            => Schema::TYPE_SMALLINT,
			'type_periodically' => Schema::TYPE_STRING,
			'time_periodically' => Schema::TYPE_STRING,
			'checklists_id'     => Schema::TYPE_INTEGER,
			'active'            => Schema::TYPE_SMALLINT,

        ]);
    }

    public function down()
    {
        $this->dropTable('checklist_schedules');
    }
}
