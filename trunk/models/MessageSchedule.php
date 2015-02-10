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
            [['descriptions', 'relation'], 'required'],
            [['event', 'sendon'], 'required', 'when' => function ($model) {
                return $model->type == 1;
            }],
            [['relation', 'type', 'event', 'type_periodically'], 'integer'],
            [['descriptions', 'time_periodically'], 'string', 'max' => 255],
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

    public function beforeSave($insert)
    {
        if ($this->type == 2)
        {
            $this->type_periodically = Yii::$app->request->post('cron-period');
            switch (trim($this->type_periodically)) {
                case 'hour':
                    $this->time_periodically = Yii::$app->request->post('cron-mins');
                    break;

                case 'day':
                    $this->time_periodically = Yii::$app->request->post('cron-time-hour') . '-' .Yii::$app->request->post('cron-time-min');
                    break;

                case 'week':
                    $this->time_periodically = Yii::$app->request->post('cron-dow') . '-' . Yii::$app->request->post('cron-time-hour') . '-' .Yii::$app->request->post('cron-time-min');
                    break;

                case 'month':
                    $this->time_periodically = Yii::$app->request->post('cron-dom') . '-' . Yii::$app->request->post('cron-time-hour') . '-' .Yii::$app->request->post('cron-time-min');
                    break;

                case 'year':
                    $this->time_periodically = Yii::$app->request->post('cron-dom') . '-' . Yii::$app->request->post('cron-month') . '-' . Yii::$app->request->post('cron-time-hour') . '-' .Yii::$app->request->post('cron-time-min');
                    break;
            }
        }
        return parent::beforeSave($insert);
    }   



}
