<?php

use yii\db\Schema;
use yii\db\Migration;

class m150206_074843_change_type_email_repicent extends Migration
{
    public function up()
    {
    	$this->dropColumn('settings', 'email_recipient');
    	$this->addColumn('settings', 'email_recipient', Schema::TYPE_TEXT . ' AFTER from_email');
    }

    public function down()
    {
    }
}
