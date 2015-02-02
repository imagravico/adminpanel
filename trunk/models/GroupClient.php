<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups_clients".
 *
 * @property integer $id
 * @property integer $clients_id
 * @property integer $groups_id
 */
class GroupClient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'groups_clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clients_id', 'groups_id'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clients_id' => 'Clients ID',
            'groups_id' => 'Groups ID',
        ];
    }

    public function getGroup()
    {
        // GroupClient has_one Group via Group.id -> groups_id
        return $this->hasOne(Group::className(), ['id' => 'groups_id']);
    }
}
