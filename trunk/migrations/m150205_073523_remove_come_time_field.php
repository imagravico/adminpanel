<?php

use yii\db\Schema;
use yii\db\Migration;

class m150205_073523_remove_come_time_field extends Migration
{
    public function up()
    {
    	$this->dropColumn('activities', 'come_time');
    }

    public function down()
    {
    }
}
