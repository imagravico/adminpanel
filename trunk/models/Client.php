<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

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

    public function afterSave($insert, $changedAttributes) 
    {
        return parent::afterSave($insert, $changedAttributes);
    }   

    public function afterFind()
    {
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


    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
