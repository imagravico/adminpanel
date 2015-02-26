<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "csettings".
 *
 * @property integer $id
 * @property integer $checklists_id
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 */
class Csetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'csettings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['checklists_id', 'belong_to', 'clients_or_webs_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'checklists_id' => 'Checklists ID',
            'belong_to' => 'Belong To',
            'clients_or_webs_id' => 'Clients Or Webs ID',
        ];
    }
}
