<?php

use yii\db\Schema;
use yii\db\Migration;

class m150213_025420_add_type_col_notes extends Migration
{
    public function up()
    {
    	$this->addColumn('notes', 'type_area', Schema::TYPE_INTEGER . ' AFTER users_id');
    }

    public function down()
    {
        $this->dropColumn('notes', 'type_area');
    }
}


