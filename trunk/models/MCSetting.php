<?php

namespace app\models;

use Yii;
use yii\web\Session;
use app\models\Csetting;
use app\models\Msetting;

class MCSetting extends \yii\db\ActiveRecord
{
    public $infor_send;

 	public static function saveSettingsChanged($settings, $model, $id)
    {
    	// save checklist configruatiion for this client
        if (!empty($settings)) {
            $one_time = FALSE;
            foreach ($settings as $key => $value) {
            	if (isset($value['checklists_id'])) {
            		$setting = new Csetting;
                	$setting->checklists_id = $value['checklists_id'];
            	}
            	elseif (isset($value['messages_id'])) {
            		$setting = new Msetting;
                	$setting->messages_id = $value['messages_id'];
            	}
                
                $setting->belong_to   = $value['belong_to'];
                $setting->clients_or_webs_id = $id;

                // remove all current settings only one time by $one_time flag
                if (!$one_time)
                    $model->deleteAll(['clients_or_webs_id' => $setting->clients_or_webs_id, 'belong_to' => $setting->belong_to]);

                $one_time = TRUE;
                $setting->save();
            }
        }
        else {
            $model->deleteAll(['clients_or_webs_id' => $id]);
        }
    }

    /**
     * @establish a relationship with client or website model
     */
    public function getCow()
    {
        if ($this->belong_to == 1) {
            return $this->hasOne(Client::className(), ['id' => 'clients_or_webs_id']);
        }
        elseif ($this->belong_to == 2) {
            return $this->hasOne(Website::className(), ['id' => 'clients_or_webs_id']);
        }
    }

}