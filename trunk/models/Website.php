<?php

namespace app\models;

use Yii;
use app\models\Client;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use app\models\Msetting;
use app\models\Csetting;
use yii\web\Session;
use app\models\MCSetting;


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
        MCSetting::saveSettingsChanged($msetting_session, new Msetting, $this->id);

        // remove session of message settings after saving to db
        $session->remove('msetting');
        $session->remove('msetting_default');

        // save checklist configruatiion for this client
        MCSetting::saveSettingsChanged($csetting_session, new Csetting, $this->id);
        
        // remove session of message settings after saving to db
        $session->remove('csetting');
        $session->remove('csetting_default');

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
            Csetting::getCurrentCSettings(2, $this->id);
            Msetting::getCurrentMSettings(2, $this->id);
        }
    }
    
    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        // remove all messages settings 
        Msetting::deleteAll('clients_or_webs_id = :clients_or_webs_id AND belong_to = :belong_to', [':clients_or_webs_id' => $this->id, ':belong_to' => 2]);

        Csetting::deleteAll('clients_or_webs_id = :clients_or_webs_id AND belong_to = :belong_to', [':clients_or_webs_id' => $this->id, ':belong_to' => 2]);

        parent::afterDelete();
    }

    public function getClient() 
    {
        return $this->hasOne(Client::classname(), ['id' => 'clients_id']);
    }

    /**
     * return date responding to each $type with Y/m/d format. this function 
     * will be used in autosend controller
     * @param  integer $type 
     * @return string
     */
    public function getTimeSend($event) 
    {
        switch ($event) {
            case 1:
                return date('m/d', strtotime($this->online_date));
                break;
            
            case 2:
                return date('Y/m/d', $this->created_at);
                break;

            case 3:
                return $date('Y/m/d', $this->updated_at);
                break;
        }
    }
}
