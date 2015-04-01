<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use app\models\Msetting;
use app\models\Csetting;
use yii\web\Session;
use app\models\MCSetting;
use app\models\GroupClient;

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
    public $fullname;
    public $filter_field;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
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
            [['company', 'firstname', 'lastname', 'email', 'birthday'], 'required'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['email'], 'unique'],
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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) 
    {
        // save avatar
        $image = UploadedFile::getInstance($this, 'avatar');
        if (isset($image))
        {
            $ext = end((explode(".", $image->name)));
            // generate a unique file name
            $this->avatar = Yii::$app->security->generateRandomString().".{$ext}";
            // the path to save file, you can set an uploadPath
            // in Yii::$app->params (as used in example below)
            $path = Yii::$app->params['uploadAvatarPath'] . $this->avatar;
            $image->saveAs($path);
        }
        // in the editing case, if user doesn't change avatar, then set it with old avatar
        else if (!empty($this->oldAttributes) && !empty($this->oldAttributes['avatar']))
        {
            $this->avatar = $this->oldAttributes['avatar'];
        }

        // convert format birthday
        if ($this->birthday) {
            $date = \DateTime::createFromFormat('m/d/Y', $this->birthday);
            $this->birthday = $date->format('Y-m-d');
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
        // MCSetting::saveSettingsChanged($msetting_session, new Msetting, $this->id);
        $msetting = new Msetting();
        $msetting->saveSettingsChanged($msetting_session, $msetting, $this->id);

        // remove session of message settings after saving to db
        $session->remove('msetting');
        $session->remove('msetting_default');

        // save checklist configruatiion for this client
        // MCSetting::saveSettingsChanged($csetting_session, new Csetting, $this->id);
        
        $csetting = new Csetting();
        $csetting->saveSettingsChanged($csetting_session, $csetting, $this->id);

        
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
        $session = Yii::$app->session;

        // convert created_at and updated_at to date not datetime
        $this->updated_at = strtotime($this->updated_at);   
        $this->created_at = strtotime($this->created_at);

        // convert current format of birthday to d/m/Y
        if ($this->birthday) {
            $date = \DateTime::createFromFormat('Y-d-m', $this->birthday);
            $this->birthday = $date->format('d/m/Y');
        }
        // set full name for current client
        $this->fullname = $this->getFullName();

        // get all msettings in 'edit' a client case only
        $id_param = Yii::$app->request->get('id');
        if (isset($id_param)) {
            Msetting::getCurrentMSettings(1, $this->id);
            Csetting::getCurrentCSettings(1, $this->id);
        }
        
        // get filter_field
        return parent::afterFind();
    }
    
    /**
     * @inheritdoc
     */
    public function afterDelete()
    {
        // remove all messages settings 
        Msetting::deleteAll('clients_or_webs_id = :clients_or_webs_id AND belong_to = :belong_to', [':clients_or_webs_id' => $this->id, ':belong_to' => 1]);

        Csetting::deleteAll('clients_or_webs_id = :clients_or_webs_id AND belong_to = :belong_to', [':clients_or_webs_id' => $this->id, ':belong_to' => 1]);

        GroupClient::deleteAll('clients_id = :clients_id', [':clients_id' => $this->id]);
        return parent::afterDelete();
    }


    public function getGroups()
    {
        return $this->hasMany(GroupClient::className(), ['clients_id' => 'id']);
    }

    public function getWebsites()
    {
        return $this->hasMany(Website::classname(), ['clients_id' => 'id']);
    }

    public function getMsetting()
    {
        return $this->hasMany(Msetting::className(), ['clients_or_webs_id' => 'id'])
            ->where('belong_to =:belong_to', [':belong_to' => 1])
            ->orderBy('id');
    }

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
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
                return date('m/d', strtotime($this->birthday));
                break;
            
            case 2:
                return date('m/d', $this->created_at);
                break;

            case 3:
                return $date('m/d', $this->updated_at);
                break;
        }
    }
}
