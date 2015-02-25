<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "checklists".
 *
 * @property integer $id
 * @property string $title
 * @property string $subtitle
 * @property string $content
 * @property integer $active
 * @property string $created_at
 * @property string $updated_at
 */
class Checklist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checklists';
    }

    /**
     * @inheritdoc
     */
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
            [['title', 'subtitle'], 'required'],
            [['content'], 'string'],
            [['active'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'subtitle'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'title'      => 'Title',
            'subtitle'   => 'Subtitle',
            'content'    => 'Content',
            'active'     => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}