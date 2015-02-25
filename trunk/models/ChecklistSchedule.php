<?php

namespace app\models;

use Yii;

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
class ChecklistSchedule extends \yii\db\ActiveRecord
{
    public $rel_list = [
        '1' => 'Client', 
        '2' => 'Website'
    ];

    public $client_event = [
        ['id' => 1, 'name' => 'Client Birthday'],
        ['id' => 2, 'name' => 'Client Date Created'],
        ['id' => 3, 'name' => 'Client Date Updated'],
    ];

    public $website_event = [
        ['id' => 4, 'name' => 'Website Online Date'],
        ['id' => 5, 'name' => 'Website Date Created'],
        ['id' => 6, 'name' => 'Website Date Updated'],
    ];

    public $send_on = [
        ['id' => 1, 'name' => 'Half anniversary'],
        ['id' => 2, 'name' => 'Anniversary']
    ];

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
}
