<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends ActiveRecord
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'body'], 'required', 'message' => 'Поле обязательно для заполнения'],
            // email has to be a valid email address
            ['email', 'email', 'message' => 'Запись не соответствует формату адреса email'],
            // verifyCode needs to be entered correctly
            //['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        /* Проверяем форму на валидацию */
        if ($this->validate()) 
            {    
                Yii::$app->mailer->compose()
                    ->setTo($email) /* в адрес админа */
                    ->setFrom($email) /* от админа */
                    ->setSubject('Письмо из Ресторан-Онлайн от: '.$this->name.'--'.$this->email) /* тема */
                    ->setTextBody($this->body) /* текст письма из texarea формы */
                    ->send();

                return true;
            } 
        else 
            {
                return false;
            }        

    }
}
