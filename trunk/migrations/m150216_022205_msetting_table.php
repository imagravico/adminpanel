<?php

use yii\db\Schema;
use yii\db\Migration;

class m150216_022205_msetting_table extends Migration
{
    public function up()
    {
    	$this->createTable('msettings', [
			'id'                 => 'pk',
			'messages_id'        => Schema::TYPE_INTEGER,
			'belong_to'          => Schema::TYPE_SMALLINT,
			'clients_or_webs_id' => Schema::TYPE_INTEGER,
        ]);
    }

    public function down()
    {
        $this->dropTable('msettings');
    }
}
