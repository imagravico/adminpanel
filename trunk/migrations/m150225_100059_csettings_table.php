<?php

use yii\db\Schema;
use yii\db\Migration;

class m150225_100059_csettings_table extends Migration
{
    public function up()
    {
    	$this->createTable('csettings', [
			'id'                 => 'pk',
			'checklists_id'      => Schema::TYPE_INTEGER,
			'belong_to'          => Schema::TYPE_SMALLINT,
			'clients_or_webs_id' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable('csettings');
    }
}
