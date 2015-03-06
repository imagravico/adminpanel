<?php

namespace app\models;

use Yii;


class Schedule extends \yii\db\ActiveRecord
{
    public $at_hour;
    public $at_minute;

    public $hour_list = [
        '00' => '00',
        '01' => '01',
        '02' => '02',
        '03' => '03',
        '05' => '05',
        '06' => '06',
        '07' => '07',
        '08' => '08',
        '09' => '09',
        '10' => '10',
        '11' => '11',
        '12' => '12',
        '13' => '13',
        '14' => '14',
        '15' => '15',
        '16' => '16',
        '17' => '17',
        '18' => '18',
        '19' => '19',
        '20' => '20',
        '21' => '21',
        '22' => '22',
        '23' => '23',
        '24' => '24',
    ];

    public $minute_list = [
        '00' => '00',
        '15' => '15',
        '30' => '30',
        '45' => '45',
    ];

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
        ['id' => 1, 'name' => 'Website Online Date'],
        ['id' => 2, 'name' => 'Website Date Created'],
        ['id' => 3, 'name' => 'Website Date Updated'],
    ];

    public $send_on = [
        ['id' => 1, 'name' => 'Half anniversary'],
        ['id' => 2, 'name' => 'Anniversary']
    ];


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
        else if ($this->type == 1) {
            // merge at_time from at_hour and at_minute
            $this->at_time = $this->at_hour . ':' . $this->at_minute . ':00';
        }

        return parent::beforeSave($insert);
    }   

    /**
     * this function only apply for Periodically (corresponding to type == 2)
     * @return [type] [description]
     */
    public function parseTime() 
    {
        
    }
}