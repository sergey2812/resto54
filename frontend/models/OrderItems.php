<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order_items".
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property string $name
 * @property int $price
 * @property string $size
 * @property int $qty_item
 * @property int $sum_item
 * @property int $event_id
 * @property string $date
 * @property string $time
 * @property string $stol
 * @property string $mesto
 * @property string $sex
 * @property string $img
 */
class OrderItems extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_items';
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    } 

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'name', 'price', 'qty_item', 'sum_item', 'img'], 'required'],
            [['order_id', 'product_id', 'price', 'qty_item', 'sum_item'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['img'], 'string', 'max' => 150],
        ];
    }

}
