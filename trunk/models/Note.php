<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property string $content
 * @property integer $users_id
 * @property string $created_at
 * @property string $updated_at
 */
class Note extends \yii\db\ActiveRecord
{
    const TYPE_AREA_CLIENT = 0;
    const TYPE_AREA_WEB    = 1;
    const TYPE_AREA_MES    = 2;
    const TYPE_AREA_CLIST  = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    public function behaviors()
    {
        return [
            [
                'class'              => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value'              => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['content'], 'required'],
            [['users_id'], 'integer'],
            [['created_at', 'updated_at', 'type_area', 'belong_to'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'content'    => 'Content',
            'users_id'   => 'Users ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert)
    {
        $this->users_id = Yii::$app->user->id;
        return parent::beforeSave($insert);
    }

    public function getUser() 
    {
        return $this->hasOne(User::classname(), ['id' => 'users_id']);
    }

    /**
     * calculate time ago
     * @param  integer $time
     * @return string
     */
    public function timeAgo($time)
    {
       $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
       $lengths = array("60","60","24","7","4.35","12","10");

       $now = time();
       
       $difference = $now - $time;
       $tense      = "ago";

       for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
           $difference /= $lengths[$j];
       }

       $difference = round($difference);

       if($difference != 1) {
           $periods[$j].= "s";
       }

       return "$difference $periods[$j] ago ";
    }
}
