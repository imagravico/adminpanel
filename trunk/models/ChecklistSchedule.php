<?php

namespace app\models;

use Yii;
use app\models\Schedule;
use app\models\Csetting;

/**
 * This is the model class for table "checklist_schedules".
 *
 * @property integer $id
 * @property string $subject
 * @property string $message
 * @property integer $relation
 * @property integer $type
 * @property integer $event
 * @property integer $sendon
 * @property string $type_periodically
 * @property string $time_periodically
 * @property integer $checklists_id
 * @property integer $active
 */
class ChecklistSchedule extends Schedule
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checklist_schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message', 'subject'], 'required'],
            [['event', 'sendon'], 'required', 'when' => function ($model) {
                return $model->type == 1;
            }],
            [['checklists_id', 'at_hour', 'at_minute'], 'safe'],
            [['message'], 'string'],
            [['relation', 'type', 'event', 'sendon', 'checklists_id', 'active'], 'integer'],
            [['subject', 'type_periodically', 'time_periodically'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                => 'ID',
            'subject'           => 'Subject',
            'message'           => 'Message',
            'relation'          => 'Relation',
            'type'              => 'Type',
            'event'             => 'Event',
            'sendon'            => 'Send on',
            'type_periodically' => 'Type Periodically',
            'time_periodically' => 'Time Periodically',
            'checklists_id'     => 'Checklists ID',
            'active'            => 'Active',
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if ($this->type == 1) {
            $this->type_periodically = $this->time_periodically = NULL;
        }
        elseif ($this->type == 2) {
            $this->at_time = NULL;
            $this->event = $this->sendon = NULL;
        }
        
        return parent::beforeSave($insert);
    }   

    public function getCsettings() 
    {
        return $this->hasMany(Csetting::className(), ['checklists_id' => 'checklists_id']);
    }
}
