<?php

use yii\db\Schema;
use yii\db\Migration;

class m150401_043112_remove_unnecessary_field_time_sent extends Migration
{
    public function up()
    {
    	$this->dropColumn('checklists_time_sent', 'checklists_id');
    	$this->dropColumn('checklists_time_sent', 'belong_to');
    	$this->dropColumn('checklists_time_sent', 'clients_or_webs_id');
    	$this->addColumn('checklists_time_sent', 'checklists_cow_id', Schema::TYPE_INTEGER);
    }

    public function down()
    {
    	$this->dropColumn('checklists_time_sent', 'checklists_cow_id');
    }
}
