<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checklists_time_sent".
 *
 * @property integer $id
 * @property integer $checklists_id
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 * @property string $time_sent
 */
class ChecklistsTimeSent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checklists_time_sent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['checklists_id', 'belong_to', 'clients_or_webs_id'], 'integer'],
            [['time_sent', 'checklists_id', 'belong_to', 'clients_or_webs_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'checklists_id' => 'Checklists ID',
            'belong_to' => 'Belong To',
            'clients_or_webs_id' => 'Clients Or Webs ID',
            'time_sent' => 'Time Sent',
        ];
    }
}
