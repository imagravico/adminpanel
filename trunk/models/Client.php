<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $id
 * @property string $company
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $birthday
 * @property string $avatar
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company', 'firstname', 'lastname', 'email', 'birthday'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['active'], 'integer'],
            [['company', 'firstname', 'lastname', 'email', 'avatar'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'company'    => 'Company',
            'firstname'  => 'Firstname',
            'lastname'   => 'Lastname',
            'email'      => 'Email',
            'birthday'   => 'Birthday',
            'avatar'     => 'Avatar',
            'active'     => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function beforeSave($insert) 
    {
        // convert format birthday
        if ($this->birthday) {
            $date = \DateTime::createFromFormat('m/d/Y', $this->birthday);
            $this->birthday = $date->format('Y-m-d');
        }
        return parent::beforeSave($insert);
    }

    public function afterSave($insert, $changedAttributes) 
    {
    }   

    public function getGroups()
    {
        return $this->hasMany(GroupClient::className(), ['clients_id' => 'id']);
    }

}
