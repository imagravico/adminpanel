<?php

use yii\db\Schema;
use yii\db\Migration;

class m150128_093807_clients extends Migration
{
    public function up()
    {
    	$this->createTable('clients', [
			'id'         => 'pk',
			'company'    => Schema::TYPE_STRING . ' NOT NULL',
			'firstname'  => Schema::TYPE_STRING . ' NOT NULL',
			'lastname'   => Schema::TYPE_STRING . ' NOT NULL',
			'email'      => Schema::TYPE_STRING . ' NOT NULL',
			'birthday'   => Schema::TYPE_DATE,
			'avatar'     => Schema::TYPE_STRING,
			'active'     => Schema::TYPE_SMALLINT,
			'created_at' => Schema::TYPE_DATETIME,
			'updated_at' => Schema::TYPE_DATETIME,
        ]);
    }

    public function down()
    {
        $this->dropTable('clients');
    }
}
