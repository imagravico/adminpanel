<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use kartik\mpdf\Pdf;
use app\models\ChecklistsTimeSent;

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

        // remove old file
        if ($this->file_name)
            unlink(Yii::$app->basePath . '/web/upload/pdf/' . $this->file_name);

        $this->file_name = md5(time()) . '.pdf';
        // make a pdf file
        if ($this->content)
            $this->makePdf($this->file_name);

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

    public function makePdf($name)
    {
        $content = $this->content;
        
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            'filename' => Yii::$app->basePath . '/web/upload/pdf/' . $name,
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_FILE, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => ''],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>[''], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    /**
     * establish relationship with user model
     * @return mix
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'users_id']);
    }

    /**
     * establish relation with Cschedule model
     * @return mix
     */
    public function getCschedule() 
    {
        return $this->hasMany(ChecklistSchedule::className(), ['checklists_id' => 'id']);
    }
    /**
     * find all checklist belonging to corresponding website or client
     * @param $relation
     * @return mix
     */
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
    /**
     * get latest time sending of checklist for client or website
     * @param integer $belong_to 
     * @param integer $cowid
     * @return mix
     */
    public function getTimeSent($belong_to, $cowid)
    {
        return ChecklistsTimeSent::find()
            ->where([
                    'belong_to' => $belong_to, 
                    'clients_or_webs_id' => $cowid, 
                    'checklists_id' => $this->id 
                ])
            ->one();
    }
}
