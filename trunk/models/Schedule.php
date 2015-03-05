<?php

namespace app\models;

use Yii;


class Schedule extends \yii\db\ActiveRecord
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
        return parent::beforeSave($insert);
    }   


    

}