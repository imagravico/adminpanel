<?php

use yii\db\Schema;
use yii\db\Migration;

class m150204_100210_add_avatar_user_table extends Migration
{
    public function up()
    {
    	$this->addColumn('users', 'avatar', Schema::TYPE_STRING . ' AFTER auth_key');
    }

    public function down()
    {
        $this->dropColumn('users', 'avatar');
    }
}
