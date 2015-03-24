<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "activities".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $users_id
 * @property integer $reminder
 * @property string $come_date
 * @property string $come_time
 * @property string $created_at
 * @property string $updated_at
 */
class Activity extends \yii\db\ActiveRecord
{
    public $come_time;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activities';
    }

    /**
     * @inheritdoc
     */
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
            [['users_id', 'reminder'], 'integer'],
            [['title', 'content', 'come_date'], 'required'],
            [['come_date', 'come_time', 'created_at', 'updated_at', 'belong_to'], 'safe'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'title'      => 'Title',
            'content'    => 'Content',
            'users_id'   => 'Users ID',
            'reminder'   => 'Reminder',
            'come_date'  => 'Select Date',
            'come_time'  => 'Come Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert) 
    {
        // set users_id
        $this->users_id = Yii::$app->user->id;
        // merge time
        if ($this->come_date && $this->come_time) {

            $come_date       = \DateTime::createFromFormat('d/m/Y', $this->come_date);
            $this->come_date = $come_date->format('Y-m-d');
            $this->come_date = $this->come_date . ' ' . $this->come_time;  

        }
            
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        $arr = explode(' ', $this->come_date);
        $this->come_date = $arr[0];
        $come_date       = \DateTime::createFromFormat('Y-m-d', $this->come_date);
        $this->come_date = $come_date->format('d/m/Y');
        
        $this->come_time = $arr[1];

        return parent::afterFind();
    }

    public function getUser() 
    {
        return $this->hasOne(User::classname(), ['id' => 'users_id']);
    }

}
