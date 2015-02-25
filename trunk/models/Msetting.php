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
    
    /**
     * get all current messages settings of specific client or website
     * @param  integer $belong_to =1 for client and =2 for website
     * @param  integer $id id of the client or website
     * @return assign the settings for session 'msetting_default' and 'msetting'
     */
    public static function getCurrentMSettings($belong_to, $id)
    {
        $session = Yii::$app->session;

        $msettings = self::find()
                    ->where(['belong_to' => $belong_to, 'clients_or_webs_id' => $id])
                    ->all();

        if (!empty($msettings) && empty($session->get('msetting_default'))) {
            $tmp = [];
            foreach ($msettings as $key => $msetting) {
                array_push($tmp, ['messages_id' => $msetting->messages_id, 'belong_to' => $msetting->belong_to]);
            }
            // assign $tmp to session 'msetting'
            // the same as assigning 'msetting' by 'msetting_default'
            $session->set('msetting', $tmp);
            $session->set('msetting_default', $tmp);
        }
    }
}
