<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\MessageSchedule;

/**
 * This is the model class for table "messages".
 *
 * @property integer $id
 * @property string $subject
 * @property string $from_name
 * @property string $from_email
 * @property string $content
 * @property integer $active
 */
class Message extends \yii\db\ActiveRecord
{
    public $belongText;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'messages';
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
            [['content', 'subject', 'from_name', 'from_email'], 'required'],
            [['content'], 'string'],
            ['from_email', 'email'],
            [['active'], 'integer'],
            [['subject', 'from_name', 'from_email'], 'string', 'max' => 255]
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
            'from_name' => 'From Name',
            'from_email' => 'From E-mail',
            'content' => 'Message',
            'active' => 'Active',
        ];
    }

    public function getMschedule() 
    {
        return $this->hasMany(MessageSchedule::className(), ['messages_id' => 'id']);
    }

    public function afterFind()
    {
        $this->belongText = $this->getBelongText();
        return parent::afterFind();
    }


    public function getBelongText()
    {
        $text = '';
        $mschedules = $this->mschedule;

        if (count($mschedules) > 1) {
            foreach ($mschedules as $key => $schedule) {
                if (isset($mschedules[$key + 1]) && $schedule->relation != $mschedules[$key + 1]->relation)
                    $text = 'CLIENT, WEBSITE';
            }
        }
        elseif (!empty($mschedules)) {
            if ($mschedules[0]->relation == 1)
                $text = 'CLIENT';
            else 
                $text = 'WEBSITE';
        }
        return $text;
    }

}
