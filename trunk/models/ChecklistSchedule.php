<?php

namespace app\models;

use Yii;
use app\models\Schedule;
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
            [['checklists_id'], 'safe'],
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
            'id' => 'ID',
            'subject' => 'Subject',
            'message' => 'Message',
            'relation' => 'Relation',
            'type' => 'Type',
            'event' => 'Event',
            'sendon' => 'Sendon',
            'type_periodically' => 'Type Periodically',
            'time_periodically' => 'Time Periodically',
            'checklists_id' => 'Checklists ID',
            'active' => 'Active',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }   
}
