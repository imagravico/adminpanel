<?php

use yii\db\Schema;
use yii\db\Migration;

class m150228_084552_add_file_name_field_to_checklists_table extends Migration
{
    public function up()
    {
    	$this->addColumn('checklists', 'file_name', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('checklists', 'file_name');
    }
}
