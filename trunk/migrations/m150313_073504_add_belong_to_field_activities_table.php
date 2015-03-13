<?php

use yii\db\Schema;
use yii\db\Migration;

class m150313_073504_add_belong_to_field_activities_table extends Migration
{
    public function up()
    {
    	$this->addColumn('activities', 'belong_to', Schema::TYPE_INTEGER . ' AFTER reminder');
    }

    public function down()
    {
        $this->dropColumn('activities', 'belong_to');
    }
}
