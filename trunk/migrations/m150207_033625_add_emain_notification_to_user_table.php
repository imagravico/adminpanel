<?php

use yii\db\Schema;
use yii\db\Migration;

class m150207_033625_add_emain_notification_to_user_table extends Migration
{
    public function up()
    {
    	$this->addColumn('users', 'email_notification', Schema::TYPE_SMALLINT . ' DEFAULT 0 AFTER auth_key ');
    }

    public function down()
    {
        $this->dropColumn('users', 'email_notification');
    }
}
