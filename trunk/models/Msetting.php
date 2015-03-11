<?php

namespace app\models;

use Yii;
use app\models\Client;
use app\models\Website;
use app\models\MCSetting;
use app\models\Message;


/**
 * This is the model class for table "msettings".
 *
 * @property integer $id
 * @property integer $messages_id
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 */
class Msetting extends MCSetting
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
        $msetting_default = $session->get('msetting_default');
        if (!empty($msettings) && empty($msetting_default)) {
            $tmp = [];
            foreach ($msettings as $key => $msetting) {
                array_push($tmp, ['messages_id' => $msetting->messages_id, 'belong_to' => $msetting->belong_to]);
            }
            // assign $tmp to session 'msetting'
            // the same as assigning 'msetting' by 'msetting_default'
            // remove session of message settings after assigning a new one
            $session->remove('msetting');
            $session->remove('msetting_default');

            $session->set('msetting', $tmp);
            $session->set('msetting_default', $tmp);
        }
    }
    /**
     * establish a relationship between this model and message model
     * @return mix
     */
    public function getMessage()
    {
        return $this->hasOne(Message::classname(), ['id' => 'messages_id']);
    }
    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        // get information that will be sent to client or website
        // $this->infor_send = $this->getInforSend();       
    }

    public function getInforSend()
    {
        $infor = [];
        if ($this->cow instanceof Client) 
            $infor['email'] = $this->cow->email;
        elseif ($this->cow instanceof Website)
            $infor['email'] = $this->cow->client->email;

        $infor['subject'] = $this->message->subject;
        $infor['content'] = $this->message->content;
        
        return $this->infor_send = $infor;
    }
}
