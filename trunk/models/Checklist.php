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

    /**
     * @inheritdoc
     */
    public function beforeSave($insert) 
    {
        $session = Yii::$app->session;
        $content = $session->get('checklists_content');

        if (isset($content)) {
            $this->content = $session->get('checklists_content');
        }

        // assigning id of current user to users_id field
        $this->users_id = Yii::$app->user->id;
        
        return parent::beforeSave($insert);
    }

    /**
     * @inheritdoc
     */
    public function afterSave($insert, $changedAttributes) 
    {
        $session = Yii::$app->session;
        $session->remove('checklists_content');

        return parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();    
    }

    public function getCschedule() 
    {
        return $this->hasMany(ChecklistSchedule::className(), ['checklists_id' => 'id']);
    }

    public static function getChecklistBelong($relation)
    {
        $checklists = self::find()
            ->where(['active' => 1])
            ->with([
                'cschedule' => function($query) use ($relation) {
                    $query->andWhere('relation=' . $relation . ' AND active=' . 1);
                },
            ])->all();
            
        return $checklists;
    }
}
