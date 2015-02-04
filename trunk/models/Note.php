<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property integer $id
 * @property string $content
 * @property integer $users_id
 * @property string $created_at
 * @property string $updated_at
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['content'], 'required'],
            [['users_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'content'    => 'Content',
            'users_id'   => 'Users ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
