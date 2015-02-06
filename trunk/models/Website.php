<?php

namespace app\models;

use Yii;
use app\models\Client;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "websites".
 *
 * @property integer $id
 * @property string $domain
 * @property string $online_date
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 * @property integer $clients_id
 */
class Website extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'websites';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain', 'clients_id', 'online_date'], 'required'],
            [['online_date', 'created_at', 'updated_at'], 'safe'],
            [['active', 'clients_id'], 'integer'],
            [['domain'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
            'online_date' => 'Online Date',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'clients_id' => 'Clients ID',
        ];
    }

    public function beforeSave($insert) 
    {

        // convert format birthday
        if ($this->online_date) {
            $date = \DateTime::createFromFormat('m/d/Y', $this->online_date);
            $this->online_date = $date->format('Y-m-d');
        }

        return parent::beforeSave($insert);
    }

    public function afterFind()
    {
        // convert current format of birthday to d/m/Y
        if ($this->online_date) {
            $date = \DateTime::createFromFormat('Y-d-m', $this->online_date);
            $this->online_date = $date->format('d/m/Y');
        }
    }
    
    public function getClient() 
    {
        return $this->hasOne(Client::classname(), ['id' => 'clients_id']);
    }
}
