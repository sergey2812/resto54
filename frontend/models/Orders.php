<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property int $sum
 * @property string $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $street
 * @property string $house
 * @property string $kv
 */
class Orders extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * заполняем поля с датами в заказе
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }  

    /**
     * заполняем в заказе поля с датами
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['variant', 'required', 'message' => 'Выберите вариант питания!'],
            ['name', 'required', 'message' => 'Поле обязательно для заполнения'],
            ['email', 'required', 'message' => 'Поле обязательно для заполнения'],
            ['phone', 'required', 'message' => 'Поле обязательно для заполнения'],
            ['pay_way', 'required', 'message' => 'Выберите вариант оплаты!'],
            ['for_time', 'required', 'message' => 'Когда должен быть готов заказ?'],
            ['email', 'email', 'message' => 'Запись не соответствует формату адреса email'],
            [['name', 'email', 'street', 'house', 'kv'], 'trim'],
            [['created_at', 'updated_at', 'for_time', 'commenty'], 'safe'],
            ['email', 'string', 'max' => 255, 'message' => 'Должно быть не более 255 знаков'],
            ['street', 'string', 'max' => 150, 'message' => 'Должно быть не более 150 знаков'],
            ['house', 'number', 'message' => 'Должны быть только цифры'],
            ['kv', 'number', 'message' => 'Должны быть только цифры'],  
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'variant' => 'Выберите вариант питания',
            'for_time' => '',
            'commenty' => '',
            'name' => '',
            'email' => '',
            'phone' => '',
            'street' => '',
            'house' => '',
            'kv' => '',
            'pay_way' => '',
        ];
    }
}
