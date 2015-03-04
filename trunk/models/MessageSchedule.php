<?php

namespace app\models;

use Yii;
use app\models\Schedule;

/**
 * This is the model class for table "message_schedules".
 *
 * @property integer $id
 * @property string $descriptions
 * @property integer $relation
 * @property integer $type
 * @property integer $event
 * @property integer $send_on
 * @property integer $type_periodically
 * @property string $time_periodically
 */
class MessageSchedule extends Schedule
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descriptions', 'relation'], 'required'],
            [['event', 'sendon'], 'required', 'when' => function ($model) {
                return $model->type == 1;
            }],
            [['relation', 'type', 'event'], 'integer'],
            [['descriptions', 'time_periodically'], 'string', 'max' => 255],
            [['messages_id'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descriptions' => 'Descriptions',
            'relation' => 'Relation',
            'type' => 'Type',
            'event' => 'Event',
            'sendon' => 'Send On',
            'type_periodically' => 'Type Periodically',
            'time_periodically' => 'Time Periodically',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }  

    public function getMsettings() 
    {
        return $this->hasMany(Msetting::className(), ['messages_id' => 'messages_id']);
    }

    
}