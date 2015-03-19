<?php

use yii\db\Schema;
use yii\db\Migration;

class m150319_044114_move_file_name_in_checklist_table_to_checklists_cow extends Migration
{
    public function up()
    {
    	//$this->dropColumn('checklists', 'file_name');
    	$this->addColumn('checklists_cow', 'file_name', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->addColumn('checklists', 'file_name');
    	$this->dropColumn('checklists_cow', 'file_name');
    }
}
