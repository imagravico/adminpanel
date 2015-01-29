<?php

use yii\db\Schema;
use yii\db\Migration;

class m150129_021245_create_groups_table extends Migration
{
    public function up()
    {
    	$this->createTable('groups', [
			'id'    => 'pk',
			'name'  => Schema::TYPE_STRING,
			'alias' => Schema::TYPE_STRING
        ]);
    }

    public function down()
    {
        $this->dropTable('groups');
    }
}
