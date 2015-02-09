<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
}
