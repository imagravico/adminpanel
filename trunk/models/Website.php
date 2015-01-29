<?php

namespace app\models;

use Yii;

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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain'], 'required'],
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
}
