<?php

use yii\db\Schema;
use yii\db\Migration;

class m150206_071714_settings_table extends Migration
{
    public function up()
    {
    	$this->createTable('settings', [
			'id'              => 'pk',
			'from_name'       => Schema::TYPE_STRING,
			'from_email'      => Schema::TYPE_STRING,
			'email_recipient' => Schema::TYPE_STRING,
        ]);
    }

    public function down()
    {
        $this->dropTable('settings');
    }
}
