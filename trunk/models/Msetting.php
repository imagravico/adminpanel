<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "msettings".
 *
 * @property integer $id
 * @property integer $messages_id
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 */
class Msetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'msettings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['messages_id', 'belong_to', 'clients_or_webs_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => 'ID',
            'messages_id'        => 'Messages ID',
            'belong_to'          => 'Belong To',
            'clients_or_webs_id' => 'Clients Or Webs ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        return parent::beforeSave($insert);
    }
    
}
