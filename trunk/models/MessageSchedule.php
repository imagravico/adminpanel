<?php

namespace app\models;

use Yii;

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
class MessageSchedule extends \yii\db\ActiveRecord
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
        return 'message_schedules';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['relation', 'type', 'event', 'send_on', 'type_periodically'], 'integer'],
            [['descriptions', 'time_periodically'], 'string', 'max' => 255]
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
            'send_on' => 'Send On',
            'type_periodically' => 'Type Periodically',
            'time_periodically' => 'Time Periodically',
        ];
    }
}
