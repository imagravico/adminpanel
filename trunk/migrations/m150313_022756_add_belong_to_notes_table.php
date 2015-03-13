<?php

use yii\db\Schema;
use yii\db\Migration;

class m150313_022756_add_belong_to_notes_table extends Migration
{
    public function up()
    {
    	$this->addColumn('notes', 'belong_to', Schema::TYPE_INTEGER . ' AFTER type_area');
    }

    public function down()
    {
        $this->dropColumn('notes', 'belong_to');
    }
}
