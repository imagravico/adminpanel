<?php

use yii\db\Schema;
use yii\db\Migration;

class m150127_071203_add_firstname_lastname_to_user extends Migration
{
    public function up()
    {
    	$this->addColumn('user', 'firstname', Schema::TYPE_STRING . ' AFTER username');
    	$this->addColumn('user', 'lastname', Schema::TYPE_STRING . ' AFTER username');
    }

    public function down()
    {
        $this->dropColumn('user', 'firstname');
        $this->dropColumn('user', 'lastname');
    }
}
