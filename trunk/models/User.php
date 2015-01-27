<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    /*public $id;
    public $username;
    public $email;
    public $password;
    public $authKey;
    public $accessToken;*/
    //public $password_repeat;

    public static function tableName() 
    { 
        return 'user'; 
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password_repeat' => 'Re-type Password',
        ];
    }
    /**
    * Hash password before Save
    */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = Yii::$app->getSecurity()->generateRandomString();
            }
            if(isset($this->password)) {
                $this->setPassword($this->password);
            }
            return true;
        } 
        return false;
    }

    public function rules(){
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'unique'],
            [['email'], 'required'],
            ['email', 'email'],

            ['password', 'string', 'length' => [6, 128]],
            //[['password'], 'required', 'on' => 'register'],

            //['password_repeat','safe'],
            //['password_repeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = \Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password){
        return \Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
