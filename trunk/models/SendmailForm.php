<?php
namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class SendmailForm extends Model
{
    public $subject;
    public $content;
    public $checklists_cow_id;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['subject', 'content'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'subject' => 'Subject',
            'content' => 'Message'
        ];
    }
}
