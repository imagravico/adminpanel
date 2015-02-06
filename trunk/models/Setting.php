<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $from_name
 * @property string $from_email
 * @property string $email_recipient
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_name', 'from_email', 'email_recipient'], 'required'],
            [['from_name', 'from_email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'              => 'ID',
            'from_name'       => 'From Name',
            'from_email'      => 'From Email',
            'email_recipient' => 'Email Recipient',
        ];
    }

    public function beforeSave($insert)
    {
        if (strpos($this->email_recipient, ',')) 
        {
            $email = explode(",", $this->email_recipient);
            $this->email_recipient = json_encode($email);
        }
        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        if (strpos($this->email_recipient, ',')) 
        {
            $this->email_recipient = implode(',', json_decode($this->email_recipient));
        }
        return parent::afterFind();
    }

}
