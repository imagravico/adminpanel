<?php namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use kartik\mpdf\Pdf;
use app\models\ChecklistsTimeSent;

/**
 * This is the model class for table "checklists_cow".
 *
 * @property integer $id
 * @property integer $checklists_id
 * @property string $content
 * @property integer $belong_to
 * @property integer $clients_or_webs_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $file_name
 */
class ChecklistsCow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'checklists_cow';
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
            [['checklists_id', 'belong_to', 'clients_or_webs_id'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['file_name'], 'string', 'max' => 255]
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
            'content' => 'Content',
            'belong_to' => 'Belong To',
            'clients_or_webs_id' => 'Clients Or Webs ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'file_name' => 'File Name',
        ];
    }
    /**
     * @inheritdoc
     */
    public function beforeSave($insert) 
    {
        // remove old file in the case it isn't new one..
        if (!$this->isNewRecord
                && $this->file_name
                && file_exists(Yii::$app->basePath . '/web/upload/pdf/' . $this->file_name)
            )
        {
            unlink(Yii::$app->basePath . '/web/upload/pdf/' . $this->file_name);
        }

        $this->file_name = md5(time()) . '.pdf';
        // make a pdf file
        if ($this->content)
            $this->makePdf($this->file_name);

        // assign users_id field to current user
        $this->users_id = Yii::$app->user->id;

        return parent::beforeSave($insert);
    }

    /**
     * establish 1-n relationship between this model and checklist model
     * @return [type] [description]
     */
    public function getChecklist()
    {
        return $this->hasOne(Checklist::className(), ['id' => 'checklists_id']);
    }

    /**
     * make a checklist pdf file
     * @param  string $name pdf file name
     * @return pdf file
     */
    public function makePdf($name)
    {
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
            'content' => $this->content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.css',
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/pdf.css',
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

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'users_id']);
    }

    /**
     * get latest time sending of checklist for client or website
     * @param integer $belong_to 
     * @param integer $cowid
     * @return mix
     */
    public function getTimesent()
    {
        return $this->hasOne(ChecklistsTimeSent::className(), ['checklists_cow_id' => 'id']);
    }
    
}
