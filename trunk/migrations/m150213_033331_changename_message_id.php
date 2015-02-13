<?php

use yii\db\Schema;
use yii\db\Migration;

class m150213_033331_changename_message_id extends Migration
{
    public function up()
    {
    	$this->dropColumn('message_schedules', 'message_id');
    	$this->addColumn('message_schedules', 'messages_id', Schema::TYPE_INTEGER);
    }

    public function down()
    {
        $this->dropColumn('message_schedules', 'messages_id');
    }
}
	