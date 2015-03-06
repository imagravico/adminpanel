<?php

namespace app\models;

use Yii;
use app\models\MCSetting;

/**
 * This is the model class for table "csettings".
 *
 * @property integer $id
 * @property integer $checklists_id
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 */
class Csetting extends MCSetting
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

    /**
     * get all current checklists settings of specific client or website
     * @param  integer $belong_to =1 for client and =2 for website
     * @param  integer $id id of the client or website
     * @return assign the settings for session 'csetting_default' and 'csetting'
     */
    public static function getCurrentCSettings($belong_to, $id)
    {
        $session = Yii::$app->session;

        $csettings = self::find()
                    ->where(['belong_to' => $belong_to, 'clients_or_webs_id' => $id])
                    ->all();
        $csetting_default = $session->get('csetting_default');
        if (!empty($csettings) && empty($csetting_default)) {
            $tmp = [];
            foreach ($csettings as $key => $csetting) {
                array_push($tmp, ['checklists_id' => $csetting->checklists_id, 'belong_to' => $csetting->belong_to]);
            }
            // assign $tmp to session 'csetting'
            // the same as assigning 'csetting' by 'csetting_default'
            $session->set('csetting', $tmp);
            $session->set('csetting_default', $tmp);
        }
    }

}
