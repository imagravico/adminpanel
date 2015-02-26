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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) 
    {
        // convert format birthday
        if ($this->online_date) {
            $date = \DateTime::createFromFormat('m/d/Y', $this->online_date);
            $this->online_date = $date->format('Y-m-d');
        }


        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes) 
    {
        $session = Yii::$app->session;
        $msetting_session = $session->get('msetting');
        $csetting_session = $session->get('csetting');
        
        // save messages configruation for this client
        if (!empty($msetting_session)) {
            $one_time = FALSE;
            foreach ($msetting_session as $key => $value) {
                $msetting              = new Msetting;
                $msetting->messages_id = $value['messages_id'];
                $msetting->belong_to   = $value['belong_to'];
                $msetting->clients_or_webs_id = $this->id;

                // remove all current msettings only one time by $one_time flag
                if (!$one_time)
                    Msetting::deleteAll(['clients_or_webs_id' => $msetting->clients_or_webs_id, 'belong_to' => $msetting->belong_to]);

                $one_time = TRUE;
                $msetting->save();
            }
        }
        else {
            Msetting::deleteAll(['clients_or_webs_id' => $this->id]);
        }

        // remove session of message settings after saving to db
        $session->remove('msetting');
        $session->remove('msetting_default');

        // save checklist configruatiion for this client
        if (!empty($csetting_session)) {
            $one_time = FALSE;
            foreach ($csetting_session as $key => $value) {
                $msetting              = new Csetting;
                $msetting->checklists_id = $value['checklists_id'];
                $msetting->belong_to   = $value['belong_to'];
                $msetting->clients_or_webs_id = $this->id;

                // remove all current msettings only one time by $one_time flag
                if (!$one_time)
                    Csetting::deleteAll(['clients_or_webs_id' => $msetting->clients_or_webs_id, 'belong_to' => $msetting->belong_to]);

                $one_time = TRUE;
                $msetting->save();
            }
        }
        else {
            Csetting::deleteAll(['clients_or_webs_id' => $this->id]);
        }

        return parent::afterSave($insert, $changedAttributes);
    }   


    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        // convert current format of birthday to d/m/Y
        if ($this->online_date) {
            $date = \DateTime::createFromFormat('Y-d-m', $this->online_date);
            $this->online_date = $date->format('d/m/Y');
        }

        // get all msettings in 'edit' a website case only
        $id_param = Yii::$app->request->get('id');
        if (isset($id_param)) {
            Csetting::getCurrentCSettings(1, $this->id);
            Msetting::getCurrentMSettings(2, $this->id);
        }
    }
    
    public function getClient() 
    {
        return $this->hasOne(Client::classname(), ['id' => 'clients_id']);
    }
}
