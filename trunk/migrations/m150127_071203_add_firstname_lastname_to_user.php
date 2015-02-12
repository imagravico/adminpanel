<?php

use yii\db\Schema;
use yii\db\Migration;

class m150127_071203_add_firstname_lastname_to_user extends Migration
{
    public function up()
    {
    	$this->addColumn('users', 'firstname', Schema::TYPE_STRING . ' AFTER username');
    	$this->addColumn('users', 'lastname', Schema::TYPE_STRING . ' AFTER username');
    }

    public function down()
    {
        $this->dropColumn('users', 'firstname');
        $this->dropColumn('users', 'lastname');
    }
}
