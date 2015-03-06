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
            $mins  = Yii::$app->request->post('cron-mins');
            $hours = Yii::$app->request->post('cron-time-hour');
            $month = Yii::$app->request->post('cron-month');
            $dow   = Yii::$app->request->post('cron-dow');
            $dom   = Yii::$app->request->post('cron-dom');

            switch (trim($this->type_periodically)) {
                case 'day':
                    $this->time_periodically = $hours . ':' . $mins;
                    break;

                case 'week':
                    $this->time_periodically = $dow . ' ' . $hours . ':' . $mins;
                    break;

                case 'month':
                    $this->time_periodically = $dom . ' ' . $hours . ':' . $mins;
                    break;

                case 'year':
                    $this->time_periodically = $dom . ' ' . $month . ' ' . $hours . ':' . $mins;
                    break;
            }
        }
        else if ($this->type == 1) {
            // merge at_time from at_hour and at_minute
            $this->at_time = $this->at_hour . ':' . $this->at_minute;
        }

        return parent::beforeSave($insert);
    }   

    /**
     * this function only apply for Periodically (corresponding to type == 2)
     * @return [type] [description]
     */
    public function parseTime() 
    {
        switch ($this->type_periodically) {
            case 'day':
                $time_set     = $this->time_periodically;
                $time_compare = date('H:i');
                break;

            case 'week':
                $time_set     = $this->time_periodically;
                $time_compare = date('w H:i');
                break;

            case 'month':
                $time_set     = $this->time_periodically;
                $time_compare = date('j H:i');
                break;

            case 'year':
                $time_set     = $this->time_periodically;
                $time_compare = date('j n H:i');
                break;
        }

        return [$time_set, $time_compare];
    }
}