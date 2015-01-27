<?php

use yii\db\Schema;
use yii\db\Migration;

class m150127_050005_user extends Migration
{
    public function up()
    {
    	$this->createTable('user', [
			'id'         => 'pk',
			'username'   => Schema::TYPE_STRING . ' NOT NULL',
			'email'      => Schema::TYPE_STRING . ' NOT NULL',
			'password'   => Schema::TYPE_STRING . ' NOT NULL',
			'token'      => Schema::TYPE_STRING,
            'auth_key'   => Schema::TYPE_STRING,
			'active'     => Schema::TYPE_SMALLINT,
			'created_at' => Schema::TYPE_DATETIME,
			'updated_at' => Schema::TYPE_DATETIME,

        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
