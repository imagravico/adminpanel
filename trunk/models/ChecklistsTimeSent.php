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
            [['checklists_cow_id'], 'integer'],
            [['time_sent', 'checklists_cow_id',], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'checklists_cow_id' => 'Checklists ID',
            'time_sent' => 'Time Sent',
        ];
    }
}
