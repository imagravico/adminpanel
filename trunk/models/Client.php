<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;
use app\models\Msetting;
use app\models\Csetting;
use yii\web\Session;


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

        parent::afterFind();    
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
            ->where('belong_to > :belong_to', [':belong_to' => 1])
            ->orderBy('id');
    }

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
