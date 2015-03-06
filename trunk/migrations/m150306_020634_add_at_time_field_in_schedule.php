<?php

use yii\db\Schema;
use yii\db\Migration;

class m150306_020634_add_at_time_field_in_schedule extends Migration
{
    public function up()
    {
    	$this->addColumn('message_schedules', 'at_time', Schema::TYPE_STRING);
    	$this->addColumn('checklist_schedules', 'at_time', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('message_schedules', 'at_time');
        $this->dropColumn('checklist_schedules', 'at_time');
    }
}
